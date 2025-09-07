<!doctype html>
<html lang="vi" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','VINAP')</title>
    <meta name="description" content="Thẩm định giá & Tư vấn đầu tư • Chính xác • Khách quan • Minh bạch">
    <meta name="theme-color" content="#198e82">

    {{-- Favicon / App icons (PHẢI nằm trong <head>) --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

    @vite('resources/js/app.js')
</head>

<body class="bg-brand-50 text-neutral-800 min-h-full">
    @include('partials.header') {{-- NAV luôn đọc từ config ở partial --}}
    <main class="section py-8">
        @yield('content')
    </main>
    @include('partials.footer', ['laws'=>$laws ?? [], 'links'=>$links ?? []])
</body>

</html>