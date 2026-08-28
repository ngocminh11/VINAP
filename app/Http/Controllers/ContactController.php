<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:150',
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
            ],

            'email' => [
                'nullable',
                'email',
                'max:191',
            ],

            'address' => [
                'nullable',
                'string',
                'max:500',
            ],

            'message' => [
                'nullable',
                'string',
                'max:5000',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Tạo mã yêu cầu
        |--------------------------------------------------------------------------
        */

        $id = DB::table('contact_requests')
            ->insertGetId([
                'request_code' => 'TEMP',
                'name' => $data['name'],
                'phone' => $data['phone'],
                'email' => $data['email'] ?? null,
                'address' => $data['address'] ?? null,
                'service_type' => 'valuation',
                'message' => $data['message'] ?? null,
                'source' => 'website',
                'source_detail' => 'Form liên hệ website',
                'status' => 'pending',
                'priority' => 'normal',
                'created_at' => now(),
                'updated_at' => now(),
            ]);


        /*
        |--------------------------------------------------------------------------
        | Tạo request code
        |--------------------------------------------------------------------------
        */

        $requestCode = 'YCV-' .
            now()->format('Ymd') .
            '-' .
            str_pad(
                (string) $id,
                6,
                '0',
                STR_PAD_LEFT
            );


        DB::table('contact_requests')
            ->where('id', $id)
            ->update([
                'request_code' => $requestCode,
            ]);


        /*
        |--------------------------------------------------------------------------
        | History ban đầu
        |--------------------------------------------------------------------------
        */

        DB::table(
            'contact_request_status_histories'
        )->insert([
            'contact_request_id' => $id,
            'admin_id' => null,
            'old_status' => null,
            'new_status' => 'pending',
            'note' => 'Khách hàng gửi yêu cầu từ website.',
            'created_at' => now(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | Gửi email
        |--------------------------------------------------------------------------
        */

        try {

            Mail::to(
                config('mail.contact_recipient')
            )->send(
                new ContactMail([
                    ...$data,
                    'request_code' => $requestCode,
                ])
            );

        } catch (\Throwable $e) {

            /*
             * Không rollback request nếu email lỗi.
             *
             * Request vẫn tồn tại trong admin.
             */

            report($e);
        }


        return response()->json([
            'ok' => true,
            'message' => 'Đã gửi yêu cầu thành công.',
            'request_code' => $requestCode,
        ]);
    }
}