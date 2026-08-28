<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Tổng yêu cầu
        |--------------------------------------------------------------------------
        */

        $total = DB::table('contact_requests')->count();


        /*
        |--------------------------------------------------------------------------
        | Theo trạng thái
        |--------------------------------------------------------------------------
        */

        $pending = DB::table('contact_requests')
            ->where('status', 'pending')
            ->count();

        $assigned = DB::table('contact_requests')
            ->where('status', 'assigned')
            ->count();

        $contacted = DB::table('contact_requests')
            ->where('status', 'contacted')
            ->count();

        $processing = DB::table('contact_requests')
            ->where('status', 'processing')
            ->count();

        $completed = DB::table('contact_requests')
            ->where('status', 'completed')
            ->count();

        $cancelled = DB::table('contact_requests')
            ->where('status', 'cancelled')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Hôm nay
        |--------------------------------------------------------------------------
        */

        $today = DB::table('contact_requests')
            ->whereDate('created_at', today())
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Yêu cầu ưu tiên cao
        |--------------------------------------------------------------------------
        */

        $urgent = DB::table('contact_requests')
            ->whereIn('priority', ['high', 'urgent'])
            ->whereNotIn('status', ['completed', 'cancelled'])
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Admin đang xử lý nhiều nhất
        |--------------------------------------------------------------------------
        */

        $admins = DB::table('admins')
            ->leftJoin(
                'contact_requests',
                'admins.id',
                '=',
                'contact_requests.assigned_admin_id'
            )
            ->select(
                'admins.id',
                'admins.name',
                'admins.email',
                DB::raw('COUNT(contact_requests.id) as total_requests')
            )
            ->where('admins.is_active', 1)
            ->groupBy(
                'admins.id',
                'admins.name',
                'admins.email'
            )
            ->orderByDesc('total_requests')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Yêu cầu mới nhất
        |--------------------------------------------------------------------------
        */

        $latestRequests = DB::table('contact_requests')
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
            ->orderByDesc('contact_requests.created_at')
            ->limit(10)
            ->get();


        return view('admin.dashboard', compact(
            'total',
            'today',
            'pending',
            'assigned',
            'contacted',
            'processing',
            'completed',
            'cancelled',
            'urgent',
            'admins',
            'latestRequests'
        ));
    }
}