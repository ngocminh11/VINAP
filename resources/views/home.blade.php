@extends('layouts.main')
@section('title','VINAP • Trang chủ')
@php
$topServiceCards = config('site.home.topServiceCards');
$assetItems = config('site.home.assetItems') ?? [];
@endphp
@section('content')

{{-- LOGO BACKGROUND --}}
    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <img src="{{ asset('images/vinaplogo.png') }}"
             class="w-[400px] md:w-[700px] lg:w-[900px] opacity-[0.1] contrast-125 select-none"
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
$banners = collect(range(1, 10)) // tối đa 10 banner, thích thì tăng
    ->map(fn($i) => "images/Banner/banner{$i}.jpg")
    ->filter(fn($path) => file_exists(public_path($path)))
    ->map(fn($path) => asset($path))
    ->values()
    ->toArray();

// Fallback: luôn có ít nhất 1 slide để tránh lỗi layout/JS khi thiếu banner
if (empty($banners)) {
    $banners = [null];
}
@endphp

{{-- ================= HERO FULL WIDTH ================= --}}
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

{{-- ================= CORE VALUES CIRCLE ================= --}}
<section class="section reveal" id="coreValuesSectionReveal">
    <div class="max-w-7xl mx-auto px-4 md:px-8">

        {{-- TITLE --}}
        <div class="text-center mb-14 core-values-head">
            <h2 class="text-3xl md:text-4xl font-bold text-sky-900">
                Tại sao chọn VINAP?
            </h2>

            <p class="text-neutral-700 mt-4 max-w-3xl mx-auto leading-relaxed">
                VINAP không chỉ cung cấp dịch vụ thẩm định giá, mà còn đảm bảo sự minh bạch,
                chính xác và đồng hành dài hạn trong mọi quyết định đầu tư.
            </p>

            <div class="w-20 h-1 bg-amber-400 mx-auto mt-5 rounded-full"></div>
        </div>

        @php
            $coreValues = [
                ['title'=>'Trung thực','desc'=>'Minh bạch, đúng hạn, đáng tin cậy.','color'=>'sky'],
                ['title'=>'Chất lượng cao','desc'=>'Tiêu chuẩn cao trong mọi sản phẩm.','color'=>'amber'],
                ['title'=>'Đồng hành','desc'=>'Luôn sát cánh cùng khách hàng.','color'=>'emerald'],
                ['title'=>'Hợp tác','desc'=>'Phát triển bền vững với đối tác.','color'=>'orange'],
            ];
        @endphp

        <div class="grid lg:grid-cols-3 gap-10 lg:gap-7 xl:gap-10 items-center core-values-grid">

            {{-- LEFT --}}
            <div class="space-y-10">
                @foreach([$coreValues[0], $coreValues[1]] as $i => $item)
                <div class="core-item group flex gap-4 items-start" data-color="{{ $item['color'] }}" data-stagger="{{ $i }}">
                    <div class="icon-box {{ $item['color']=='sky'?'bg-sky-500':'bg-amber-400' }}"></div>

                    <div>
                        <h3 class="text-xl font-semibold {{ $item['color']=='sky'?'text-sky-600':'text-amber-500' }}">
                            {{ $item['title'] }}
                        </h3>
                        <p class="text-neutral-600 mt-1 text-sm">
                            {{ $item['desc'] }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- CENTER --}}
            <div class="flex justify-center">
                <div class="core-circle" id="coreCircle" role="img" aria-label="Giá trị cốt lõi VINAP">

                    <div class="core-ring"></div>

                    <div class="core-inner">
                        <p class="text-center text-[0.8125rem] font-semibold tracking-[0.12em] uppercase text-sky-900/75 leading-snug px-2">Giá trị cốt lõi</p>
                    </div>
                </div>
            </div>

            {{-- RIGHT --}}
            <div class="space-y-10">
                @foreach([$coreValues[2], $coreValues[3]] as $j => $item)
                <div class="core-item group flex gap-4 items-start" data-color="{{ $item['color'] }}" data-stagger="{{ 2 + $j }}">
                    <div class="icon-box {{ $item['color']=='emerald'?'bg-emerald-500':'bg-orange-500' }}"></div>

                    <div>
                        <h3 class="text-xl font-semibold {{ $item['color']=='emerald'?'text-emerald-600':'text-orange-500' }}">
                            {{ $item['title'] }}
                        </h3>
                        <p class="text-neutral-600 mt-1 text-sm">
                            {{ $item['desc'] }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>

{{-- ================= DỊCH VỤ PSA ================= --}}
<section id="services-psa" class="py-20 reveal-up">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        @php
            $psaServices = [
                [
                    'title' => 'Dịch vụ định giá',
                    'desc' => 'Ý kiến định giá phản ánh đầy đủ đặc điểm tài sản và xu hướng thị trường, giúp các bên trong giao dịch ra quyết định khách quan.',
                    'items' => ['Định giá bất động sản', 'Định giá máy móc thiết bị', 'Định giá tài sản vô hình', 'Định giá công cụ tài chính'],
                    'icon' => 'chart'
                ],
                [
                    'title' => 'Dịch vụ tư vấn',
                    'desc' => 'Cung cấp báo cáo tư vấn chuyên nghiệp, hỗ trợ khách hàng ứng phó thách thức kinh doanh và tối ưu hiệu quả đầu tư.',
                    'items' => ['Tư vấn chính sách đất đai', 'Tư vấn giao dịch bất động sản', 'Đơn xin miễn giảm ngân hàng', 'Hỗ trợ hồ sơ dự án'],
                    'icon' => 'consult'
                ],
                [
                    'title' => 'Dịch vụ tư vấn chuyên sâu',
                    'desc' => 'Đội ngũ chuyên gia đa ngành phối hợp để xây dựng giải pháp khả thi, phù hợp thực tiễn triển khai của từng doanh nghiệp.',
                    'items' => ['Nghiên cứu khả thi', 'Phân tích ngành', 'Nghiên cứu thị trường', 'Ứng dụng quy hoạch đô thị'],
                    'icon' => 'team'
                ],
                [
                    'title' => 'Thị trường vốn và dịch vụ đầu tư',
                    'desc' => 'Đồng hành cùng nhà đầu tư trong mọi giai đoạn từ phân tích cơ hội, quản lý giao dịch đến tối ưu danh mục tài sản.',
                    'items' => ['Mua bán/chuyển nhượng tài sản', 'Cho thuê BĐS thương mại', 'Quản lý tài sản', 'Tái cấu trúc danh mục đầu tư'],
                    'icon' => 'idea'
                ],
            ];
        @endphp

        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-semibold text-sky-900">Dịch vụ PSA</h2>
            <div class="w-24 h-1 bg-amber-400 rounded-full mx-auto mt-3"></div>
            <p class="mt-4 text-neutral-700 max-w-4xl mx-auto">
                Tuân thủ các chuẩn mực đạo đức và tính chính trực, chúng tôi cung cấp các dịch vụ chuyên nghiệp được thiết kế riêng để tạo nên giải pháp đôi bên cùng có lợi.
            </p>
        </div>

        <div class="rounded-2xl overflow-hidden shadow-2xl ring-1 ring-black/10 bg-slate-900">
            <div class="grid md:grid-cols-[320px_1fr] min-h-[520px]">
                <aside class="bg-[#0d7fc4] p-0">
                    @foreach($psaServices as $i => $sv)
                        <button
                            type="button"
                            class="psa-tab w-full text-left px-6 py-6 flex items-center gap-4 border-l-4 transition {{ $i === 0 ? 'is-active border-amber-400 bg-black/35' : 'border-transparent bg-transparent hover:bg-black/15' }}"
                            data-psa-tab="{{ $i }}">
                            <span class="w-10 h-10 rounded-full border border-white/30 grid place-items-center text-white/90">
                                @if($sv['icon'] === 'chart')
                                    <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M3 20h18M7 16v-5m5 5V8m5 8V5M5 8l2-2 4 3 6-5 2 2"></path></svg>
                                @elseif($sv['icon'] === 'consult')
                                    <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M3 5h18v4H3zM6 11h12v8H6zM9 15h6"></path></svg>
                                @elseif($sv['icon'] === 'team')
                                    <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2M10 11a4 4 0 1 0 0-8m8 18v-2a4 4 0 0 0-3-3.87M16 3a4 4 0 0 1 0 8"></path></svg>
                                @else
                                    <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M9 18h6M10 22h4M12 2a7 7 0 0 0-4 12.7V17h8v-2.3A7 7 0 0 0 12 2z"></path></svg>
                                @endif
                            </span>
                            <span class="text-white text-xl font-medium leading-tight">{{ $sv['title'] }}</span>
                        </button>
                    @endforeach
                </aside>

                <div class="relative">
                    <img src="{{ $imgSrc($banners[0] ?? null) }}" class="w-full h-full object-cover" alt="">
                    <div class="absolute inset-0 bg-black/55"></div>
                    <div class="absolute inset-0 p-8 md:p-12 text-white">
                        @foreach($psaServices as $i => $sv)
                            <article class="psa-panel {{ $i === 0 ? '' : 'hidden' }}" data-psa-panel="{{ $i }}">
                                <h3 class="text-4xl font-semibold">{{ $sv['title'] }}</h3>
                                <p class="mt-4 text-lg text-white/90 leading-relaxed max-w-3xl">{{ $sv['desc'] }}</p>
                                <ul class="mt-6 space-y-2 text-lg text-white/90">
                                    @foreach($sv['items'] as $item)
                                        <li class="flex items-start gap-2"><span class="mt-2 w-1.5 h-1.5 rounded-full bg-white"></span>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= LỚP TÀI SẢN DỊCH VỤ (STYLE PSA) ================= --}}
