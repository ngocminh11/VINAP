@php
// Menu luôn lấy từ config
$nav = config('site.nav') ?? [];

// Helper nhỏ: active theo PATH hiện tại (không tính hash)
$isActivePath = function (string $href): bool {
$path = parse_url($href, PHP_URL_PATH) ?? '/';
$path = $path === '' ? '/' : $path;
// so khớp /gioi-thieu, /thu-ngo, /ho-so-nang-luc, /
return $path === '/' ? request()->is('/') : request()->is(ltrim($path, '/').'*');
};
@endphp

<header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-neutral-200">
    <div class="mx-auto max-w-7xl px-3 sm:px-4">
        <div class="h-16 sm:h-18 flex items-center gap-4">

            {{-- Logo + Brand --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
                <img
                    src="{{ asset('images/vinaplogo.png') }}"
                    onerror="this.onerror=null;this.src='https://vinap.vn/image/data/logo.png';"
                    alt="VINAP" class="h-9 w-9 sm:h-10 sm:w-10 object-contain"
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
                @php
                $active = $isActivePath($item['href']);
                @endphp
                <a href="{{ $item['href'] }}"
                    class="relative px-1 py-2 text-sm text-neutral-700 hover:text-brand transition-colors
                    after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:bg-brand after:w-0
                    after:transition-[width] after:duration-300 hover:after:w-full
                    data-[active=true]:text-brand data-[active=true]:font-semibold
                    data-[active=true]:after:w-full whitespace-nowrap"
                    @if($active) aria-current="page" data-active="true" @endif>
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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
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
            @php $active = $isActivePath($item['href']); @endphp
            <a href="{{ $item['href'] }}"
                class="px-2 py-2 rounded-md text-sm hover:bg-neutral-50
                  data-[active=true]:text-brand data-[active=true]:font-semibold"
                @if($active) aria-current="page" data-active="true" @endif>{{ $item['label'] }}</a>
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

    // Đánh dấu active cho các link anchor (#section) trên cùng trang (home)
    (function() {
        const wrap = document.querySelector('header');
        if (!wrap) return;

        const links = wrap.querySelectorAll('nav a, #mobile-nav a');

        // Hàm set active bằng data-attr (không đè active server-side nếu khác route)
        const setActive = (el) => {
            links.forEach(a => a.dataset.active = 'false');
            if (el) el.dataset.active = 'true';
        };

        // Khi click link: nếu cùng pathname (chỉ đổi hash) -> set active ngay
        links.forEach(a => {
            a.addEventListener('click', (e) => {
                try {
                    const url = new URL(a.href);
                    const samePath = (url.pathname === location.pathname);
                    if (samePath) {
                        // Cho cảm giác "chọn mục này" ngay; khi sang route khác, server sẽ set lại
                        setActive(a);
                    }
                } catch (_) {}
            });
        });

        // Khi load trang: nếu có hash và có link trùng origin+path+hash -> set active
        window.addEventListener('DOMContentLoaded', () => {
            const current = Array.from(links).find(a => {
                try {
                    const u = new URL(a.href);
                    return (u.pathname === location.pathname) && (u.hash === location.hash);
                } catch (_) {
                    return false;
                }
            });
            if (current) setActive(current);
        });
    })();
</script>