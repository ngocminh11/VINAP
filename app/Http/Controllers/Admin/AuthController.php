<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    /**
     * Hiển thị trang đăng nhập
     */
    public function showLogin()
    {
        // Nếu đã đăng nhập thì chuyển dashboard
        if (session()->has(config('admin.session_key'))) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }


    /**
     * Xử lý đăng nhập
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                'max:191',
            ],

            'password' => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        $email = strtolower(trim($request->email));

        /*
        |--------------------------------------------------------------------------
        | Rate limit
        |--------------------------------------------------------------------------
        */

        $throttleKey = 'admin-login:' .
            $request->ip() .
            '|' .
            $email;

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {

            $seconds = RateLimiter::availableIn($throttleKey);

            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => "Quá nhiều lần đăng nhập sai. Thử lại sau {$seconds} giây.",
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Tìm tài khoản
        |--------------------------------------------------------------------------
        */

        $admin = DB::table('admins')
            ->where('email', $email)
            ->where('is_active', 1)
            ->first();


        /*
        |--------------------------------------------------------------------------
        | Kiểm tra tài khoản
        |--------------------------------------------------------------------------
        */

        if (!$admin) {

            RateLimiter::hit($throttleKey, 300);

            DB::table('admin_login_logs')->insert([
                'admin_id' => null,
                'email' => $email,
                'event' => 'failed',
                'ip_address' => $this->ipToBinary($request->ip()),
                'user_agent' => substr(
                    (string) $request->userAgent(),
                    0,
                    1000
                ),
                'created_at' => now(),
            ]);

            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Email hoặc mật khẩu không chính xác.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Kiểm tra khóa tài khoản
        |--------------------------------------------------------------------------
        */

        if (
            $admin->locked_until &&
            now()->lt($admin->locked_until)
        ) {

            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Tài khoản đang bị khóa tạm thời.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Kiểm tra password hash
        |--------------------------------------------------------------------------
        */

        if (!Hash::check($request->password, $admin->password)) {

            RateLimiter::hit($throttleKey, 300);

            $failedAttempts = $admin->failed_login_attempts + 1;

            $updateData = [
                'failed_login_attempts' => $failedAttempts,
                'updated_at' => now(),
            ];

            /*
             * 5 lần sai => khóa 5 phút
             */
            if ($failedAttempts >= 5) {

                $updateData['locked_until'] = now()->addMinutes(5);

                $updateData['failed_login_attempts'] = 0;

                DB::table('admin_login_logs')->insert([
                    'admin_id' => $admin->id,
                    'email' => $email,
                    'event' => 'locked_out',
                    'ip_address' => $this->ipToBinary($request->ip()),
                    'user_agent' => substr(
                        (string) $request->userAgent(),
                        0,
                        1000
                    ),
                    'created_at' => now(),
                ]);

            } else {

                DB::table('admin_login_logs')->insert([
                    'admin_id' => $admin->id,
                    'email' => $email,
                    'event' => 'failed',
                    'ip_address' => $this->ipToBinary($request->ip()),
                    'user_agent' => substr(
                        (string) $request->userAgent(),
                        0,
                        1000
                    ),
                    'created_at' => now(),
                ]);
            }

            DB::table('admins')
                ->where('id', $admin->id)
                ->update($updateData);

            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Email hoặc mật khẩu không chính xác.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | LOGIN THÀNH CÔNG
        |--------------------------------------------------------------------------
        */

        RateLimiter::clear($throttleKey);

        $request->session()->regenerate();

        $request->session()->put(
            config('admin.session_key'),
            $admin->id
        );

        DB::table('admins')
            ->where('id', $admin->id)
            ->update([
                'last_login_at' => now(),
                'last_login_ip' => $this->ipToBinary($request->ip()),
                'failed_login_attempts' => 0,
                'locked_until' => null,
                'updated_at' => now(),
            ]);

        DB::table('admin_login_logs')->insert([
            'admin_id' => $admin->id,
            'email' => $email,
            'event' => 'success',
            'ip_address' => $this->ipToBinary($request->ip()),
            'user_agent' => substr(
                (string) $request->userAgent(),
                0,
                1000
            ),
            'created_at' => now(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | Audit
        |--------------------------------------------------------------------------
        */

        DB::table('admin_audit_logs')->insert([
            'admin_id' => $admin->id,
            'action' => 'login',
            'entity_type' => 'admin',
            'entity_id' => $admin->id,
            'ip_address' => $this->ipToBinary($request->ip()),
            'user_agent' => substr(
                (string) $request->userAgent(),
                0,
                1000
            ),
            'created_at' => now(),
        ]);

        return redirect()->route('admin.dashboard');
    }


    /**
     * Logout
     */
    public function logout(Request $request)
    {
        $adminId = session(config('admin.session_key'));

        if ($adminId) {

            DB::table('admin_login_logs')->insert([
                'admin_id' => $adminId,
                'email' => null,
                'event' => 'logout',
                'ip_address' => $this->ipToBinary($request->ip()),
                'user_agent' => substr(
                    (string) $request->userAgent(),
                    0,
                    1000
                ),
                'created_at' => now(),
            ]);
        }

        $request->session()->forget(
            config('admin.session_key')
        );

        $request->session()->regenerateToken();

        $request->session()->invalidate();

        return redirect()->route('admin.login');
    }


    /**
     * Convert IP → binary
     */
    private function ipToBinary(?string $ip): ?string
    {
        if (!$ip) {
            return null;
        }

        return inet_pton($ip) ?: null;
    }
}