<section class="w-full bg-gradient-to-br from-[#0f3d5c] via-[#0c4a6e] to-[#083344] py-10">

    <div class="max-w-[1320px] xl:max-w-[1400px] mx-auto px-4">

        <!-- TITLE -->
        <div class="text-center max-w-xl mx-auto">
            <h2 class="text-[26px] font-bold text-white">
                Lớp tài sản dịch vụ
            </h2>
            <p class="mt-2 text-white/70 text-[14px]">
                Chúng tôi cam kết tìm ra những giải pháp tốt nhất cho những thách thức mà khách hàng gặp phải.
            </p>
        </div>

        <!-- TOP -->
        <div class="mt-6 grid grid-cols-2 lg:grid-cols-4 gap-4">

        @foreach($topServiceCards as $card)

<a href="/linh-vuc/{{ $card['slug'] }}"
   class="group relative overflow-hidden rounded-lg px-4 py-3 flex items-center gap-3 
          border border-white/10 bg-white/10 backdrop-blur
          transition-all duration-300 
          hover:-translate-y-1 hover:bg-white/20 hover:shadow-lg">

    <span class="absolute inset-0 bg-gradient-to-b from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition"></span>

    <!-- ICON -->
    <div class="relative z-10 w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-white 
                group-hover:bg-white/30 transition">

        @if($card['slug'] == 'government')
            🏛
        @elseif($card['slug'] == 'banking')
            💼
        @elseif($card['slug'] == 'vpc')
            🌏
        @elseif($card['slug'] == 'legal')
            ⚖
        @endif

    </div>

    <!-- TEXT -->
    <h3 class="relative z-10 text-white text-[14px] font-medium">
        {{ $card['title'] }}
    </h3>

