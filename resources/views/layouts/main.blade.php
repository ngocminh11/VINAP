<!doctype html>
<html lang="vi" class="h-full" style="font-size: 125%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','VINAP')</title>

    <meta name="description" content="Thẩm định giá & Tư vấn đầu tư • Chính xác • Khách quan • Minh bạch">
    <meta name="theme-color" content="#198e82">

    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@500;600;700;800&subset=vietnamese&display=swap" rel="stylesheet">

    {{-- ICON --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

    @vite('resources/js/app.js')
</head>

<body class="bg-gray-50 text-gray-800 min-h-full font-[Be_Vietnam_Pro] leading-relaxed">

    {{-- HEADER --}}
    <header class="bg-white border-b sticky top-0 z-50">
        @include('partials.header')
    </header>

    {{-- CONTENT --}}
    <main class="max-w-6xl mx-auto px-4 py-10">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-white border-t mt-6">
        @include('partials.footer', ['laws'=>$laws ?? [], 'links'=>$links ?? []])
    </footer>

</body>

</html>