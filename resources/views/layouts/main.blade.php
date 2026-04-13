<!doctype html>
<html lang="vi" class="h-full" style="font-size: 125%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','VINAP')</title>

    <meta name="description" content="Thẩm định giá & Tư vấn đầu tư • Chính xác • Khách quan • Minh bạch">
    <meta name="theme-color" content="#198e82">

    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&subset=vietnamese&display=swap" rel="stylesheet">

    {{-- ICON --}}
    <link rel="icon" href="{{ asset('favicon-32.png') }}">

    @vite('resources/js/app.js')

    {{-- DESIGN SYSTEM --}}
    <style>
        /* TYPO */
        .heading-xl { font-weight:800; line-height:1.2; }
        .heading-lg { font-weight:700; }
        .heading-md { font-weight:600; }
        .kicker { font-size:.75rem; text-transform:uppercase; letter-spacing:.1em; color:#198e82; font-weight:600;}

        /* SPACING */
        .section { margin-top:5rem; }
        .section-sm { margin-top:3rem; }

        /* CORE VALUES CIRCLE */
        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 9999px;
            transition: transform 0.45s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.45s ease;
        }
        .core-item:hover .icon-box {
            transform: scale(1.12);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
        }

        .core-circle {
            position: relative;
            width: 340px;
            height: 340px;
            max-width: min(340px, 85vw);
            max-height: min(340px, 85vw);
        }
        .core-circle:hover .core-inner {
            box-shadow: inset 0 8px 22px rgba(14, 165, 233, 0.14);
        }

        /* Góc 0° = đỉnh, quay kim đồng hồ: trên-phải=emerald, dưới-phải=orange, dưới-trái=amber, trên-trái=sky */
        .core-ring {
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            background: conic-gradient(
                #10b981 0deg 90deg,
                #f97316 90deg 180deg,
                #f59e0b 180deg 270deg,
                #0ea5e9 270deg 360deg
            );
            -webkit-mask: radial-gradient(circle, transparent 58%, black 60%);
            mask: radial-gradient(circle, transparent 58%, black 60%);
            transform-origin: 50% 50%;
            box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.35) inset;
        }

        .core-inner {
            position: absolute;
            inset: 70px;
            background: white;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0 8px 20px rgba(0, 0, 0, 0.08);
            z-index: 5;
            transition: box-shadow 0.45s ease;
        }

        /* Vào viewport: stagger */
        @media (prefers-reduced-motion: no-preference) {
            #coreValuesSectionReveal.reveal .core-values-head,
            #coreValuesSectionReveal.reveal .core-values-grid .core-item,
            #coreValuesSectionReveal.reveal #coreCircle {
                opacity: 0;
                transform: translateY(28px);
            }
            #coreValuesSectionReveal.reveal #coreCircle {
                transform: translateY(28px) scale(0.94);
            }
            #coreValuesSectionReveal.reveal.active .core-values-head {
                opacity: 1;
                transform: translateY(0);
                transition: opacity 0.7s cubic-bezier(0.22, 1, 0.36, 1),
                            transform 0.7s cubic-bezier(0.22, 1, 0.36, 1);
            }
            #coreValuesSectionReveal.reveal.active .core-values-grid .core-item {
                opacity: 1;
                transform: translateY(0);
                transition: opacity 0.65s cubic-bezier(0.22, 1, 0.36, 1),
                            transform 0.65s cubic-bezier(0.22, 1, 0.36, 1);
            }
            #coreValuesSectionReveal.reveal.active .core-values-grid .core-item[data-stagger="0"] {
                transition-delay: 0.08s;
            }
            #coreValuesSectionReveal.reveal.active .core-values-grid .core-item[data-stagger="1"] {
                transition-delay: 0.16s;
            }
            #coreValuesSectionReveal.reveal.active .core-values-grid .core-item[data-stagger="2"] {
                transition-delay: 0.28s;
            }
            #coreValuesSectionReveal.reveal.active .core-values-grid .core-item[data-stagger="3"] {
                transition-delay: 0.36s;
            }
            #coreValuesSectionReveal.reveal.active #coreCircle {
                opacity: 1;
                transform: translateY(0) scale(1);
                transition: opacity 0.75s cubic-bezier(0.22, 1, 0.36, 1) 0.12s,
                            transform 0.8s cubic-bezier(0.34, 1.2, 0.64, 1) 0.12s;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            #coreValuesSectionReveal.reveal .core-values-head,
            #coreValuesSectionReveal.reveal .core-values-grid .core-item,
            #coreValuesSectionReveal.reveal #coreCircle {
                opacity: 1;
                transform: none;
            }
        }
        /* CARD */
        .card {
            background:rgba(255,255,255,.95);
            backdrop-filter:blur(10px);
            border-radius:1rem;
            box-shadow:0 10px 25px rgba(0,0,0,.05);
            border:1px solid rgba(0,0,0,.05);
        }
        .card-hover {
            transition:.3s;
        }
        .card-hover:hover {
            transform:translateY(-6px);
            box-shadow:0 20px 40px rgba(0,0,0,.08);
        }

        /* REVEAL */
        .reveal {
            opacity:0;
            transform:translateY(40px);
            transition:.6s ease;
        }
        .reveal.active {
            opacity:1;
            transform:translateY(0);
        }
        /* ===== ASSET SECTION (PRO LEVEL) ===== */

        .asset-card {
            position: relative;
            overflow: hidden;
            border-radius: 14px;
            background: rgba(255,255,255,0.95);
            border: 1px solid rgba(16,185,129,0.2);
            transition: all 0.35s ease;
        }

        .asset-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, #34d399, #14b8a6);
            transform: translateY(-100%);
            transition: transform 0.5s cubic-bezier(0.22,1,0.36,1);
            z-index: 0;
        }

        .asset-card:hover::before {
            transform: translateY(0);
        }

        .asset-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(16,185,129,0.25);
        }

        .asset-card > * {
            position: relative;
            z-index: 1;
        }

        /* TEXT + ICON đổi màu khi hover */
        .asset-card:hover h3,
        .asset-card:hover p {
            color: white;
        }

        .asset-card:hover svg {
            color: white;
        }

        /* GRID ITEM */
        .asset-mini {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .asset-mini::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, #34d399, #14b8a6);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .asset-mini:hover::before {
            opacity: 1;
        }

        .asset-mini > * {
            position: relative;
            z-index: 1;
        }

        .asset-mini:hover {
            transform: translateY(-4px);
        }

        .asset-mini:hover p,
        .asset-mini:hover svg {
            color: white;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 min-h-full font-[Be_Vietnam_Pro]">

    {{-- HEADER --}}
    <header class="bg-white border-b sticky top-0 z-50">
        @include('partials.header')
    </header>

    {{-- CONTENT --}}
    <main class="w-full">
    <div class="max-w-[1320px] mx-auto px-4 md:px-6 py-10">
        @yield('content')
    </div>
    </main>
    {{-- FOOTER --}}
    <footer class="bg-white border-t mt-10">
        @include('partials.footer')
    </footer>

    {{-- ANIMATION SCRIPT --}}
    <script>
document.addEventListener("DOMContentLoaded", () => {

    /* ===== REVEAL ===== */
    const els = document.querySelectorAll('.reveal');

    const observer = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) e.target.classList.add('active');
        });
    }, { threshold: 0.1 });

    els.forEach(el => observer.observe(el));


});
</script>

</body>
</html>