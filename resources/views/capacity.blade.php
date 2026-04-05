@extends('layouts.main')
@section('title','VINAP • Hồ sơ năng lực')

@section('content')

{{-- LOGO BACKGROUND --}}
    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <img src="{{ asset('images/vinaplogo.png') }}"
             class="w-[400px] md:w-[700px] lg:w-[900px] opacity-[0.08] contrast-125 select-none"
             alt="">
    </div>

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
    <p class="mt-2 text-neutral-600">Nhân sự chủ chốt và kinh nghiệm chuyên môn của VINAP.</p>
    {{-- NOTE: Link xem hồ sơ năng lực chi tiết --}}
    <p class="mt-3 text-sm text-neutral-700">
        Quý khách hàng xem chi tiết hồ sơ năng lực, vui lòng
        <a href="https://vinap.vn/image/data/ho-so-nang-luc/HSNL_VINAP_T9.2024_opt.pdf" class="text-brand underline hover:opacity-80">
            click vào đây
        </a>.
    </p>

</section>

{{-- HR HIGHLIGHTS (nếu đang dùng $hr) --}}
@if(!empty($hr))
<section class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-3">
    @foreach($hr as $item)
    <div class="bg-white rounded-xl shadow-soft p-4">
        <div class="text-sm">{{ $item['vi'] }}</div>
        <div class="text-xs italic text-neutral-600">{{ $item['en'] }}</div>
    </div>
    @endforeach
</section>
@endif

{{-- BẢNG NHÂN SỰ 3 CỘT --}}
<section class="mt-8">
    <div class="bg-white rounded-2xl shadow-soft overflow-hidden border border-neutral-200/70 hidden md:block">
        <table class="w-full text-sm table-fixed">
            <colgroup>
                <col class="w-16"> {{-- Stt / No --}}
                <col class="w-[320px]"> {{-- Name --}}
                <col> {{-- Details --}}
            </colgroup>
            <thead class="bg-brand-50/50 text-left">
                <tr>
                    <th class="px-4 py-3 border-b">
                        <div class="font-semibold">Stt</div>
                        <div class="text-xs text-neutral-600">No</div>
                    </th>
                    <th class="px-4 py-3 border-b">
                        <div class="font-semibold">Họ và tên</div>
                        <div class="text-xs text-neutral-600">Full name</div>
                    </th>
                    <th class="px-4 py-3 border-b">
                        <div class="font-semibold">Quá trình công tác, năng lực chuyên môn</div>
                        <div class="text-xs text-neutral-600">Working Experience, Professional Ability</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($team as $i => $m)
                <tr class="align-top odd:bg-white even:bg-brand-50/30">
                    {{-- STT --}}
                    <td class="p-4 border-b">{{ $i + 1 }}</td>

                    {{-- NAME + ROLE + CERTS --}}
                    <td class="p-4 border-b">
                        <div class="font-semibold text-neutral-900">{{ $m['name'] }}</div>
                        @if(!empty($m['role_vi'])) <div class="text-xs text-neutral-700">{{ $m['role_vi'] }}</div>@endif
                        @if(!empty($m['role_en'])) <div class="text-xs italic text-neutral-600">{{ $m['role_en'] }}</div>@endif>

                        @if(!empty($m['certs']))
                        <ul class="mt-2 text-xs space-y-1">
                            @foreach($m['certs'] as $c) <li>• {!! $c !!}</li> @endforeach
                        </ul>
                        @endif
                    </td>

                    {{-- DETAILS: EDUCATION + EXPERIENCE --}}
                    <td class="p-4 border-b md:border-l">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <div class="text-[13px] font-medium mb-1">Trình độ chuyên môn nghiệp vụ</div>
                                <div class="text-[12.5px] text-neutral-700 space-y-1">
                                    @foreach(($m['edu_vi'] ?? []) as $k => $vi)
                                    <div>
                                        <div>{{ $vi }}</div>
                                        @if(isset($m['edu_en'][$k]))<div class="italic text-neutral-600">{{ $m['edu_en'][$k] }}</div>@endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <div class="text-[13px] font-medium mb-1">Kinh nghiệm công tác</div>
                                <div class="text-[12.5px] text-neutral-700 space-y-1">
                                    @foreach(($m['exp_vi'] ?? []) as $k => $vi)
                                    <div>
                                        <div>+ {{ $vi }}</div>
                                        @if(isset($m['exp_en'][$k]))<div class="italic text-neutral-600">{{ $m['exp_en'][$k] }}</div>@endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @if(!empty($m['years']))
                        <div class="mt-3 text-xs text-neutral-600">
                            Thâm niên công tác: {{ $m['years'] }} <span class="italic">/ Employee Recording: {{ $m['years'] }}</span>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- MOBILE CARDS --}}
    <div class="md:hidden space-y-4">
        @foreach($team as $i => $m)
        <article class="bg-white rounded-2xl shadow-soft p-4">
            <div class="flex items-start justify-between">
                <div>
                    <div class="text-xs text-neutral-500">Stt / No</div>
                    <div class="font-semibold">{{ $i + 1 }}</div>
                </div>
            </div>

            <div class="mt-2">
                <div class="text-xs text-neutral-500">Họ và tên / Full name</div>
                <div class="font-semibold">{{ $m['name'] }}</div>
                @if(!empty($m['role_vi'])) <div class="text-xs text-neutral-700">{{ $m['role_vi'] }}</div>@endif
                @if(!empty($m['role_en'])) <div class="text-xs italic text-neutral-600">{{ $m['role_en'] }}</div>@endif
            </div>

            @if(!empty($m['certs']))
            <div class="mt-3">
                <div class="text-xs text-neutral-500">Chứng chỉ / Certificates</div>
                <ul class="list-disc ms-5 text-xs space-y-1">
                    @foreach($m['certs'] as $c) <li>{!! $c !!}</li> @endforeach
                </ul>
            </div>
            @endif

            <div class="mt-3">
                <div class="text-xs text-neutral-500">Trình độ / Professional ability</div>
                <ul class="list-disc ms-5 text-xs space-y-1">
                    @foreach(($m['edu_vi'] ?? []) as $k => $vi)
                    <li>
                        <div>{{ $vi }}</div>
                        @if(isset($m['edu_en'][$k]))<div class="italic text-neutral-600">{{ $m['edu_en'][$k] }}</div>@endif
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-3">
                <div class="text-xs text-neutral-500">Kinh nghiệm / Working experience</div>
                <ul class="list-disc ms-5 text-xs space-y-1">
                    @foreach(($m['exp_vi'] ?? []) as $k => $vi)
                    <li>
                        <div>{{ $vi }}</div>
                        @if(isset($m['exp_en'][$k]))<div class="italic text-neutral-600">{{ $m['exp_en'][$k] }}</div>@endif
                    </li>
                    @endforeach
                </ul>
            </div>

            @if(!empty($m['years']))
            <div class="mt-3 text-xs text-neutral-600">
                Thâm niên / Employee Recording: {{ $m['years'] }}
            </div>
            @endif
        </article>
        @endforeach
    </div>
</section>
@endsection