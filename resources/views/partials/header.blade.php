@php
// Luôn lấy menu từ config để mọi trang đều có menu
$nav = config('site.nav') ?? [];
@endphp

<header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-neutral-200">
    <div class="mx-auto max-w-7xl px-3 sm:px-4">
        <div class="h-16 sm:h-18 flex items-center gap-4">
            {{-- Logo + Brand --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
                <img
                    src="{{ asset('images/vinaplogo.png') }}"
                    onerror="this.onerror=null;this.src='https://vinap.vn/image/data/logo.png';"
                    alt="VINAP"
                    class="h-9 w-9 sm:h-10 sm:w-10 object-contain"
                    width="40" height="40" fetchpriority="high" />
                <div class="leading-tight">
                    <div class="font-semibold text-neutral-900 text-sm sm:text-base whitespace-nowrap">
                        Công ty CP Thẩm định giá &amp; Tư vấn đầu tư Việt Nam
                    </div>
                    <div class="text-[11px] sm:text-xs text-neutral-500">
                        CHUYÊN NGHIỆP - MINH BẠCH - CHÍNH XÁC - KHÁCH QUAN
                    </div>
                </div>
            </a>

            {{-- Nav (desktop) --}}
            <nav class="ml-6 hidden md:flex items-center gap-5">
                @foreach($nav as $item)
                <a href="{{ $item['href'] }}"
                    class="text-sm text-neutral-700 hover:text-brand transition-colors whitespace-nowrap">
                    {{ $item['label'] }}
                </a>
                @endforeach
            </nav>

            {{-- Search --}}
            <div class="ml-auto hidden lg:block">
                <input type="search" placeholder="Tìm kiếm…"
                    class="h-9 w-80 rounded-xl border border-neutral-200 px-3 text-sm
                      focus:outline-none focus:ring-2 focus:ring-brand/30">
            </div>

            {{-- Mobile menu button --}}
            <button class="ml-auto md:hidden p-2 rounded-md border border-neutral-200"
                data-toggle="mobile-nav" aria-label="Mở menu">
                <svg xmlns="https://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile nav --}}
    <div id="mobile-nav" class="md:hidden hidden border-t border-neutral-200 bg-white">
        <div class="max-w-7xl mx-auto px-3 py-2 grid gap-1">
            @foreach($nav as $item)
            <a href="{{ $item['href'] }}"
                class="px-2 py-2 rounded-md text-sm hover:bg-neutral-50">{{ $item['label'] }}</a>
            @endforeach
        </div>
    </div>
</header>

<script>
    // Toggle menu mobile
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('[data-toggle="mobile-nav"]');
        if (!btn) return;
        document.getElementById('mobile-nav').classList.toggle('hidden');
    });
</script>