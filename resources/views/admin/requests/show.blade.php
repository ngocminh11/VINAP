@extends('admin.layouts.app')

@section('title', $requestData->request_code . ' - VINAP')

@section('content')

<div class="mb-6">

    <a
        href="{{ route('admin.requests.index') }}"
        class="text-sm text-brand"
    >
        ← Quay lại danh sách
    </a>

    <div class="flex flex-col md:flex-row
                md:items-center md:justify-between
                gap-3 mt-4">

        <div>

            <h1 class="text-2xl font-bold">
                {{ $requestData->request_code }}
            </h1>

            <p class="text-sm text-neutral-500 mt-1">
                Yêu cầu được tạo
                {{ \Carbon\Carbon::parse($requestData->created_at)->format('d/m/Y H:i') }}
            </p>

        </div>


        @include(
            'admin.requests.partials.status',
            ['status' => $requestData->status]
        )

    </div>

</div>


<div class="grid lg:grid-cols-3 gap-6">

    {{-- LEFT --}}
    <div class="lg:col-span-2 space-y-6">

        {{-- CUSTOMER --}}
        <div class="bg-white rounded-2xl
                    ring-1 ring-neutral-200/60
                    p-6">

            <h2 class="font-semibold mb-5">
                Thông tin khách hàng
            </h2>


            <div class="grid md:grid-cols-2 gap-5">

                <div>

                    <div class="text-xs text-neutral-500">
                        Họ tên
                    </div>

                    <div class="font-medium mt-1">
                        {{ $requestData->name }}
                    </div>

                </div>


                <div>

                    <div class="text-xs text-neutral-500">
                        Số điện thoại
                    </div>

                    <div class="font-medium mt-1">
                        {{ $requestData->phone }}
                    </div>

                </div>


                <div>

                    <div class="text-xs text-neutral-500">
                        Email
                    </div>

                    <div class="mt-1">
                        {{ $requestData->email ?: 'Không cung cấp' }}
                    </div>

                </div>


                <div>

                    <div class="text-xs text-neutral-500">
                        Địa chỉ
                    </div>

                    <div class="mt-1">
                        {{ $requestData->address ?: 'Không cung cấp' }}
                    </div>

                </div>

            </div>


            @if($requestData->message)

                <div class="border-t mt-6 pt-5">

                    <div class="text-xs text-neutral-500">
                        Nội dung
                    </div>

                    <div class="mt-2 whitespace-pre-line">
                        {{ $requestData->message }}
                    </div>

                </div>

            @endif

        </div>


        {{-- STATUS HISTORY --}}
        <div class="bg-white rounded-2xl
                    ring-1 ring-neutral-200/60
                    p-6">

            <h2 class="font-semibold mb-6">
                Lịch sử xử lý
            </h2>


            <div class="space-y-5">

                @forelse($histories as $history)

                    <div class="flex gap-4">

                        <div class="w-2 h-2 mt-2
                                    rounded-full bg-brand
                                    shrink-0">
                        </div>


                        <div class="flex-1">

                            <div class="flex flex-wrap
                                        justify-between gap-2">

                                <div class="font-medium">

                                    {{ $history->admin_name ?? 'Khách hàng' }}

                                </div>

                                <div class="text-xs text-neutral-400">

                                    {{ \Carbon\Carbon::parse($history->created_at)->format('d/m/Y H:i') }}

                                </div>

                            </div>


                            <div class="text-sm mt-1">

                                {{ $history->old_status
                                    ? $history->old_status . ' → '
                                    : ''
                                }}

                                {{ $history->new_status }}

                            </div>


                            @if($history->note)

                                <div class="text-sm text-neutral-500 mt-1">
                                    {{ $history->note }}
                                </div>

                            @endif

                        </div>

                    </div>

                @empty

                    <div class="text-sm text-neutral-500">
                        Chưa có lịch sử.
                    </div>

                @endforelse

            </div>

        </div>


        {{-- NOTES --}}
        <div class="bg-white rounded-2xl
                    ring-1 ring-neutral-200/60
                    p-6">

            <h2 class="font-semibold mb-5">
                Ghi chú nội bộ
            </h2>


            <form
                method="POST"
                action="{{ route('admin.requests.notes', $requestData->id) }}"
                class="mb-6"
            >

                @csrf

                <textarea
                    name="content"
                    required
                    rows="3"
                    maxlength="5000"
                    class="w-full border rounded-xl
                           px-4 py-3"
                    placeholder="Nhập ghi chú nội bộ..."
                ></textarea>


                <button
                    class="mt-3 bg-brand text-white
                           px-5 py-2.5 rounded-xl"
                >
                    Thêm ghi chú
                </button>

            </form>


            <div class="space-y-4">

                @foreach($notes as $note)

                    <div class="border rounded-xl p-4">

                        <div class="flex justify-between">

                            <div class="font-medium text-sm">
                                {{ $note->admin_name }}
                            </div>

                            <div class="text-xs text-neutral-400">
                                {{ \Carbon\Carbon::parse($note->created_at)->format('d/m/Y H:i') }}
                            </div>

                        </div>


                        <p class="text-sm text-neutral-600 mt-2 whitespace-pre-line">
                            {{ $note->content }}
                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    </div>


    {{-- RIGHT --}}
    <div class="space-y-6">

        {{-- STATUS --}}
        <div class="bg-white rounded-2xl
                    ring-1 ring-neutral-200/60
                    p-6">

            <h2 class="font-semibold mb-5">
                Cập nhật trạng thái
            </h2>


            <form
                method="POST"
                action="{{ route('admin.requests.status', $requestData->id) }}"
                class="space-y-4"
            >

                @csrf

                <select
                    name="status"
                    class="w-full border rounded-xl px-4 py-3"
                >

                    <option value="pending" @selected($requestData->status === 'pending')}>
                        Chờ xử lý
                    </option>

                    <option value="assigned" @selected($requestData->status === 'assigned')}>
                        Đã phân công
                    </option>

                    <option value="contacted" @selected($requestData->status === 'contacted')}>
                        Đã liên hệ
                    </option>

                    <option value="processing" @selected($requestData->status === 'processing')}>
                        Đang xử lý
                    </option>

                    <option value="completed" @selected($requestData->status === 'completed')}>
                        Hoàn thành
                    </option>

                    <option value="cancelled" @selected($requestData->status === 'cancelled')}>
                        Đã hủy
                    </option>

                </select>


                <textarea
                    name="note"
                    rows="3"
                    maxlength="1000"
                    class="w-full border rounded-xl px-4 py-3"
                    placeholder="Ghi chú thay đổi..."
                ></textarea>


                <button
                    class="w-full bg-brand
                           text-white rounded-xl
                           py-3 font-medium"
                >
                    Cập nhật
                </button>

            </form>

        </div>


        {{-- ASSIGN --}}
        <div class="bg-white rounded-2xl
                    ring-1 ring-neutral-200/60
                    p-6">

            <h2 class="font-semibold mb-5">
                Người xử lý
            </h2>


            <div class="mb-4">

                <div class="text-xs text-neutral-500">
                    Hiện tại
                </div>

                <div class="font-medium mt-1">
                    {{ $requestData->assigned_admin_name ?? 'Chưa phân công' }}
                </div>

            </div>


            <form
                method="POST"
                action="{{ route('admin.requests.assign', $requestData->id) }}"
                class="space-y-4"
            >

                @csrf

                <select
                    name="admin_id"
                    required
                    class="w-full border rounded-xl px-4 py-3"
                >

                    <option value="">
                        Chọn nhân viên
                    </option>

                    @foreach($admins as $admin)

                        <option
                            value="{{ $admin->id }}"
                            @selected($requestData->assigned_admin_id == $admin->id)
                        >
                            {{ $admin->name }}
                        </option>

                    @endforeach

                </select>


                <textarea
                    name="note"
                    rows="2"
                    maxlength="500"
                    class="w-full border rounded-xl px-4 py-3"
                    placeholder="Ghi chú phân công..."
                ></textarea>


                <button
                    class="w-full bg-neutral-900
                           text-white rounded-xl
                           py-3 font-medium"
                >
                    Phân công
                </button>

            </form>

        </div>


        {{-- META --}}
        <div class="bg-white rounded-2xl
                    ring-1 ring-neutral-200/60
                    p-6">

            <h2 class="font-semibold mb-4">
                Thông tin hệ thống
            </h2>

            <div class="space-y-3 text-sm">

                <div class="flex justify-between gap-3">
                    <span class="text-neutral-500">
                        Nguồn
                    </span>

                    <span>
                        {{ $requestData->source }}
                    </span>
                </div>


                <div class="flex justify-between gap-3">
                    <span class="text-neutral-500">
                        Dịch vụ
                    </span>

                    <span>
                        {{ $requestData->service_type }}
                    </span>
                </div>


                <div class="flex justify-between gap-3">
                    <span class="text-neutral-500">
                        Ưu tiên
                    </span>

                    <span>
                        {{ $requestData->priority }}
                    </span>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection