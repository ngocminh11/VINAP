@extends('layouts.main')
@section('title','VINAP • Khách hàng')

@section('content')

{{-- LOGO BACKGROUND --}}
    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <img src="{{ asset('images/vinaplogo.png') }}"
             class="w-[400px] md:w-[700px] lg:w-[900px] opacity-[0.1] contrast-125 select-none"
             alt="">
    </div>

<nav class="text-sm text-neutral-500 mb-4">
    <a href="/" class="hover:text-brand">Trang chủ</a>
    <span class="mx-1">/</span>
    <span class="text-neutral-700">Khách hàng</span>
</nav>

<section class="clients-single bg-white rounded-2xl shadow-soft overflow-hidden">
    <div class="px-5 py-4 border-b">
        <h1 class="text-xl md:text-2xl font-bold">Danh sách khách hàng tiêu biểu</h1>
    </div>

    @php
    // Nhận danh sách từ route: $imgs = ['kh1.jpg', 'kh 10.jpg', ...]
    // Nếu chưa truyền, dùng fallback cho an toàn
    $files = $imgs ?? [
    'kh1.jpg','kh2.jpg','kh3.jpg','kh4.jpg','kh5.jpg','kh6.jpg',
    'kh07.jpg','kh08.jpg','kh09.jpg','kh 10.jpg','kh 11.jpg','kh_12.jpg',
    ];

    // Helper tạo URL local: public/images/<file>
        $toUrl = function (string $name) {
        // encode khoảng trắng -> %20 để không lỗi đường dẫn
        $encoded = str_replace(' ', '%20', $name);
        return asset('images/'.$encoded);
        };
        @endphp

        <div class="max-w-4xl mx-auto p-4 md:p-6 space-y-6">
            @foreach($files as $idx => $f)
            <figure class="page">
                <img
                    src="{{ $toUrl($f) }}"
                    alt="Danh sách khách hàng – trang {{ $idx + 1 }}"
                    class="client-img"
                    loading="{{ $idx < 2 ? 'eager' : 'lazy' }}"
                    fetchpriority="{{ $idx === 0 ? 'high' : 'auto' }}">
            </figure>
            @endforeach
        </div>
</section>

<style>
    /* Thu gọn bề ngang để mỗi trang ~500-560px, vẫn responsive */
    .clients-single .page {
        width: min(560px, 100%);
        max-width: 560px;
        margin: 0 auto 20px;
    }

    .clients-single .client-img {
        display: block;
        width: 100% !important;
        height: auto !important;
        max-height: none !important;
        object-fit: contain;
        border: 1px solid rgba(0, 0, 0, .08);
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, .06);
    }
</style>
@endsection