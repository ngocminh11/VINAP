@extends('layouts.main')
@section('title','VINAP • Thư ngỏ')

@section('content')

{{-- Breadcrumb --}}
<nav class="text-sm text-neutral-500 mb-4">
    <a href="/" class="hover:text-brand">Trang chủ</a>
    <span class="mx-1">/</span>
    <span class="text-neutral-700">Thư ngỏ</span>
</nav>

{{-- Hero --}}
<section class="sec gradient-border">
    <p class="sec-kicker">OPEN LETTER</p>
    <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight mt-1">
        Thư gửi Quý Khách hàng <span class="text-brand">/ Dear Clients</span>
    </h1>
    <p class="mt-2 text-neutral-600">Chúng tôi trân trọng cảm ơn sự tin tưởng và đồng hành cùng VINAP.</p>
</section>

{{-- Thư ngỏ song ngữ --}}
<section class="mt-6 grid lg:grid-cols-2 gap-6">
    <article class="sec reveal">
        <div class="sec-head">
            <div class="w-1.5 h-6 rounded bg-accent"></div>
            <h2 class="sec-title">Kính gửi Quý Khách hàng</h2>
        </div>
        <div class="prose-like space-y-3">
            <p>VINAP chân thành cảm ơn Quý Khách hàng đã tin tưởng lựa chọn dịch vụ thẩm định giá và tư vấn đầu tư của chúng tôi. Với hơn 10 năm kinh nghiệm, chúng tôi theo đuổi phương châm <strong>Chuyên nghiệp – Chính xác – Minh bạch – Khách quan</strong>, cung cấp báo cáo rõ ràng, dữ liệu kiểm chứng và quy trình chuẩn mực.</p>
            <p>VINAP được cấp mã số doanh nghiệp <strong>0312126946</strong>; Giấy chứng nhận đủ điều kiện kinh doanh dịch vụ thẩm định giá số <strong>096/TĐG</strong>. Đội ngũ thẩm định viên được cấp thẻ hành nghề bởi Bộ Tài chính và được đào tạo định kỳ.</p>
            <ul class="list-dot space-y-2">
                <li>Giải pháp phù hợp mục đích sử dụng: tín dụng, M&A, kế toán, tranh tụng, đấu giá…</li>
                <li>Thời gian phản hồi nhanh, cam kết tiến độ.</li>
                <li>Bảo mật thông tin và tuân thủ pháp luật.</li>
            </ul>
        </div>
    </article>

    <article class="sec reveal">
        <div class="sec-head">
            <div class="w-1.5 h-6 rounded bg-accent"></div>
            <h2 class="sec-title">Dear Clients</h2>
        </div>
        <div class="prose-like space-y-3">
            <p>We deeply appreciate your trust in VINAP’s valuation and investment consulting services. With 10+ years of operation, we stand by <strong>Professionalism – Precision – Transparency – Objectivity</strong>, delivering clear reports, verifiable data, and compliant procedures.</p>
            <p>VINAP is registered under business code <strong>0312126946</strong> and holds the eligibility certificate <strong>096/TDG</strong>. Our valuers are licensed by the Ministry of Finance and trained regularly.</p>
            <ul class="list-dot space-y-2">
                <li>Fit-for-purpose solutions: credit, M&A, accounting, litigation, auction, etc.</li>
                <li>Rapid response with firm timelines.</li>
                <li>Confidentiality and legal compliance.</li>
            </ul>
        </div>
    </article>
</section>

{{-- CTA nhỏ --}}
<section class="mt-6 sec reveal">
    <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
        <div class="flex-1">
            <h3 class="text-lg md:text-xl font-bold">Cần báo giá hoặc lịch trình thực hiện?</h3>
            <p class="text-sm text-neutral-600 mt-1">Gửi mô tả tài sản, mục đích và thời hạn; chúng tôi phản hồi trong ngày làm việc.</p>
        </div>
        <div class="flex gap-3">
            <a class="btn-primary" href="/#contact">Liên hệ ngay</a>
            <a class="btn-ghost" href="#">Tải biểu mẫu</a>
        </div>
    </div>
</section>

