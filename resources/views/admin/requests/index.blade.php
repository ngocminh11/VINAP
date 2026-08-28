@extends('admin.layouts.app')

@section('title', 'Yêu cầu - VINAP')

@section('content')

<div class="flex flex-col md:flex-row
            md:items-center md:justify-between
            gap-4 mb-6">

    <div>

        <h1 class="text-2xl font-bold">
            Yêu cầu khách hàng
        </h1>

        <p class="text-sm text-neutral-500 mt-1">
            Quản lý và theo dõi toàn bộ yêu cầu.
        </p>

    </div>

</div>


{{-- FILTER --}}
<form
    method="GET"
    class="bg-white rounded-2xl
           ring-1 ring-neutral-200/60
           p-4 mb-5"
>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-3">

        <input
            type="text"
            name="q"
            value="{{ request('q') }}"
            placeholder="Mã, tên, SĐT, email..."
            class="border rounded-xl px-4 py-2.5"
        >


        <select
            name="status"
            class="border rounded-xl px-4 py-2.5"
        >

            <option value="">
                Tất cả trạng thái
            </option>

            <option value="pending" @selected(request('status') === 'pending')}>
                Chờ xử lý
            </option>

            <option value="assigned" @selected(request('status') === 'assigned')}>
                Đã phân công
            </option>

            <option value="contacted" @selected(request('status') === 'contacted')}>
                Đã liên hệ
            </option>

            <option value="processing" @selected(request('status') === 'processing')}>
                Đang xử lý
            </option>

            <option value="completed" @selected(request('status') === 'completed')}>
                Hoàn thành
            </option>

            <option value="cancelled" @selected(request('status') === 'cancelled')}>
                Đã hủy
            </option>

        </select>


        <select
            name="priority"
            class="border rounded-xl px-4 py-2.5"
        >

            <option value="">
                Tất cả ưu tiên
            </option>

            <option value="urgent" @selected(request('priority') === 'urgent')}>
                Khẩn cấp
            </option>

            <option value="high" @selected(request('priority') === 'high')}>
                Cao
            </option>

            <option value="normal" @selected(request('priority') === 'normal')}>
                Bình thường
            </option>

            <option value="low" @selected(request('priority') === 'low')}>
                Thấp
            </option>

        </select>


        <button
            class="bg-brand text-white rounded-xl
                   px-5 py-2.5 font-medium"
        >
            Lọc dữ liệu
        </button>

    </div>

</form>


{{-- TABLE --}}
<div class="bg-white rounded-2xl
            ring-1 ring-neutral-200/60
            overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead class="bg-neutral-50">

            <tr>

                <th class="px-5 py-4 text-left">
                    Mã yêu cầu
                </th>

                <th class="px-5 py-4 text-left">
                    Khách hàng
                </th>

                <th class="px-5 py-4 text-left">
                    Dịch vụ
                </th>

                <th class="px-5 py-4 text-left">
                    Ưu tiên
                </th>

                <th class="px-5 py-4 text-left">
                    Trạng thái
                </th>

                <th class="px-5 py-4 text-left">
                    Người xử lý
                </th>

                <th class="px-5 py-4">
                </th>

            </tr>

            </thead>


            <tbody class="divide-y">

            @forelse($requests as $item)

                <tr class="hover:bg-neutral-50 transition">

                    <td class="px-5 py-4">

                        <a
                            href="{{ route('admin.requests.show', $item->id) }}"
                            class="font-semibold text-brand"
                        >
                            {{ $item->request_code }}
                        </a>

                        <div class="text-xs text-neutral-400 mt-1">

                            {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }}

                        </div>

                    </td>


                    <td class="px-5 py-4">

                        <div class="font-medium">
                            {{ $item->name }}
                        </div>

                        <div class="text-xs text-neutral-500">
                            {{ $item->phone }}
                        </div>

                    </td>


                    <td class="px-5 py-4">

                        {{ str_replace('_', ' ', $item->service_type) }}

                    </td>


                    <td class="px-5 py-4">

                        {{ ucfirst($item->priority) }}

                    </td>


                    <td class="px-5 py-4">

                        @include(
                            'admin.requests.partials.status',
                            ['status' => $item->status]
                        )

                    </td>


                    <td class="px-5 py-4">

                        {{ $item->assigned_admin_name ?? 'Chưa phân công' }}

                    </td>


                    <td class="px-5 py-4 text-right">

                        <a
                            href="{{ route('admin.requests.show', $item->id) }}"
                            class="text-brand font-medium"
                        >
                            Xem
                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="7"
                        class="px-5 py-12 text-center text-neutral-500"
                    >
                        Không tìm thấy yêu cầu.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>


    {{-- PAGINATION --}}
    <div class="px-5 py-4 border-t">

        {{ $requests->links() }}

    </div>

</div>

@endsection