</a>

@endforeach

        </div>

        <!-- LINE -->
        <div class="mt-6 border-t border-white/10"></div>

        <!-- GRID -->
        <div class="mt-6 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-y-4 text-center">

            @foreach($assetItems as $item)
            <div class="group">

                <div class="w-10 h-10 mx-auto rounded-full border border-white/20 
                            flex items-center justify-center text-white/80 
                            transition-all duration-300
                            group-hover:bg-white/10 group-hover:border-white/40 group-hover:text-white group-hover:scale-110">
                    ...
                </div>

                <p class="mt-2 text-[13px] text-white/70 group-hover:text-white transition">
                    {{ $item['label'] }}
                </p>

            </div>
            @endforeach

        </div>

    </div>
</section>

{{-- ================= GRID DỊCH VỤ ================= --}}
<section id="services" class="py-20 bg-white/70 reveal-up">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="mb-10">
            <p class="kicker">Service classes</p>
            <h2 class="text-3xl md:text-4xl font-semibold">Lớp tài sản</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-5 gap-3 md:gap-4">
            @foreach(($serviceTiles ?? []) as $st)
                <article class="group relative aspect-square rounded-2xl overflow-hidden bg-slate-950">
                    <img
                        src="{{ $imgSrc($st['img'] ?? null) }}"
                        onerror="this.onerror=null;this.src='{{ $PH }}';"
                        alt="{{ $st['title'] ?? 'Service' }}"
                        class="w-full h-full object-cover transition duration-700 group-hover:scale-105"
                        loading="lazy">

                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-950/20 to-transparent"></div>
                    <div class="absolute top-3 left-3">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" stroke-width="1">
                            <path d="M4 20h16M6 20V8l6-4 6 4v12M10 12h4"></path>
                        </svg>
                    </div>
                    <h3 class="absolute left-3 right-3 bottom-3 text-white text-sm font-medium leading-tight">{{ $st['title'] ?? 'Dịch vụ' }}</h3>

                    <div class="service-overlay absolute inset-0 bg-brand/90 text-white flex flex-col items-center justify-center translate-y-full transition-transform duration-500">
                        <p class="font-semibold mb-4 px-4 text-center">{{ $st['title'] ?? 'Dịch vụ' }}</p>
                        <a href="#" class="px-4 py-2 rounded-full border border-white/70 text-sm hover:bg-white hover:text-brand transition">Xem chi tiết</a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= HOẠT ĐỘNG + SIDEBAR ================= --}}