{{-- Testimonials: bảng 2 cột kiểu mẫu nghiêm túc --}}
<section class="mt-8">
    <div class="sec-head">
        <div class="w-1.5 h-6 rounded bg-accent"></div>
        <h2 class="sec-title">Lời khen – Đánh giá / Testimonials from Clients</h2>
    </div>

    <div class="bg-white rounded-2xl shadow-soft overflow-hidden border border-neutral-200/70">
        <div class="overflow-x-auto">
            <table class="w-full text-[13px] md:text-sm table-fixed">
                <colgroup>
                    <col class="w-[320px] md:w-[360px]">
                    <col>
                </colgroup>
                <tbody>
                    @foreach($testimonials as $t)
                    @php
                    $viParas = is_array($t['vi'] ?? null) ? $t['vi'] : (isset($t['vi']) ? [$t['vi']] : []);
                    $enParas = is_array($t['en'] ?? null) ? $t['en'] : (isset($t['en']) ? [$t['en']] : []);
                    @endphp
                    <tr class="align-top odd:bg-white even:bg-brand-50/40">
                        {{-- Cột trái: tên, chức danh VI/EN --}}
                        <td class="p-4 md:p-5 border-b border-neutral-200/70">
                            <div class="font-semibold text-neutral-900">{{ $t['person'] }}</div>
                            @if(!empty($t['role_vi']))
                            <div class="text-xs text-neutral-700">{{ $t['role_vi'] }}</div>
                            @endif
                            @if(!empty($t['role_en']))
                            <div class="text-xs italic text-neutral-600 mt-1">{{ $t['role_en'] }}</div>
                            @endif
                        </td>

                        {{-- Cột phải: các đoạn VI rồi EN tương ứng --}}
                        <td class="p-4 md:p-5 border-b border-neutral-200/70 md:border-l">
                            @foreach($viParas as $i => $p)
                            <p class="leading-relaxed">“{{ $p }}”</p>
                            @if(isset($enParas[$i]))
                            <p class="mt-2 italic text-neutral-700">“{{ $enParas[$i] }}”</p>
                            @endif
                            @if($i < count($viParas)-1) <div class="h-2">
        </div> @endif
        @endforeach

        {{-- Nếu số đoạn EN > VI, hiển thị phần EN dư --}}
        @if(count($enParas) > count($viParas))
        @for($j = count($viParas); $j < count($enParas); $j++)
            <p class="mt-2 italic text-neutral-700">“{{ $enParas[$j] }}”</p>
            @endfor
            @endif
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
    </div>
    </div>
</section>

{{-- Main + Sidebar: chung hàng --}}
<section class="mt-10 grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2">
        <div class="sec gradient-border">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
                <div class="flex-1">
                    <h3 class="text-xl font-bold">Hợp tác cùng VINAP</h3>
                    <p class="text-sm text-neutral-600 mt-1">Chúng tôi sẵn sàng đồng hành trong từng quyết định quan trọng.</p>
                </div>
                <div class="flex gap-3">
                    <a class="btn-primary" href="/#services">Xem dịch vụ</a>
                    <a class="btn-ghost" href="/gioi-thieu">Hồ sơ năng lực</a>
                </div>
            </div>
        </div>
    </div>

    <aside class="space-y-6">
        <div class="sec">
            <div class="sec-head">
                <div class="w-1.5 h-6 rounded bg-accent"></div>
                <h3 class="font-semibold text-lg">Dịch vụ nổi bật</h3>
            </div>
            <div class="grid gap-3">
                @foreach(($featured ?? []) as $f)
                <a href="/#services" class="block rounded-xl overflow-hidden shadow-soft">
                    <img src="{{ $f['img'] }}" class="w-full h-28 object-cover" alt="">
                    <div class="px-3 py-2 text-sm">{{ $f['title'] }}</div>
                </a>
                @endforeach
            </div>
        </div>

        <div class="sec">
            <div class="sec-head">
                <div class="w-1.5 h-6 rounded bg-accent"></div>
                <h3 class="font-semibold text-lg">Văn bản pháp luật</h3>
            </div>
            <ul class="space-y-2 text-sm">
                @foreach(($laws ?? []) as $law)
                <li class="flex gap-2"><span class="mt-1 h-1.5 w-1.5 rounded-full bg-accent"></span>{{ $law }}</li>
                @endforeach
            </ul>
        </div>

        <div class="sec">
            <div class="sec-head">
                <div class="w-1.5 h-6 rounded bg-accent"></div>
                <h3 class="font-semibold text-lg">Liên kết web</h3>
            </div>
            <ul class="space-y-2 text-sm">
                @foreach(($links ?? []) as $l)
                <li><a class="hover:text-brand" href="{{ $l['href'] }}">{{ $l['label'] }}</a></li>
                @endforeach
            </ul>
        </div>
    </aside>
</section>
@endsection