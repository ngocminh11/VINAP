@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Tổng quan')
@section('page-description', 'Theo dõi tình hình yêu cầu và hoạt động xử lý của VINAP.')

@section('content')

{{-- ========================================================= --}}
{{-- KPI --}}
{{-- ========================================================= --}}

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">

    {{-- TOTAL --}}
    <div class="admin-card">

        <div class="flex items-start justify-between">

            <div>

                <p class="kpi-label">
                    Tổng yêu cầu
                </p>

                <p class="kpi-number">
                    {{ $totalRequests ?? 0 }}
                </p>

            </div>

            <div class="kpi-icon bg-slate-100 text-slate-700">
                <svg viewBox="0 0 24 24" fill="none">
                    <path
                        d="M6 3.75h12A1.25 1.25 0 0 1 19.25 5v14A1.25 1.25 0 0 1 18 20.25H6A1.25 1.25 0 0 1 4.75 19V5A1.25 1.25 0 0 1 6 3.75Z"
                        stroke="currentColor"
                        stroke-width="1.7"
                    />
                    <path
                        d="M8 8h8M8 12h8M8 16h5"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                    />
                </svg>
            </div>

        </div>

        <div class="mt-5 text-xs text-slate-400">
            Tất cả yêu cầu đã tiếp nhận
        </div>

    </div>


    {{-- PENDING --}}
    <div class="admin-card">

        <div class="flex items-start justify-between">

            <div>

                <p class="kpi-label">
                    Chờ xử lý
                </p>

                <p class="kpi-number">
                    {{ $pendingRequests ?? 0 }}
                </p>

            </div>

            <div class="kpi-icon bg-amber-50 text-amber-600">
                <svg viewBox="0 0 24 24" fill="none">
                    <circle
                        cx="12"
                        cy="12"
                        r="8"
                        stroke="currentColor"
                        stroke-width="1.7"
                    />
                    <path
                        d="M12 8v4l2.5 2"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                    />
                </svg>
            </div>

        </div>

        <div class="mt-5 text-xs text-amber-600 font-medium">
            Cần được tiếp nhận
        </div>

    </div>


    {{-- PROCESSING --}}
    <div class="admin-card">

        <div class="flex items-start justify-between">

            <div>

                <p class="kpi-label">
                    Đang xử lý
                </p>

                <p class="kpi-number">
                    {{ $processingRequests ?? 0 }}
                </p>

            </div>

            <div class="kpi-icon bg-blue-50 text-blue-600">
                <svg viewBox="0 0 24 24" fill="none">
                    <path
                        d="M4 12h16M12 4l8 8-8 8"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </div>

        </div>

        <div class="mt-5 text-xs text-blue-600 font-medium">
            Đang được nhân viên xử lý
        </div>

    </div>


    {{-- COMPLETED --}}
    <div class="admin-card">

        <div class="flex items-start justify-between">

            <div>

                <p class="kpi-label">
                    Hoàn thành
                </p>

                <p class="kpi-number">
                    {{ $completedRequests ?? 0 }}
                </p>

            </div>

            <div class="kpi-icon bg-emerald-50 text-emerald-600">
                <svg viewBox="0 0 24 24" fill="none">
                    <path
                        d="m5 12 4 4L19 6"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </div>

        </div>

        <div class="mt-5 text-xs text-emerald-600 font-medium">
            Đã hoàn tất xử lý
        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- MAIN GRID --}}
{{-- ========================================================= --}}