<section class="py-20 grid lg:grid-cols-3 gap-6 reveal-up">
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

        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden mt-6">

    <!-- HEADER -->
    <div class="px-5 py-3 bg-gray-50 border-b flex justify-between items-center">
        <h2 class="text-sm font-bold uppercase tracking-wide text-gray-700">
            Tin tức
        </h2>
        <a href="/tin-tuc" class="text-xs text-brand hover:underline">Xem tất cả</a>
    </div>

    <!-- LIST -->
    <ul>
        @foreach(($news ?? []) as $n)
        <li class="px-5 py-4 border-b last:border-0 hover:bg-gray-50 transition">

            <a href="/tin-tuc/{{ $n['slug'] }}" class="block">
                
                <h3 class="text-sm font-bold text-gray-800 hover:text-brand leading-snug">
                    {{ $n['title'] }}
                </h3>

                @if(!empty($n['desc']))
                <p class="text-xs text-gray-600 mt-1 line-clamp-2">
                    {{ $n['desc'] }}
                </p>
                @endif

                <div class="flex items-center justify-between mt-2 text-xs text-gray-400">
                    <span>
                        {{ $n['date'] }}
                    </span>

                    <div class="flex items-center gap-3">
                        <span>👁 {{ $n['views'] ?? 0 }}</span>
                        <span class="text-brand">(Xem tiếp)</span>
                    </div>
                </div>

            </a>

        </li>
        @endforeach
    </ul>
</div>
    </div>

    <aside class="space-y-6">
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden mt-6">
    <div class="px-5 py-3 bg-gray-50 border-b">
        <h2 class="text-sm font-bold uppercase tracking-wide text-gray-700">
            Tin tức
        </h2>
    </div>

    <ul>
        @foreach(($news ?? []) as $n)
        <li class="px-5 py-3 flex justify-between items-center border-b last:border-0 hover:bg-gray-50 transition">
            
            <a href="#" class="text-sm text-gray-800 hover:text-brand leading-snug">
                {{ $n['title'] ?? '' }}
            </a>

            <span class="text-xs text-gray-400 whitespace-nowrap ml-4">
                {{ $n['date'] ?? '' }}
            </span>
        </li>
        @endforeach
    </ul>
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
<section id="reports" class="py-20 reveal-up">
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

