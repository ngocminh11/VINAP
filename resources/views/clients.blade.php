@extends('layouts.main')
@section('title','VINAP • Khách hàng')

@section('content')
<nav class="text-sm text-neutral-500 mb-4">
    <a href="/" class="hover:text-brand">Trang chủ</a>
    <span class="mx-1">/</span>
    <span class="text-neutral-700">Khách hàng</span>
</nav>

<section class="clients-single bg-white rounded-2xl shadow-soft overflow-hidden">
    <div class="px-5 py-4 border-b">
        <h1 class="text-xl md:text-2xl font-bold">Danh sách khách hàng tiêu biểu</h1>
        <p class="text-sm text-neutral-600">Ảnh kh1 → kh12, hiển thị 1 cột, cùng bề ngang.</p>
    </div>

    @php
    // Tên file đúng theo máy chủ:
    $imgs = [
    'kh1.jpg','kh2.jpg','kh3.jpg','kh4.jpg','kh5.jpg','kh6.jpg',
    'kh07.jpg','kh08.jpg','kh09.jpg','kh_10.jpg','kh_11.jpg','kh_12.jpg',
    ];
    $base = 'https://vinap.vn/image/data/khach-hang/';
    @endphp

    <div class="max-w-4xl mx-auto p-4 md:p-6 space-y-6">
        @foreach($imgs as $idx => $f)
        @php
        // Fallbacks để phòng khi server dùng khoảng trắng hay bỏ gạch dưới
        $alt1 = str_replace('_','%20',$f); // "kh_10.jpg" -> "kh%2010.jpg"
        $alt2 = str_replace(['%20','_'],'',$alt1); // -> "kh10.jpg"
        @endphp
        <figure class="page">
            <img
                src="{{ $base.$f }}"
                data-alt1="{{ $base.$alt1 }}"
                data-alt2="{{ $base.$alt2 }}"
                onerror="
              if(this.dataset.alt1){ this.src=this.dataset.alt1; this.dataset.alt1=''; }
              else if(this.dataset.alt2){ this.src=this.dataset.alt2; this.dataset.alt2=''; }
              else { this.onerror=null; }
            "
                alt="Danh sách khách hàng – trang {{ $idx + 1 }}"
                class="client-img"
                loading="{{ $idx < 2 ? 'eager' : 'lazy' }}"
                fetchpriority="{{ $idx === 0 ? 'high' : 'auto' }}">
        </figure>
        @endforeach
    </div>
</section>

<style>
    /* Thu nhỏ bề ngang mỗi trang ảnh ~500+ px và vẫn responsive */
    .clients-single .page {
        width: min(560px, 100%);
        /* <= đổi 560 thành 520/540/600 tuỳ bạn */
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