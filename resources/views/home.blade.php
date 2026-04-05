@extends('layouts.main')
@section('title','VINAP • Trang chủ')

@section('content')

{{-- LOGO BACKGROUND --}}
    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <img src="{{ asset('images/vinaplogo.png') }}"
             class="w-[400px] md:w-[700px] lg:w-[900px] opacity-[0.08] contrast-125 select-none"
             alt="">
    </div>

@php
// Placeholder SVG nếu thiếu ảnh
$PH = 'data:image/svg+xml;utf8,' . rawurlencode('
<svg xmlns="http://www.w3.org/2000/svg" width="1600" height="500">
    <rect width="100%" height="100%" fill="#f1f5f9" />
    <rect x="1" y="1" width="1598" height="498" fill="none" stroke="#e2e8f0" />
    <text x="50%" y="50%" font-size="42" text-anchor="middle" dominant-baseline="middle"
        font-family="Inter,Arial" fill="#94a3b8">Image here (banner)</text>
</svg>');

// Helper: có src thì dùng, không có thì dùng placeholder
$imgSrc = function ($src) use ($PH) {
return isset($src) && trim((string)$src) !== '' ? $src : $PH;
};

// Banner (có thể truyền từ controller). Nếu chưa có, dùng mặc định.
$banners = ($banners ?? [
asset('images/hero-1.jpg'),
asset('images/hero-2.jpg'),
asset('images/hero-3.jpg'),
]);
@endphp

{{-- ================= HERO (blend mượt) ================= --}}
<section class="relative">
    {{-- SLIDER: ảnh ở TRÊN --}}
    <div id="heroSlider"
        class="relative overflow-hidden rounded-2xl shadow-soft ring-1 ring-neutral-200/60 bg-neutral-100
              pb-10 md:pb-12"> {{-- chừa đáy cho dots & fade --}}
        <div class="slides flex transition-transform duration-700 ease-out">
            @foreach($banners as $src)
            <figure class="min-w-full">
                <img
                    src="{{ $imgSrc($src) }}"
                    onerror="this.onerror=null;this.src='{{ $PH }}';"
                    alt="VINAP banner {{ $loop->iteration }}"
                    class="block w-full h-[220px] sm:h-[300px] md:h-[420px] lg:h-[480px] xl:h-[520px] object-cover object-center"
                    loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                    fetchpriority="{{ $loop->first ? 'high' : 'auto' }}">
            </figure>
            @endforeach
        </div>

        {{-- Nút điều hướng --}}
        <button type="button" data-prev
            class="hidden md:flex absolute left-3 top-1/2 -translate-y-1/2 h-9 w-9 items-center justify-center rounded-full bg-black/35 hover:bg-black/50 text-white">
            <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.5 19.5 8 12l7.5-7.5" />
            </svg>
        </button>
        <button type="button" data-next
            class="hidden md:flex absolute right-3 top-1/2 -translate-y-1/2 h-9 w-9 items-center justify-center rounded-full bg-black/35 hover:bg-black/50 text-white">
            <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.5 4.5 16 12l-7.5 7.5" />
            </svg>
        </button>

        {{-- Dots --}}
        <div class="absolute bottom-3 left-0 right-0 flex justify-center gap-2">
            @foreach($banners as $i => $src)
            <button type="button" data-dot="{{ $i }}"
                class="w-2.5 h-2.5 rounded-full bg-white/60 hover:bg-white data-[active=true]:bg-brand"
                aria-label="Tới banner {{ $i+1 }}"></button>
            @endforeach
        </div>

        {{-- F A D E  đáy banner để hòa nền trang --}}
        <div class="pointer-events-none absolute inset-x-0 -bottom-px h-16 md:h-20
                bg-gradient-to-b from-transparent to-brand-50/90"></div>
    </div>

    {{-- CARD NỘI DUNG: chồng nhẹ lên banner (~12–20px) --}}
    <div class="relative z-10 -mt-6 sm:-mt-8 md:-mt-10 lg:-mt-12">
        <div class="mx-auto max-w-4xl bg-white/95 backdrop-blur rounded-2xl shadow-soft
                ring-1 ring-neutral-200/60 px-6 py-6 md:px-10 md:py-9">
            <p class="kicker">VINAP INSIGHTS</p>
            <h1 class="text-3xl md:text-5xl font-bold mt-2 leading-tight">
                Thẩm định giá & tư vấn đầu tư <span class="text-brand">chuẩn dữ liệu</span>
            </h1>
            <p class="mt-3 text-neutral-600">Quyết định chắc tay, pháp lý vững, báo cáo rõ ràng.</p>

            <div class="mt-6 flex flex-wrap gap-3">
                <a href="#services" class="btn-primary">Xem dịch vụ</a>
                <a href="#reports" class="btn-ghost">Tải hồ sơ năng lực</a>
            </div>

            <div class="mt-7 grid grid-cols-3 gap-5 md:gap-6 text-sm">
                <div>
                    <div class="text-3xl font-bold counter" data-to="15">0</div>Năm kinh nghiệm
                </div>
                <div>
                    <div class="text-3xl font-bold counter" data-to="1200">0</div>Hồ sơ/năm
                </div>
                <div>
                    <div class="text-3xl font-bold counter" data-to="98">0</div>% khách hàng quay lại
                </div>
            </div>
        </div>
    </div>
</section>


{{-- JS: autoplay + điều hướng + swipe --}}
<script>
    (() => {
        const root = document.querySelector('#heroSlider');
        if (!root) return;
        const track = root.querySelector('.slides');
        const slides = Array.from(track.children);
        const dots = root.querySelectorAll('[data-dot]');
        const prev = root.querySelector('[data-prev]');
        const next = root.querySelector('[data-next]');
        const N = slides.length;
        const INTERVAL = 5000; // ms

        let i = 0,
            timer;

        function go(n) {
            i = (n + N) % N;
            track.style.transform = `translateX(-${i * 100}%)`;
            dots.forEach((d, idx) => d.dataset.active = (idx === i) ? 'true' : 'false');
        }

        function play() {
            stop();
            timer = setInterval(() => go(i + 1), INTERVAL);
        }

        function stop() {
            if (timer) clearInterval(timer);
        }

        prev?.addEventListener('click', () => {
            stop();
            go(i - 1);
            play();
        });
        next?.addEventListener('click', () => {
            stop();
            go(i + 1);
            play();
        });
        dots.forEach((d, idx) => d.addEventListener('click', () => {
            stop();
            go(idx);
            play();
        }));

        root.addEventListener('mouseenter', stop);
        root.addEventListener('mouseleave', play);

        // Swipe mobile
        let sx = 0;
        root.addEventListener('touchstart', e => {
            sx = e.touches[0].clientX;
            stop();
        }, {
            passive: true
        });
        root.addEventListener('touchend', e => {
            const dx = e.changedTouches[0].clientX - sx;
            if (Math.abs(dx) > 40) go(i + (dx < 0 ? 1 : -1));
            play();
        }, {
            passive: true
        });

        go(0);
        play();
    })();
</script>

{{-- ================= DẢI Ô DỊCH VỤ ================= --}}
<section id="services" class="mt-10 grid sm:grid-cols-2 lg:grid-cols-5 gap-4">
    @foreach(($serviceTiles ?? []) as $st)
    <article class="bg-white rounded-xl shadow-soft overflow-hidden group">
        <div class="aspect-[4/3] min-h-[150px]">
            <img
                src="{{ $imgSrc($st['img'] ?? null) }}"
                onerror="this.onerror=null;this.src='{{ $PH }}';"
                alt="{{ $st['title'] ?? 'Service' }}"
                class="w-full h-full object-cover group-hover:scale-105 transition"
                loading="lazy">
        </div>
        <div class="px-3 py-3">
            <h3 class="text-sm font-semibold text-center">{{ $st['title'] ?? 'Dịch vụ' }}</h3>
        </div>
    </article>
    @endforeach
</section>

{{-- ================= HOẠT ĐỘNG + SIDEBAR ================= --}}
<section class="mt-12 grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-2xl shadow-soft ring-1 ring-neutral-200/60">
            <div class="px-5 py-4 border-b">
                <h2 class="text-lg font-bold">Hoạt động công ty</h2>
            </div>
            <ul class="divide-y">
                @foreach(($companyActivities ?? []) as $a)
                <li class="p-5 flex gap-4">
                    <img
                        src="{{ $imgSrc($a['img'] ?? null) }}"
                        onerror="this.onerror=null;this.src='{{ $PH }}';"
                        alt=""
                        class="w-28 h-20 rounded-lg object-cover"
                        loading="lazy">
                    <div class="min-w-0">
                        <h3 class="font-semibold leading-snug">{{ $a['title'] ?? '' }}</h3>
                        <p class="text-sm text-neutral-600 mt-1">{{ $a['desc'] ?? '' }}</p>
                        <div class="mt-2 text-xs text-neutral-500 flex items-center gap-3">
                            <span>{{ $a['date'] ?? '' }}</span>
                            <a href="#" class="text-brand">Xem tiếp</a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white rounded-2xl shadow-soft ring-1 ring-neutral-200/60">
            <div class="px-5 py-4 border-b">
                <h2 class="text-lg font-bold">Tin tức</h2>
            </div>
            <ul class="divide-y">
                @foreach(($news ?? []) as $n)
                <li class="p-5 flex items-center justify-between">
                    <a href="#" class="hover:text-brand">{{ $n['title'] ?? '' }}</a>
                    <span class="text-xs text-neutral-500">{{ $n['date'] ?? '' }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <aside class="space-y-6">
        <div class="bg-white rounded-2xl shadow-soft ring-1 ring-neutral-200/60">
            <div class="px-5 py-4 border-b flex items-center justify-between">
                <h3 class="font-semibold">Dịch vụ đã thực hiện</h3>
                <div class="flex gap-1">
                    @foreach(($deliveredServices ?? []) as $i => $d)
                    <button class="w-2.5 h-2.5 rounded-full bg-neutral-300 data-[active=true]:bg-brand"
                        data-dot="{{ $i }}"></button>
                    @endforeach
                </div>
            </div>
            <div id="deliveredSlider" class="relative overflow-hidden">
                @foreach(($deliveredServices ?? []) as $i => $d)
                <figure class="slide {{ $i===0 ? 'block' : 'hidden' }}">
                    <img
                        src="{{ $imgSrc($d['img'] ?? null) }}"
                        onerror="this.onerror=null;this.src='{{ $PH }}';"
                        alt=""
                        class="w-full h-44 object-cover"
                        loading="lazy">
                    <figcaption class="px-5 py-3 text-sm text-center text-neutral-600">{{ $d['caption'] ?? '' }}</figcaption>
                </figure>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-soft ring-1 ring-neutral-200/60">
            <div class="px-5 py-4 border-b">
                <h3 class="font-semibold">Văn bản pháp luật</h3>
            </div>
            <ul class="p-5 space-y-2 text-sm">
                @foreach(($laws ?? []) as $law)
                <li class="flex gap-2"><span class="mt-1 h-1.5 w-1.5 rounded-full bg-accent"></span>{{ $law }}</li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white rounded-2xl shadow-soft ring-1 ring-neutral-200/60">
            <div class="px-5 py-4 border-b">
                <h3 class="font-semibold">Liên kết web</h3>
            </div>
            <ul class="p-5 space-y-2 text-sm">
                @foreach(($links ?? []) as $l)
                <li><a class="hover:text-brand" href="{{ $l['href'] ?? '#' }}">{{ $l['label'] ?? '' }}</a></li>
                @endforeach
            </ul>
        </div>
    </aside>
</section>

{{-- ================= CASE STUDIES / DỰ ÁN ================= --}}
<section id="reports" class="mt-12">
    <div class="flex items-end justify-between">
        <div>
            <p class="kicker">Case study</p>
            <h2 class="text-2xl md:text-3xl font-bold">Dự án tiêu biểu</h2>
        </div>
        <a href="#" class="text-sm text-brand">Kho báo cáo →</a>
    </div>
    <div class="mt-6 grid md:grid-cols-3 gap-6">
        @foreach(($cases ?? []) as $c)
        <article class="relative rounded-2xl overflow-hidden shadow-soft ring-1 ring-neutral-200/60 reveal">
            <img
                src="{{ $imgSrc($c['img'] ?? null) }}"
                onerror="this.onerror=null;this.src='{{ $PH }}';"
                alt="{{ $c['title'] ?? '' }}"
                class="h-64 w-full object-cover"
                loading="lazy">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0"></div>
            <div class="absolute left-0 right-0 bottom-0 p-5 text-white">
                <span class="text-xs px-2 py-1 bg-white/15 rounded-full">{{ $c['tag'] ?? '' }}</span>
                <h3 class="mt-2 font-semibold">{{ $c['title'] ?? '' }}</h3>
            </div>
        </article>
        @endforeach
    </div>
</section>

{{-- ================= CTA LIÊN HỆ ================= --}}
<section id="contact" class="mt-12">
    <div class="rounded-2xl p-6 md:p-8 bg-white shadow-soft ring-1 ring-neutral-200/60 gradient-border
              flex flex-col md:flex-row items-start md:items-center gap-4">
        <div class="flex-1">
            <h3 class="text-xl font-bold">Cần báo giá nhanh?</h3>
            <p class="text-sm text-neutral-600 mt-1">Gửi mô tả tài sản và mục đích, phản hồi trong ngày làm việc.</p>
        </div>
        <div class="flex gap-3">
            <a href="#" class="btn-primary">Liên hệ ngay</a>
            <a href="#" class="btn-ghost">Tải form yêu cầu</a>
        </div>
    </div>
</section>
@endsection