{{-- ================= GLOBAL NETWORK ================= --}}
<section class="py-20 reveal-up">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="rounded-3xl bg-[#071a33] overflow-hidden relative">
            {{-- nền map svg mờ --}}
            <div class="absolute inset-0 -z-10 opacity-30 pointer-events-none">
                <svg viewBox="0 0 1200 560" class="w-full h-full">
                    <path d="M60 240c110-120 210-130 310-90 90 36 132 120 232 120 86 0 132-46 190-70 108-45 186-12 260 42 68 49 150 72 238 36" fill="none" stroke="rgba(255,255,255,.65)" stroke-width="1" />
                    <path d="M40 310c130-46 230 4 310 34 72 27 160 30 232-18 68-45 130-76 210-56 76 19 124 60 214 64 86 4 160-39 220-94" fill="none" stroke="rgba(255,255,255,.55)" stroke-width="1" />
                    <path d="M200 150c80-42 168-30 234 10 62 38 106 86 182 86 72 0 110-40 168-60 92-32 170 16 256 88" fill="none" stroke="rgba(255,255,255,.42)" stroke-width="1" />
                    <path d="M140 420c90-60 180-54 250-26 70 28 132 30 202 0 70-30 136-46 210-30 74 16 130 54 210 50" fill="none" stroke="rgba(255,255,255,.35)" stroke-width="1" />
                </svg>
            </div>

            <div class="relative z-10 p-8 md:p-12">
                <p class="text-white/70 uppercase tracking-[0.24em] text-xs">Global network</p>
                <h2 class="text-white text-3xl md:text-4xl font-semibold mt-3">Mạng lưới thẩm định phủ khắp Việt Nam</h2>
                <p class="text-white/70 mt-3 max-w-2xl">Kết nối chuyên gia tại các trung tâm kinh tế trọng điểm, phản hồi nhanh và đảm bảo chuẩn chất lượng thống nhất.</p>

                <div class="relative h-52 md:h-64 mt-8">
                    @php
                        $branches = [
                            ['name' => 'Hà Nội', 'pos' => 'top-[32%] left-[40%]'],
                            ['name' => 'Đà Nẵng', 'pos' => 'top-[48%] left-[56%]'],
                            ['name' => 'TP.HCM', 'pos' => 'top-[60%] left-[52%]'],
                            ['name' => 'Cần Thơ', 'pos' => 'top-[76%] left-[44%]'],
                        ];
                    @endphp
                    @foreach($branches as $b)
                        <div class="absolute {{ $b['pos'] }} -translate-x-1/2 -translate-y-1/2 z-10">
                            {{-- ping vòng tròn --}}
                            <span class="absolute inset-0 h-5 w-5 rounded-full border border-white/45 animate-ping"></span>
                            <span class="relative inline-flex h-3 w-3 rounded-full bg-white"></span>
                            <span class="block mt-2 text-xs text-white/90 whitespace-nowrap">{{ $b['name'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= CTA LIÊN HỆ ================= --}}
<section id="contact" class="pb-20 reveal-up">
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

<style>
    .hero-slide {
        will-change: opacity, transform;
    }
    .hero-slide-img {
        transform: scale(1.05);
        transition: transform 1400ms ease-out;
    }
    .hero-slide.is-active .hero-slide-img {
        transform: scale(1);
    }
    .psa-tab.is-active {
        background: rgba(15, 23, 42, .45);
        border-left-color: #f59e0b;
    }
    .psa-tab.is-active span:last-child {
        color: #fbbf24;
    }
    .hero-word {
        opacity: 0;
        transform: translateY(22px);
    }
    #heroTitle.hero-animate .hero-word {
        animation: heroWordIn 720ms cubic-bezier(.2,.8,.2,1) forwards;
    }
    @keyframes heroWordIn {
        from { opacity: 0; transform: translateY(22px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .core-center-wheel {
        background: conic-gradient(
            #2f9cf4 0deg 90deg,
            #12b76a 90deg 180deg,
            #ff6b35 180deg 270deg,
            #f4b400 270deg 360deg
        );
        transition: transform 700ms ease;
    }
    #coreValuesSection.is-focus .core-value-item {
        opacity: .5;
        transition: opacity .35s ease, transform .35s ease;
    }
    #coreValuesSection.is-focus .core-value-item.is-active {
        opacity: 1;
        transform: translateY(-2px);
    }
    #coreValuesSection.is-focus .core-value-item.is-active .core-value-badge {
        box-shadow: 0 14px 28px rgba(15, 23, 42, .22);
    }
    #coreValuesSection.is-focus .core-center-wheel {
        transform: rotate(22deg);
    }
    #services .group:hover .service-overlay {
        transform: translateY(0%);
    }
    .reveal-up {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 800ms ease, transform 800ms ease;
    }
    .reveal-up.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    @media (max-width: 768px) {
        .hero-slide-img {
            transform: scale(1.02);
        }
        #heroSlider .hero-slide {
            border-radius: 16px;
        }
        #heroSlider .hero-title {
            font-size: 1.9rem;
            line-height: 1.2;
        }
        #services-psa .psa-tab span:last-child {
            font-size: 1.1rem;
        }
        #services-psa .psa-panel h3 {
            font-size: 1.9rem;
        }
        #services-psa .psa-panel p,
        #services-psa .psa-panel li {
            font-size: 1rem;
        }
        #services .service-overlay {
            display: none;
        }
        #heroTitle.hero-animate .hero-word {
            animation-duration: 450ms;
        }
    }
    @media (prefers-reduced-motion: reduce) {
        #heroTitle.hero-animate .hero-word,
        .hero-word,
        .hero-slide-img,
        .reveal-up {
            animation: none !important;
            transition: none !important;
        }
        .hero-word {
            opacity: 1 !important;
            transform: none !important;
        }
        #coreValuesSection.is-focus .core-value-item { opacity: 1 !important; }
        #coreValuesSection.is-focus .core-center-wheel { transform: none !important; }
    }
    .asset-layer-stripes {
        background-image: repeating-linear-gradient(
            -28deg,
            transparent,
            transparent 22px,
            rgba(16, 185, 129, 0.045) 22px,
            rgba(16, 185, 129, 0.045) 23px
        );
    }
