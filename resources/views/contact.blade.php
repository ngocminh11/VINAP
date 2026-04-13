@extends('layouts.main')
@section('title','VINAP • Liên hệ')

@section('content')

{{-- LOGO BACKGROUND --}}
    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <img src="{{ asset('images/vinaplogo.png') }}"
             class="w-[400px] md:w-[700px] lg:w-[900px] opacity-[0.1] contrast-125 select-none"
             alt="">
    </div>

<nav class="text-sm text-neutral-500 mb-4">
    <a href="{{ route('home') }}" class="hover:text-brand">Trang chủ</a>
    <span class="mx-1">/</span>
    <span class="text-neutral-700">Liên hệ</span>
</nav>

<section class="grid lg:grid-cols-3 gap-6">
    {{-- Thông tin công ty --}}
    <aside class="bg-white rounded-2xl shadow-soft p-5">
        <h1 class="text-xl md:text-2xl font-bold">
            CÔNG TY CP THẨM ĐỊNH GIÁ &amp; TƯ VẤN ĐẦU TƯ VIỆT NAM – VINAP
        </h1>

        <div class="mt-4 space-y-3 text-sm leading-6">
            <div>
                <div class="text-neutral-500">Địa chỉ</div>
                <div class="font-medium">
                    Khu biệt thự Nine South, số 9 đường số 7, khu dân cư Vina Nam Phú, Nhà Bè, TP. Hồ Chí Minh
                </div>
            </div>

            <div>
                <div class="text-neutral-500">Điện thoại</div>
                <div class="font-medium">
                    <a class="hover:text-brand" href="tel:+842839330833">(+84.028) 3933 0833</a>
                    · Hotline:
                    <a class="hover:text-brand" href="tel:+84917168816">(+84) 917 168 816</a>
                </div>
            </div>

            {{-- Nếu có email thì mở comment dưới --}}
            {{-- <div>
                <div class="text-neutral-500">Email</div>
                <div class="font-medium"><a class="hover:text-brand" href="mailto:info@vinap.vn">info@vinap.vn</a></div>
            </div> --}}

            <div class="pt-2">
                @php
                $addr = 'Khu biệt thự Nine South, số 9 đường số 7, khu dân cư Vina Nam Phú, Nhà Bè, TP.HCM';
                @endphp
                <a
                    href="https://www.google.com/maps/search/?api=1&query={{ urlencode($addr) }}"
                    target="_blank" rel="noopener"
                    class="inline-flex items-center gap-2 text-brand text-sm font-medium">
                    Mở trong Google Maps →
                </a>
            </div>
        </div>
    </aside>

    {{-- Bản đồ --}}
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-soft overflow-hidden">
        <div class="px-5 py-4 border-b">
            <h2 class="text-lg font-semibold">Bản đồ</h2>
            <p class="text-sm text-neutral-600">Tìm đường tới văn phòng VINAP</p>
        </div>

        {{-- Khung bản đồ responsive: 4:3 trên mobile, 16:9 từ sm+ --}}
        <div class="relative w-full aspect-[4/3] sm:aspect-[16/9]">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7840.994103393596!2d106.71996633471558!3d10.69609223955326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317531ff515252e9%3A0x845eb8ef8e5b382a!2zQ8O0bmcgdHkgQ1AgVGjhuqltIMSR4buLbmggZ2nDoSB2w6AgVMawIHbhuqVuIMSQ4bqndSB0xrAgVmnhu4d0IE5hbSAtIFZJTkFQ!5e0!3m2!1svi!2s!4v1775445664555!5m2!1svi!2s"
                class="absolute inset-0 w-full h-full"
                style="border:0"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                allowfullscreen>
            </iframe>
        </div>
    </div>
</section>
@endsection