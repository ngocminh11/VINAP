@extends('layouts.main')
@section('title','VINAP • Hồ sơ năng lực')

@section('content')

<div class="relative">

    {{-- BACKGROUND LOGO --}}
    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <img src="{{ asset('images/vinaplogo.png') }}"
             class="w-[400px] md:w-[700px] lg:w-[900px] opacity-[0.1] select-none"
             alt="">
    </div>

    <div class="relative z-10">

        {{-- BREADCRUMB --}}
        <nav class="text-sm text-neutral-500 mb-4">
            <a href="/" class="hover:text-brand">Trang chủ</a>
            <span class="mx-1">/</span>
            <span class="text-neutral-700">Hồ sơ năng lực</span>
        </nav>

        {{-- HEADER --}}
        <section class="sec gradient-border">
            <p class="sec-kicker">CAPABILITY STATEMENT</p>
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight">
                Hồ sơ năng lực <span class="text-brand">/ Capability Profile</span>
            </h1>
            <p class="mt-2 text-neutral-600">Nhân sự chủ chốt của VINAP.</p>
        </section>

        {{-- TEAM --}}
        <section class="mt-8">

            {{-- DESKTOP --}}
            <div class="hidden md:block bg-white rounded-2xl shadow overflow-hidden border">
                <table class="w-full text-sm table-fixed">

                    <colgroup>
                        <col class="w-14">
                        <col class="w-[260px]">
                        <col>
                        <col class="w-[220px]">
                    </colgroup>

                    <thead class="bg-brand-50/60 text-left">
                        <tr>
                            <th class="px-4 py-3">Số
                                <div class="text-xs text-neutral-400 italic font-normal">
                                No                                </div>
                            </th>
                            <th class="px-4 py-3">
                                Họ và tên
                                <div class="text-xs text-neutral-400 italic font-normal">
                                    Full Name
                                </div>
                            </th>

                            <th class="px-4 py-3">
                                Quy trình công tác, năng lực chuyên môn
                                <div class="text-xs text-neutral-400 italic font-normal">
                                    Working Experience, Professional Ability
                                </div>
                            </th>

                            <th class="px-4 py-3 text-right">
                                Thẻ hành nghề
                                <div class="text-xs text-neutral-400 italic font-normal">
                                    Valuer Certificate
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($team as $i => $m)

                        @php
                        $name = $m['name'] ?? '';

                        $slug = \Illuminate\Support\Str::of($name)
                            ->lower()
                            ->ascii()
                            ->replace(' ', '')
                            ->replaceMatches('/[^a-z0-9]/', '');

                        $imgPath = asset("images/HSNL/{$slug}_HSNL.jpg");
                        $fallback = asset("images/default.jpg");
                        @endphp

                        <tr class="group align-top transition hover:bg-brand-50/40">

                            {{-- STT --}}
                            <td class="p-4 border-b font-semibold">
                                {{ $i + 1 }}
                            </td>

                            {{-- INFO --}}
                            <td class="p-4 border-b">
                                <div class="font-bold text-neutral-900 group-hover:text-brand transition">
                                    {{ $m['name'] }}
                                </div>

                                <div class="text-xs text-neutral-700">{{ $m['role_vi'] ?? '' }}</div>
                                <div class="text-xs italic text-neutral-600">{{ $m['role_en'] ?? '' }}</div>

                                @if(!empty($m['certs']))
                                <ul class="mt-2 text-xs space-y-1">
                                    @foreach($m['certs'] as $c)
                                    <li>• {!! $c !!}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </td>

                            {{-- DETAILS --}}
                            <td class="p-4 border-b">
                                <div class="space-y-1 text-[13px]">
                                    @foreach(($m['exp_vi'] ?? []) as $vi)
                                    <div>+ {{ $vi }}</div>
                                    @endforeach
                                </div>

                                @if(!empty($m['years']))
                                <div class="mt-2 text-xs text-neutral-600">
                                    {{ $m['years'] }} năm kinh nghiệm
                                </div>
                                @endif
                            </td>

                            {{-- IMAGE RIGHT --}}
                            <td class="p-4 border-b">
                                <div class="flex justify-end">
                                    <img src="{{ $imgPath }}"
                                         onerror="this.src='{{ $fallback }}'"
                                         class="w-[160px] h-[90px] lg:w-[200px] lg:h-[110px]
                                                object-cover rounded-lg shadow cursor-pointer
                                                transition group-hover:scale-105"
                                         onclick="openPreview('{{ $imgPath }}')">
                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- MOBILE --}}
            <div class="md:hidden space-y-4">
                @foreach($team as $i => $m)

                @php
                $name = $m['name'] ?? '';

                $slug = \Illuminate\Support\Str::of($name)
                    ->lower()
                    ->ascii()
                    ->replace(' ', '')
                    ->replaceMatches('/[^a-z0-9]/', '');

                $imgPath = asset("images/HSNL/{$slug}_HSNL.jpg");
                $fallback = asset("images/default.jpg");
                @endphp

                <article class="bg-white rounded-2xl shadow p-4">

                    <img src="{{ $imgPath }}"
                         onerror="this.src='{{ $fallback }}'"
                         class="w-full h-[200px] object-cover rounded-lg mb-3 cursor-pointer"
                         onclick="openPreview('{{ $imgPath }}')">

                    <div class="font-bold">{{ $m['name'] }}</div>
                    <div class="text-xs text-neutral-600">{{ $m['role_vi'] ?? '' }}</div>

                    <div class="mt-2 text-sm space-y-1">
                        @foreach(($m['exp_vi'] ?? []) as $vi)
                        <div>+ {{ $vi }}</div>
                        @endforeach
                    </div>

                </article>
                @endforeach
            </div>

        </section>

    </div>
</div>

{{-- PREVIEW --}}
<div id="imgPreview" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50">
    <img id="previewImg" class="max-w-[95%] max-h-[85%] object-contain rounded-xl shadow-2xl">
</div>

<script>
function openPreview(src) {
    const modal = document.getElementById('imgPreview');
    const img = document.getElementById('previewImg');

    img.src = src;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

document.getElementById('imgPreview').onclick = function () {
    this.classList.add('hidden');
};
</script>

@endsection