<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Dashboard') · VINAP Admin
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Be Vietnam Pro', Inter, system-ui, sans-serif;
        }

        .admin-scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        .admin-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .admin-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 999px;
        }

        .sidebar-scroll::-webkit-scrollbar {
            width: 3px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,.12);
            border-radius: 999px;
        }

        .glass {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
    </style>

    @stack('styles')
</head>

<body class="bg-[#f5f7fa] text-slate-900 antialiased">

<div
    id="adminApp"
    class="min-h-screen"
>

    {{-- ========================================================= --}}
    {{-- SIDEBAR OVERLAY MOBILE --}}
    {{-- ========================================================= --}}

    <div
        id="sidebarOverlay"
        class="fixed inset-0 bg-slate-950/40 backdrop-blur-sm z-40 hidden lg:hidden"
    ></div>


    {{-- ========================================================= --}}
    {{-- SIDEBAR --}}
    {{-- ========================================================= --}}

    <aside
        id="adminSidebar"
        class="
            fixed inset-y-0 left-0 z-50
            w-[268px]
            bg-[#0b1f3a]
            text-white
            transform -translate-x-full
            lg:translate-x-0
            transition-transform duration-300 ease-out
            flex flex-col
        "
    >

        {{-- LOGO --}}
        <div class="h-[72px] px-6 flex items-center border-b border-white/[0.07]">

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 group">

                <div
                    class="
                        w-10 h-10 rounded-xl
                        bg-white flex items-center justify-center
                        shadow-lg shadow-black/10
                        transition-transform duration-200
                        group-hover:scale-105
                    "
                >
                    <span class="text-[#0b1f3a] font-black text-lg tracking-tight">
                        V
                    </span>
                </div>

                <div>
                    <div class="font-bold tracking-tight text-[17px]">
                        VINAP
                    </div>

                    <div class="text-[10px] text-white/45 uppercase tracking-[0.18em]">
                        Administration
                    </div>
                </div>

            </a>

            {{-- MOBILE CLOSE --}}
            <button
                id="closeSidebar"
                class="ml-auto lg:hidden text-white/50 hover:text-white"
            >
                ✕
            </button>

        </div>


        {{-- SIDEBAR CONTENT --}}
        <div class="flex-1 overflow-y-auto sidebar-scroll px-3 py-5">

            {{-- OVERVIEW --}}
            <div class="px-3 mb-2">
                <span class="text-[10px] uppercase tracking-[0.18em] text-white/35 font-semibold">
                    Tổng quan
                </span>
            </div>

            <nav class="space-y-1">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="
                        admin-nav-item
                        {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}
                    "
                >
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M4 13h6V4H4v9Zm0 7h6v-4H4v4Zm10 0h6v-9h-6v9Zm0-16v4h6V4h-6Z"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linejoin="round"/>
                        </svg>
                    </span>

                    <span>Dashboard</span>
                </a>

            </nav>


            {{-- REQUESTS --}}
            <div class="px-3 mb-2 mt-7">
                <span class="text-[10px] uppercase tracking-[0.18em] text-white/35 font-semibold">
                    Quản lý yêu cầu
                </span>
            </div>

            <nav class="space-y-1">

                <a
                    href="{{ route('admin.requests.index') }}"
                    class="
                        admin-nav-item
                        {{ request()->routeIs('admin.requests.*') ? 'active' : '' }}
                    "
                >

                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path
                                d="M6 3.75h12A1.25 1.25 0 0 1 19.25 5v14A1.25 1.25 0 0 1 18 20.25H6A1.25 1.25 0 0 1 4.75 19V5A1.25 1.25 0 0 1 6 3.75Z"
                                stroke="currentColor"
                                stroke-width="1.7"
                            />
                            <path
                                d="M8 8h8M8 12h8M8 16h5"
                                stroke="currentColor"
                                stroke-width="1.7"
                                stroke-linecap="round"
                            />
                        </svg>
                    </span>

                    <span class="flex-1">
                        Yêu cầu khách hàng
                    </span>

                    @php
                        $pendingCount = \Illuminate\Support\Facades\DB::table('contact_requests')
                            ->where('status', 'pending')
                            ->count();
                    @endphp

                    @if($pendingCount > 0)
                        <span
                            class="
                                min-w-[22px] h-[22px]
                                px-1.5
                                rounded-full
                                bg-emerald-400
                                text-[#06251d]
                                text-[10px]
                                font-bold
                                flex items-center justify-center
                            "
                        >
                            {{ $pendingCount > 99 ? '99+' : $pendingCount }}
                        </span>
                    @endif

                </a>

            </nav>


            {{-- ADMINISTRATION --}}
            <div class="px-3 mb-2 mt-7">
                <span class="text-[10px] uppercase tracking-[0.18em] text-white/35 font-semibold">
                    Quản trị
                </span>
            </div>

            <nav class="space-y-1">

                <a href="#"
                   class="admin-nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path
                                d="M12 15.2a3.2 3.2 0 1 0 0-6.4 3.2 3.2 0 0 0 0 6.4Z"
                                stroke="currentColor"
                                stroke-width="1.7"
                            />
                            <path
                                d="m19.4 15 .1.1a1.8 1.8 0 0 1-2.55 2.55l-.1-.1a1.8 1.8 0 0 0-3.08 1.27v.28a1.8 1.8 0 0 1-3.6 0v-.28A1.8 1.8 0 0 0 7.1 17.55l-.1.1a1.8 1.8 0 1 1-2.55-2.55l.1-.1A1.8 1.8 0 0 0 3.28 11.9H3a1.8 1.8 0 0 1 0-3.6h.28A1.8 1.8 0 0 0 4.55 5.2l-.1-.1A1.8 1.8 0 0 1 7 2.55l.1.1a1.8 1.8 0 0 0 3.08-1.27V1.1a1.8 1.8 0 0 1 3.6 0v.28a1.8 1.8 0 0 0 3.08 1.27l.1-.1a1.8 1.8 0 0 1 2.55 2.55l-.1.1a1.8 1.8 0 0 0 1.27 3.08H21a1.8 1.8 0 0 1 0 3.6h-.28A1.8 1.8 0 0 0 19.4 15Z"
                                stroke="currentColor"
                                stroke-width="1.3"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </span>

                    <span>Cài đặt</span>
                </a>


                <a href="#"
                   class="admin-nav-item">

                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path
                                d="M5 4h14v16H5z"
                                stroke="currentColor"
                                stroke-width="1.7"
                                rx="2"
                            />
                            <path
                                d="M8 8h8M8 12h5M8 16h6"
                                stroke="currentColor"
                                stroke-width="1.7"
                                stroke-linecap="round"
                            />
                        </svg>
                    </span>

                    <span>Audit log</span>

                </a>

            </nav>

        </div>


        {{-- SIDEBAR FOOTER --}}
        <div class="p-3 border-t border-white/[0.07]">

            <div class="rounded-2xl bg-white/[0.05] p-3">

                <div class="flex items-center gap-3">

                    <div
                        class="
                            w-9 h-9
                            rounded-xl
                            bg-emerald-400
                            text-[#06382c]
                            flex items-center justify-center
                            font-bold text-sm
                        "
                    >
                        {{ strtoupper(substr($currentAdmin->name ?? 'A', 0, 1)) }}
                    </div>

                    <div class="min-w-0 flex-1">

                        <div class="text-sm font-medium truncate">
                            {{ $currentAdmin->name ?? 'Administrator' }}
                        </div>

                        <div class="text-[11px] text-white/40 truncate">
                            {{ $currentAdmin->email ?? 'Admin' }}
                        </div>

                    </div>

                </div>

                <form
                    action="{{ route('admin.logout') }}"
                    method="POST"
                    class="mt-3"
                >
                    @csrf

                    <button
                        type="submit"
                        class="
                            w-full
                            h-9
                            rounded-lg
                            bg-white/[0.05]
                            hover:bg-white/[0.1]
                            text-white/60
                            hover:text-white
                            text-xs
                            transition
                        "
                    >
                        Đăng xuất
                    </button>
                </form>

            </div>

        </div>

    </aside>


    {{-- ========================================================= --}}
    {{-- MAIN --}}
    {{-- ========================================================= --}}

    <div class="lg:pl-[268px] min-h-screen">

        {{-- TOPBAR --}}
        <header
            class="
                h-[72px]
                bg-white/90
                glass
                border-b border-slate-200/80
                sticky top-0 z-30
            "
        >

            <div class="h-full px-4 sm:px-6 lg:px-8 flex items-center">

                {{-- MOBILE MENU --}}
                <button
                    id="openSidebar"
                    class="
                        lg:hidden
                        w-10 h-10
                        rounded-xl
                        hover:bg-slate-100
                        flex items-center justify-center
                        mr-3
                    "
                >
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M4 7h16M4 12h16M4 17h16"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                        />
                    </svg>
                </button>


                {{-- BREADCRUMB --}}
                <div class="hidden sm:block">

                    <div class="text-[11px] text-slate-400">
                        VINAP / Administration
                    </div>

                    <div class="font-semibold text-sm mt-0.5">
                        @yield('page-title', 'Dashboard')
                    </div>

                </div>


                <div class="ml-auto flex items-center gap-2">

                    {{-- SEARCH --}}
                    <button
                        class="
                            hidden md:flex
                            items-center gap-2
                            h-10 px-3
                            rounded-xl
                            border border-slate-200
                            text-slate-400
                            hover:text-slate-700
                            hover:bg-slate-50
                            transition
                        "
                    >

                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                            <circle
                                cx="11"
                                cy="11"
                                r="6.5"
                                stroke="currentColor"
                                stroke-width="1.7"
                            />
                            <path
                                d="m16 16 4 4"
                                stroke="currentColor"
                                stroke-width="1.7"
                                stroke-linecap="round"
                            />
                        </svg>

                        <span class="text-xs">
                            Tìm kiếm
                        </span>

                        <kbd
                            class="
                                ml-5
                                text-[10px]
                                border border-slate-200
                                rounded px-1.5 py-0.5
                                bg-slate-50
                            "
                        >
                            /
                        </kbd>

                    </button>


                    {{-- NOTIFICATION --}}
                    <button
                        class="
                            relative
                            w-10 h-10
                            rounded-xl
                            hover:bg-slate-100
                            flex items-center justify-center
                            text-slate-500
                            transition
                        "
                    >

                        <svg class="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9ZM10 21h4"
                                stroke="currentColor"
                                stroke-width="1.7"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>

                        @if($pendingCount > 0)
                            <span
                                class="
                                    absolute top-2 right-2
                                    w-2 h-2
                                    rounded-full
                                    bg-emerald-500
                                    ring-2 ring-white
                                "
                            ></span>
                        @endif

                    </button>


                    {{-- PROFILE --}}
                    <div class="h-8 w-px bg-slate-200 mx-1"></div>

                    <div class="flex items-center gap-2 pl-1">

                        <div
                            class="
                                w-9 h-9
                                rounded-xl
                                bg-[#0b1f3a]
                                text-white
                                flex items-center justify-center
                                text-xs font-bold
                            "
                        >
                            {{ strtoupper(substr($currentAdmin->name ?? 'A', 0, 1)) }}
                        </div>

                        <div class="hidden xl:block">

                            <div class="text-xs font-semibold">
                                {{ $currentAdmin->name ?? 'Administrator' }}
                            </div>

                            <div class="text-[10px] text-slate-400">
                                Administrator
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </header>


        {{-- CONTENT --}}
        <main class="p-4 sm:p-6 lg:p-8">

            {{-- PAGE HEADER --}}
            <div class="mb-7">

                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">

                    <div>

                        <div class="flex items-center gap-2 text-xs text-slate-400 mb-2">

                            <span>VINAP</span>

                            <span>/</span>

                            <span class="text-slate-500">
                                Administration
                            </span>

                        </div>

                        <h1
                            class="
                                text-2xl
                                sm:text-[28px]
                                font-bold
                                tracking-[-0.025em]
                                text-slate-900
                            "
                        >
                            @yield('page-title', 'Dashboard')
                        </h1>

                        @hasSection('page-description')
                            <p class="mt-1.5 text-sm text-slate-500">
                                @yield('page-description')
                            </p>
                        @endif

                    </div>

                    @yield('page-actions')

                </div>

            </div>


            {{-- FLASH MESSAGE --}}
            @if(session('success'))

                <div
                    class="
                        mb-6
                        rounded-2xl
                        border border-emerald-200
                        bg-emerald-50
                        px-4 py-3
                        text-sm text-emerald-700
                        flex items-center gap-3
                    "
                >

                    <div
                        class="
                            w-7 h-7 rounded-full
                            bg-emerald-100
                            flex items-center justify-center
                        "
                    >
                        ✓
                    </div>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            @if(session('error'))

                <div
                    class="
                        mb-6
                        rounded-2xl
                        border border-red-200
                        bg-red-50
                        px-4 py-3
                        text-sm text-red-700
                    "
                >
                    {{ session('error') }}
                </div>

            @endif


            {{-- VIEW --}}
            @yield('content')

        </main>

    </div>

</div>


{{-- ============================================================= --}}
{{-- COMPONENT CSS --}}
{{-- ============================================================= --}}

<style>

    .admin-nav-item {
        position: relative;
        display: flex;
        align-items: center;
        gap: .75rem;
        min-height: 43px;
        padding: .65rem .75rem;
        border-radius: .75rem;
        color: rgba(255,255,255,.56);
        font-size: .78rem;
        font-weight: 500;
        transition:
            background-color .18s ease,
            color .18s ease,
            transform .18s ease;
    }

    .admin-nav-item:hover {
        color: rgba(255,255,255,.95);
        background: rgba(255,255,255,.055);
    }

    .admin-nav-item.active {
        color: #fff;
        background: rgba(255,255,255,.09);
    }

    .admin-nav-item.active::before {
        content: "";
        position: absolute;
        left: -12px;
        top: 10px;
        bottom: 10px;
        width: 3px;
        border-radius: 0 4px 4px 0;
        background: #34d399;
    }

    .nav-icon {
        width: 19px;
        height: 19px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .nav-icon svg {
        width: 18px;
        height: 18px;
    }

</style>


{{-- ============================================================= --}}
{{-- SIDEBAR JS --}}
{{-- ============================================================= --}}

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');

        const open = document.getElementById('openSidebar');
        const close = document.getElementById('closeSidebar');


        function openSidebar() {

            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');

            document.body.classList.add('overflow-hidden');
        }


        function closeSidebar() {

            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');

            document.body.classList.remove('overflow-hidden');
        }


        open?.addEventListener('click', openSidebar);
        close?.addEventListener('click', closeSidebar);
        overlay?.addEventListener('click', closeSidebar);


        document.addEventListener('keydown', function (event) {

            if (event.key === 'Escape') {
                closeSidebar();
            }

        });

    });

</script>


@stack('scripts')

</body>
</html>