<div class="grid grid-cols-1 xl:grid-cols-[1.6fr_1fr] gap-5 mb-6">

    {{-- CHART --}}
    <div class="admin-card min-h-[360px]">

        <div class="flex items-center justify-between mb-8">

            <div>

                <h2 class="section-title">
                    Lượng yêu cầu
                </h2>

                <p class="section-subtitle">
                    Theo dõi số lượng yêu cầu trong thời gian gần đây.
                </p>

            </div>

            <button
                class="
                    h-9 px-3
                    rounded-lg
                    border border-slate-200
                    text-xs text-slate-500
                    hover:bg-slate-50
                "
            >
                7 ngày
            </button>

        </div>

        {{-- Placeholder chart --}}
        <div class="h-[230px] flex items-end gap-3">

            @foreach([35,52,42,70,58,82,64] as $height)

                <div class="flex-1 h-full flex items-end">

                    <div
                        class="
                            w-full
                            rounded-t-lg
                            bg-[#0b1f3a]
                            opacity-[0.9]
                            hover:opacity-100
                            transition
                        "
                        style="height: {{ $height }}%"
                    ></div>

                </div>

            @endforeach

        </div>

        <div class="flex justify-between mt-3 text-[10px] text-slate-400">
            <span>Thứ 2</span>
            <span>Thứ 3</span>
            <span>Thứ 4</span>
            <span>Thứ 5</span>
            <span>Thứ 6</span>
            <span>Thứ 7</span>
            <span>CN</span>
        </div>

    </div>


    {{-- STATUS --}}
    <div class="admin-card">

        <div class="mb-7">

            <h2 class="section-title">
                Trạng thái
            </h2>

            <p class="section-subtitle">
                Phân bổ yêu cầu hiện tại.
            </p>

        </div>


        @php
            $statuses = [
                [
                    'name' => 'Chờ xử lý',
                    'value' => $pendingRequests ?? 0,
                    'color' => 'bg-amber-400',
                ],
                [
                    'name' => 'Đang xử lý',
                    'value' => $processingRequests ?? 0,
                    'color' => 'bg-blue-500',
                ],
                [
                    'name' => 'Hoàn thành',
                    'value' => $completedRequests ?? 0,
                    'color' => 'bg-emerald-500',
                ],
            ];

            $statusTotal = max(array_sum(array_column($statuses, 'value')), 1);
        @endphp


        <div class="space-y-6">

            @foreach($statuses as $status)

                @php
                    $percent = round(($status['value'] / $statusTotal) * 100);
                @endphp

                <div>

                    <div class="flex justify-between mb-2">

                        <span class="text-xs font-medium text-slate-600">
                            {{ $status['name'] }}
                        </span>

                        <span class="text-xs font-semibold text-slate-900">
                            {{ $status['value'] }}
                        </span>

                    </div>

                    <div class="h-2 bg-slate-100 rounded-full overflow-hidden">

                        <div
                            class="{{ $status['color'] }} h-full rounded-full transition-all duration-700"
                            style="width: {{ $percent }}%"
                        ></div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- RECENT REQUESTS --}}
{{-- ========================================================= --}}

