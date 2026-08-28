<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactRequestController extends Controller
{
    /**
     * Danh sách yêu cầu
     */
    public function index(Request $request)
    {
        $query = DB::table('contact_requests')
            ->leftJoin(
                'admins',
                'contact_requests.assigned_admin_id',
                '=',
                'admins.id'
            )
            ->select(
                'contact_requests.*',
                'admins.name as assigned_admin_name'
            );


        /*
        |--------------------------------------------------------------------------
        | Tìm kiếm
        |--------------------------------------------------------------------------
        */

        if ($request->filled('q')) {

            $q = trim($request->q);

            $query->where(function ($query) use ($q) {

                $query->where(
                    'contact_requests.request_code',
                    'like',
                    "%{$q}%"
                )
                ->orWhere(
                    'contact_requests.name',
                    'like',
                    "%{$q}%"
                )
                ->orWhere(
                    'contact_requests.phone',
                    'like',
                    "%{$q}%"
                )
                ->orWhere(
                    'contact_requests.email',
                    'like',
                    "%{$q}%"
                );
            });
        }


        /*
        |--------------------------------------------------------------------------
        | Filter trạng thái
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where(
                'contact_requests.status',
                $request->status
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Filter ưu tiên
        |--------------------------------------------------------------------------
        */

        if ($request->filled('priority')) {

            $query->where(
                'contact_requests.priority',
                $request->priority
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Filter người xử lý
        |--------------------------------------------------------------------------
        */

        if ($request->filled('assigned_admin_id')) {

            $query->where(
                'contact_requests.assigned_admin_id',
                $request->assigned_admin_id
            );
        }


        $requests = $query
            ->orderByDesc('contact_requests.created_at')
            ->paginate(15)
            ->withQueryString();


        $admins = DB::table('admins')
            ->where('is_active', 1)
            ->orderBy('name')
            ->get([
                'id',
                'name'
            ]);


        return view(
            'admin.requests.index',
            compact('requests', 'admins')
        );
    }


    /**
     * Chi tiết request
     */
    public function show(int $id)
    {
        $requestData = DB::table('contact_requests')
            ->leftJoin(
                'admins',
                'contact_requests.assigned_admin_id',
                '=',
                'admins.id'
            )
            ->select(
                'contact_requests.*',
                'admins.name as assigned_admin_name'
            )
            ->where('contact_requests.id', $id)
            ->first();


        abort_if(!$requestData, 404);


        $histories = DB::table(
            'contact_request_status_histories'
        )
            ->leftJoin(
                'admins',
                'contact_request_status_histories.admin_id',
                '=',
                'admins.id'
            )
            ->where(
                'contact_request_status_histories.contact_request_id',
                $id
            )
            ->select(
                'contact_request_status_histories.*',
                'admins.name as admin_name'
            )
            ->orderByDesc(
                'contact_request_status_histories.created_at'
            )
            ->get();


        $assignments = DB::table(
            'contact_request_assignments'
        )
            ->join(
                'admins as assigned_admin',
                'contact_request_assignments.admin_id',
                '=',
                'assigned_admin.id'
            )
            ->join(
                'admins as assigned_by_admin',
                'contact_request_assignments.assigned_by',
                '=',
                'assigned_by_admin.id'
            )
            ->where(
                'contact_request_assignments.contact_request_id',
                $id
            )
            ->select(
                'contact_request_assignments.*',
                'assigned_admin.name as assigned_to_name',
                'assigned_by_admin.name as assigned_by_name'
            )
            ->orderByDesc(
                'contact_request_assignments.assigned_at'
            )
            ->get();


        $notes = DB::table('contact_request_notes')
            ->join(
                'admins',
                'contact_request_notes.admin_id',
                '=',
                'admins.id'
            )
            ->where(
                'contact_request_notes.contact_request_id',
                $id
            )
            ->select(
                'contact_request_notes.*',
                'admins.name as admin_name'
            )
            ->orderByDesc('contact_request_notes.created_at')
            ->get();


        $admins = DB::table('admins')
            ->where('is_active', 1)
            ->orderBy('name')
            ->get([
                'id',
                'name'
            ]);


        return view(
            'admin.requests.show',
            compact(
                'requestData',
                'histories',
                'assignments',
                'notes',
                'admins'
            )
        );
    }


    /**
     * Phân công request
     */
    public function assign(
        Request $request,
        int $id
    ) {
        $request->validate([
            'admin_id' => [
                'required',
                'integer',
                'exists:admins,id',
            ],
            'note' => [
                'nullable',
                'string',
                'max:500',
            ],
        ]);


        $adminId = session(config('admin.session_key'));


        DB::transaction(function () use (
            $request,
            $id,
            $adminId
        ) {

            $contact = DB::table('contact_requests')
                ->where('id', $id)
                ->lockForUpdate()
                ->first();

            abort_if(!$contact, 404);


            /*
            |--------------------------------------------------------------------------
            | Đóng assignment cũ
            |--------------------------------------------------------------------------
            */

            DB::table('contact_request_assignments')
                ->where('contact_request_id', $id)
                ->whereNull('unassigned_at')
                ->update([
                    'unassigned_at' => now(),
                ]);


            /*
            |--------------------------------------------------------------------------
            | Assignment mới
            |--------------------------------------------------------------------------
            */

            DB::table('contact_request_assignments')
                ->insert([
                    'contact_request_id' => $id,
                    'admin_id' => $request->admin_id,
                    'assigned_by' => $adminId,
                    'assigned_at' => now(),
                    'note' => $request->note,
                ]);


            /*
            |--------------------------------------------------------------------------
            | Update request
            |--------------------------------------------------------------------------
            */

            DB::table('contact_requests')
                ->where('id', $id)
                ->update([
                    'assigned_admin_id' => $request->admin_id,
                    'assigned_at' => now(),
                    'status' => 'assigned',
                    'updated_at' => now(),
                ]);


            /*
            |--------------------------------------------------------------------------
            | Status history
            |--------------------------------------------------------------------------
            */

            DB::table(
                'contact_request_status_histories'
            )->insert([
                'contact_request_id' => $id,
                'admin_id' => $adminId,
                'old_status' => $contact->status,
                'new_status' => 'assigned',
                'note' => $request->note,
                'created_at' => now(),
            ]);


            /*
            |--------------------------------------------------------------------------
            | Audit
            |--------------------------------------------------------------------------
            */

            DB::table('admin_audit_logs')
                ->insert([
                    'admin_id' => $adminId,
                    'action' => 'assign',
                    'entity_type' => 'contact_request',
                    'entity_id' => $id,
                    'old_values' => json_encode([
                        'assigned_admin_id'
                            => $contact->assigned_admin_id,
                    ]),
                    'new_values' => json_encode([
                        'assigned_admin_id'
                            => $request->admin_id,
                    ]),
                    'ip_address' => $this->ipToBinary(
                        request()->ip()
                    ),
                    'user_agent' => substr(
                        (string) request()->userAgent(),
                        0,
                        1000
                    ),
                    'created_at' => now(),
                ]);
        });


        return back()->with(
            'success',
            'Đã phân công yêu cầu.'
        );
    }


    /**
     * Đổi trạng thái
     */
    public function updateStatus(
        Request $request,
        int $id
    ) {
        $request->validate([
            'status' => [
                'required',
                'in:pending,assigned,contacted,processing,completed,cancelled',
            ],

            'note' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);


        $adminId = session(config('admin.session_key'));


        DB::transaction(function () use (
            $request,
            $id,
            $adminId
        ) {

            $contact = DB::table('contact_requests')
                ->where('id', $id)
                ->lockForUpdate()
                ->first();

            abort_if(!$contact, 404);


            $newStatus = $request->status;


            $update = [
                'status' => $newStatus,
                'updated_at' => now(),
            ];


            /*
            |--------------------------------------------------------------------------
            | Timestamp tương ứng
            |--------------------------------------------------------------------------
            */

            if ($newStatus === 'contacted') {
                $update['contacted_at'] = now();
            }

            if ($newStatus === 'completed') {
                $update['completed_at'] = now();
            }

            if ($newStatus === 'cancelled') {
                $update['cancelled_at'] = now();
            }


            DB::table('contact_requests')
                ->where('id', $id)
                ->update($update);


            /*
            |--------------------------------------------------------------------------
            | History
            |--------------------------------------------------------------------------
            */

            DB::table(
                'contact_request_status_histories'
            )->insert([
                'contact_request_id' => $id,
                'admin_id' => $adminId,
                'old_status' => $contact->status,
                'new_status' => $newStatus,
                'note' => $request->note,
                'created_at' => now(),
            ]);


            /*
            |--------------------------------------------------------------------------
            | Audit
            |--------------------------------------------------------------------------
            */

            DB::table('admin_audit_logs')
                ->insert([
                    'admin_id' => $adminId,
                    'action' => 'status_change',
                    'entity_type' => 'contact_request',
                    'entity_id' => $id,

                    'old_values' => json_encode([
                        'status' => $contact->status,
                    ]),

                    'new_values' => json_encode([
                        'status' => $newStatus,
                    ]),

                    'ip_address' => $this->ipToBinary(
                        request()->ip()
                    ),

                    'user_agent' => substr(
                        (string) request()->userAgent(),
                        0,
                        1000
                    ),

                    'created_at' => now(),
                ]);
        });


        return back()->with(
            'success',
            'Đã cập nhật trạng thái.'
        );
    }


    /**
     * Thêm ghi chú
     */
    public function addNote(
        Request $request,
        int $id
    ) {
        $request->validate([
            'content' => [
                'required',
                'string',
                'max:5000',
            ],
        ]);


        $adminId = session(config('admin.session_key'));


        $exists = DB::table('contact_requests')
            ->where('id', $id)
            ->exists();

        abort_if(!$exists, 404);


        DB::table('contact_request_notes')
            ->insert([
                'contact_request_id' => $id,
                'admin_id' => $adminId,
                'content' => $request->content,
                'created_at' => now(),
                'updated_at' => now(),
            ]);


        return back()->with(
            'success',
            'Đã thêm ghi chú.'
        );
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
    private function isClosed($request)
{
    return in_array($request->status, [
        'cancelled',
        'completed',
    ]);
}

}