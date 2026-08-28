<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Đăng nhập - VINAP</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="min-h-screen bg-neutral-100 flex items-center justify-center p-5">

<div class="w-full max-w-md">

    {{-- LOGO --}}
    <div class="text-center mb-8">

        <div class="text-3xl font-bold text-brand">
            VINAP
        </div>

        <div class="text-sm text-neutral-500 mt-1">
            Hệ thống quản trị
        </div>

    </div>


    {{-- LOGIN CARD --}}
    <div class="bg-white rounded-3xl shadow-xl
                ring-1 ring-neutral-200/60 p-7">

        <h1 class="text-xl font-semibold">
            Đăng nhập
        </h1>

        <p class="text-sm text-neutral-500 mt-1 mb-6">
            Đăng nhập để quản lý yêu cầu khách hàng.
        </p>


        @if($errors->any())

            <div class="mb-5 bg-red-50
                        border border-red-200
                        text-red-700
                        rounded-xl px-4 py-3 text-sm">

                {{ $errors->first() }}

            </div>

        @endif


        <form
            method="POST"
            action="{{ route('admin.login.submit') }}"
            class="space-y-5"
        >

            @csrf


            <div>

                <label class="block text-sm font-medium mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    class="w-full border border-neutral-300
                           rounded-xl px-4 py-3
                           focus:outline-none
                           focus:ring-2 focus:ring-brand/20
                           focus:border-brand"
                    placeholder="admin@vinap.vn"
                >

            </div>


            <div>

                <label class="block text-sm font-medium mb-2">
                    Mật khẩu
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    class="w-full border border-neutral-300
                           rounded-xl px-4 py-3
                           focus:outline-none
                           focus:ring-2 focus:ring-brand/20
                           focus:border-brand"
                    placeholder="••••••••"
                >

            </div>


            <button
                type="submit"
                class="w-full bg-brand text-white
                       rounded-xl py-3 font-semibold
                       hover:opacity-90 transition"
            >
                Đăng nhập
            </button>

        </form>

    </div>


    <div class="text-center text-xs text-neutral-400 mt-6">
        VINAP Management System
    </div>

</div>

</body>
</html>