</style>

<script>
    (() => {
        const heroRoot = document.querySelector('#heroSlider');
        if (heroRoot) {
            const slides = [...heroRoot.querySelectorAll('.hero-slide')];
            const dots = [...heroRoot.querySelectorAll('[data-dot]')];
            const prev = heroRoot.querySelector('[data-prev]');
            const next = heroRoot.querySelector('[data-next]');
            let index = 0;
            let timer = null;
            const total = slides.length;
            const heroTitle = document.querySelector('#heroTitle');

            const animateTitle = () => {
                if (!heroTitle) return;
                heroTitle.classList.remove('hero-animate');
                // force reflow to restart animation
                void heroTitle.offsetWidth;
                heroTitle.classList.add('hero-animate');
            };

            const go = (n) => {
                if (total <= 0) {
                    animateTitle();
                    return;
                }
                index = (n + total) % total;
                slides.forEach((slide, idx) => {
                    const active = idx === index;
                    slide.classList.toggle('is-active', active);
                    slide.classList.toggle('opacity-100', active);
                    slide.classList.toggle('z-[2]', active);
                    slide.classList.toggle('opacity-0', !active);
                    slide.classList.toggle('z-[1]', !active);
                });
                dots.forEach((dot, idx) => dot.dataset.active = String(idx === index));
                animateTitle();
            };

            const start = () => {
                if (total <= 1) return; // không autoplay nếu chỉ có 1 slide
                stop();
                timer = setInterval(() => go(index + 1), 4800);
            };
            const stop = () => timer && clearInterval(timer);

            dots.forEach((dot, dotIdx) => {
                dot.addEventListener('click', () => {
                    go(dotIdx);
                    start();
                });
            });
            prev?.addEventListener('click', () => {
                go(index - 1);
                start();
            });
            next?.addEventListener('click', () => {
                go(index + 1);
                start();
            });

            heroRoot.addEventListener('mouseenter', stop);
            heroRoot.addEventListener('mouseleave', start);
            go(0);
            start();
        }

        const psaTabs = [...document.querySelectorAll('[data-psa-tab]')];
        const psaPanels = [...document.querySelectorAll('[data-psa-panel]')];
        if (psaTabs.length && psaPanels.length) {
            const openPanel = (idx) => {
                psaTabs.forEach((tab, tIdx) => tab.classList.toggle('is-active', tIdx === idx));
                psaPanels.forEach((panel, pIdx) => panel.classList.toggle('hidden', pIdx !== idx));
            };
            psaTabs.forEach((tab, idx) => tab.addEventListener('click', () => openPanel(idx)));
            openPanel(0);
        }

        const coreValuesSection = document.querySelector('#coreValuesSection');
        if (coreValuesSection) {
            const items = [...coreValuesSection.querySelectorAll('[data-core-item]')];
            items.forEach((item) => {
                item.addEventListener('mouseenter', () => {
                    coreValuesSection.classList.add('is-focus');
                    items.forEach(el => el.classList.remove('is-active'));
                    item.classList.add('is-active');
                });
                item.addEventListener('mouseleave', () => {
                    coreValuesSection.classList.remove('is-focus');
                    item.classList.remove('is-active');
                });
            });
        }

        const revealEls = document.querySelectorAll('.reveal-up');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12
        });
        revealEls.forEach((el) => observer.observe(el));
    })();
</script>
@endsection