<div class="admin-card !p-0 overflow-hidden">

    <div class="px-5 sm:px-6 py-5 border-b border-slate-100">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="section-title">
                    Yêu cầu mới nhất
                </h2>

                <p class="section-subtitle">
                    Những yêu cầu khách hàng vừa gửi.
                </p>

            </div>

            <a
                href="{{ route('admin.requests.index') }}"
                class="
                    text-xs
                    font-semibold
                    text-[#0b1f3a]
                    hover:text-emerald-600
                    transition
                "
            >
                Xem tất cả →
            </a>

        </div>

    </div>


    <div class="overflow-x-auto">

        <table class="admin-table">

            <thead>

                <tr>

                    <th>Mã yêu cầu</th>
                    <th>Khách hàng</th>
                    <th>Liên hệ</th>
                    <th>Trạng thái</th>
                    <th>Người xử lý</th>
                    <th>Thời gian</th>

                </tr>

            </thead>

            <tbody>

                @forelse(($recentRequests ?? []) as $request)

                    <tr>

                        <td>
                            <a
                                href="{{ route('admin.requests.show', $request->id) }}"
                                class="font-semibold text-[#0b1f3a] hover:text-emerald-600"
                            >
                                #{{ $request->id }}
                            </a>
                        </td>

                        <td>
                            <div class="font-medium text-slate-800">
                                {{ $request->name }}
                            </div>
                        </td>

                        <td>
                            <div class="text-xs text-slate-500">
                                {{ $request->phone }}
                            </div>

                            @if($request->email)
                                <div class="text-[11px] text-slate-400 mt-0.5">
                                    {{ $request->email }}
                                </div>
                            @endif
                        </td>

                        <td>

                            @php
                                $statusMap = [
                                    'pending' => [
                                        'label' => 'Chờ xử lý',
                                        'class' => 'status-warning'
                                    ],
                                    'processing' => [
                                        'label' => 'Đang xử lý',
                                        'class' => 'status-info'
                                    ],
                                    'completed' => [
                                        'label' => 'Hoàn thành',
                                        'class' => 'status-success'
                                    ],
                                    'cancelled' => [
                                        'label' => 'Đã hủy',
                                        'class' => 'status-danger'
                                    ],
                                ];

                                $currentStatus = $statusMap[$request->status] ?? [
                                    'label' => $request->status,
                                    'class' => 'status-neutral'
                                ];
                            @endphp

                            <span class="{{ $currentStatus['class'] }}">
                                {{ $currentStatus['label'] }}
                            </span>

                        </td>

                        <td>

                            @if(!empty($request->assigned_name))

                                <div class="flex items-center gap-2">

                                    <div
                                        class="
                                            w-7 h-7
                                            rounded-lg
                                            bg-slate-100
                                            flex items-center justify-center
                                            text-[10px]
                                            font-bold
                                        "
                                    >
                                        {{ strtoupper(substr($request->assigned_name, 0, 1)) }}
                                    </div>

                                    <span class="text-xs text-slate-600">
                                        {{ $request->assigned_name }}
                                    </span>

                                </div>

                            @else

                                <span class="text-xs text-slate-400">
                                    Chưa phân công
                                </span>

                            @endif

                        </td>

                        <td class="text-xs text-slate-400 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($request->created_at)->diffForHumans() }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="!py-16 text-center">

                            <div class="text-slate-300 text-3xl mb-3">
                                ○
                            </div>

                            <p class="text-sm font-medium text-slate-500">
                                Chưa có yêu cầu nào
                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection


@push('styles')

<style>

    .admin-card {
        background: #fff;
        border: 1px solid #e7ebf0;
        border-radius: 18px;
        padding: 20px;
        box-shadow:
            0 1px 2px rgba(15, 23, 42, .02);
        transition:
            box-shadow .2s ease,
            transform .2s ease;
    }

    .admin-card:hover {
        box-shadow:
            0 8px 28px rgba(15, 23, 42, .055);
    }

    .kpi-label {
        font-size: 12px;
        color: #64748b;
        font-weight: 500;
    }

    .kpi-number {
        margin-top: 7px;
        font-size: 30px;
        line-height: 1;
        font-weight: 750;
        letter-spacing: -.04em;
        color: #0f172a;
    }

    .kpi-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .kpi-icon svg {
        width: 20px;
        height: 20px;
    }

    .section-title {
        font-size: 14px;
        font-weight: 700;
        color: #0f172a;
    }

    .section-subtitle {
        margin-top: 3px;
        font-size: 11px;
        color: #94a3b8;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
    }

    .admin-table thead {
        background: #f8fafc;
    }

    .admin-table th {
        padding: 12px 20px;
        text-align: left;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .06em;
        color: #94a3b8;
        white-space: nowrap;
    }

    .admin-table td {
        padding: 15px 20px;
        border-top: 1px solid #f1f5f9;
        color: #475569;
        white-space: nowrap;
    }

    .admin-table tbody tr {
        transition: background .15s ease;
    }

    .admin-table tbody tr:hover {
        background: #f8fafc;
    }

    .status-warning,
    .status-info,
    .status-success,
    .status-danger,
    .status-neutral {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 9px;
        border-radius: 999px;
        font-size: 10px;
        font-weight: 600;
    }

    .status-warning {
        background: #fff7ed;
        color: #c2410c;
    }

    .status-info {
        background: #eff6ff;
        color: #2563eb;
    }

    .status-success {
        background: #ecfdf5;
        color: #047857;
    }

    .status-danger {
        background: #fef2f2;
        color: #dc2626;
    }

    .status-neutral {
        background: #f1f5f9;
        color: #64748b;
    }

</style>

@endpush