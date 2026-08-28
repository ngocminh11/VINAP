<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        $adminId = session(
            config('admin.session_key')
        );


        if (!$adminId) {
            return redirect()->route('admin.login');
        }


        /*
        |--------------------------------------------------------------------------
        | Kiểm tra tài khoản vẫn tồn tại + còn active
        |--------------------------------------------------------------------------
        */

        $admin = DB::table('admins')
            ->where('id', $adminId)
            ->where('is_active', 1)
            ->first();


        if (!$admin) {

            $request->session()->forget(
                config('admin.session_key')
            );

            return redirect()->route('admin.login');
        }


        /*
        |--------------------------------------------------------------------------
        | Chia sẻ admin cho view
        |--------------------------------------------------------------------------
        */

        $request->attributes->set(
            'admin',
            $admin
        );

        view()->share('currentAdmin', $admin);


        return $next($request);
    }
}