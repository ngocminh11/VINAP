@extends('layouts.main')
@section('title','VINAP • Giới thiệu')

@section('content')

{{-- LOGO BACKGROUND --}}
    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0">
        <img src="{{ asset('images/vinaplogo.png') }}"
             class="w-[400px] md:w-[700px] lg:w-[900px] opacity-[0.1] contrast-125 select-none"
             alt="">
    </div>

{{-- Breadcrumb --}}
<nav class="text-sm text-neutral-500 mb-4">
    <a href="/" class="hover:text-brand">Trang chủ</a>
    <span class="mx-1">/</span>
    <span class="text-neutral-700">Giới thiệu</span>
</nav>

{{-- Hero nhỏ --}}
<section class="sec gradient-border">
    <div>
        <p class="sec-kicker">ABOUT VINAP</p>
        <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight mt-1">
            Giới thiệu chung <span class="text-brand">/ Overview</span>
        </h1>
        <div class="mt-4 flex flex-wrap gap-2">
            <span class="badge">Chuyên nghiệp</span>
            <span class="badge">Chính xác</span>
            <span class="badge">Minh bạch</span>
            <span class="badge">Khách quan</span>
        </div>
    </div>
</section>

{{-- 2 cột: Overview VI/EN --}}
<section class="mt-6 grid lg:grid-cols-2 gap-6">
    <article class="sec reveal">
        <div class="sec-head">
            <div class="w-1.5 h-6 rounded bg-accent"></div>
            <h2 class="sec-title">Giới thiệu chung</h2>
        </div>
        <div class="prose-like space-y-3">
            <p>Công ty Cổ phần Thẩm định giá và Tư vấn đầu tư Việt Nam (VINAP) xin trân trọng gửi tới Quý Khách hàng lời chúc sức khỏe và thành công trong công việc.</p>
            <p>Là một trong những Doanh nghiệp Thẩm định giá - Tư vấn đầu tư chuyên nghiệp tại Việt Nam với trên 10 năm hoạt động. VINAP đã tạo được uy tín trong thị trường dịch vụ thẩm định giá, tư vấn đầu tư. VINAP không ngừng hoàn thiện nhằm mang lại sự phục vụ chu đáo, chuyên nghiệp, an tâm về chất lượng, kịp thời, cùng tính chính xác cao, góp phần minh bạch thị trường, đáp ứng kịp thời và tốt nhất yêu cầu của Quý Khách hàng.</p>
            <p>Công ty Cổ phần Thẩm định giá và Tư vấn Đầu tư Việt Nam có mã số doanh nghiệp <strong>0312126946</strong> do Phòng Đăng ký kinh doanh - Sở Kế hoạch và Đầu tư thành phố Hồ Chí Minh cấp, đăng ký lần đầu ngày <strong>16/01/2013</strong>, đăng ký thay đổi lần thứ 6 ngày <strong>18/04/2020</strong> và được Bộ Tài chính cấp Giấy chứng nhận đủ điều kiện kinh doanh dịch vụ thẩm định giá lần đầu ngày <strong>24/09/2015</strong>, cấp lại lần thứ 3 ngày <strong>21/05/2020</strong> với mã số <strong>096/TĐG</strong>.</p>
            <p>Danh sách doanh nghiệp thẩm định giá và thẩm định viên về giá đủ điều kiện hành nghề thẩm định giá tài sản hàng năm. Thẻ thẩm định viên về giá do Bộ Tài chính cấp.</p>
        </div>
    </article>

    <article class="sec reveal">
        <div class="sec-head">
            <div class="w-1.5 h-6 rounded bg-accent"></div>
            <h2 class="sec-title">Overview (English)</h2>
        </div>
        <div class="prose-like space-y-3">
            <p>We at Viet Nam Appraisal and Investment Consulting Corporation (VINAP) extend our best wishes for your well-being and future success in business.</p>
            <p>In the valuation and investment consulting service market, VINAP has established a reputation as one of the professional Valuation - Investment Consulting Enterprises in Vietnam, with more than 10 years of operation. VINAP is committed to providing professional, mindful service that is timely, accurate, and of high quality. This effort contributes to market transparency and ensures that the requirements of our clients are fulfilled quickly and effectively.</p>
            <p>VINAP was initially registered on January 16, 2013, with business code <strong>0312126946</strong>. The latest modification was issued on May 21, 2020 under the eligibility code <strong>096/TDG</strong>.</p>
            <p>The annual listing includes authorized appraisal businesses and valuers. Certificates are issued by the Ministry of Finance.</p>
        </div>
    </article>
</section>

{{-- Phương châm & Mục tiêu --}}
<section class="mt-6 sec reveal">
    <div class="sec-head">
        <div class="w-1.5 h-6 rounded bg-accent"></div>
        <h2 class="sec-title">Phương châm & Mục tiêu / Development Orientation</h2>
    </div>
    <div class="grid md:grid-cols-2 gap-6 text-sm">
        <ul class="list-dot space-y-2">
            <li>VINAP cung cấp dịch vụ thẩm định giá <strong>chuyên nghiệp, tin cậy</strong>, đúng hạn, minh bạch.</li>
            <li>Sản phẩm, dịch vụ <strong>chất lượng cao nhất</strong>.</li>
            <li>Đội ngũ <strong>chuyên nghiệp, trung thực, đạo đức</strong>.</li>
            <li><strong>Đồng hành</strong> cùng khách hàng trong suốt hành trình.</li>
            <li>Được <strong>hợp tác và ủng hộ</strong> rộng rãi trên toàn quốc.</li>
        </ul>
        <ul class="list-dot space-y-2">
            <li>Delivering <strong>professional, dependable</strong> services on time and transparently.</li>
            <li>Committed to the <strong>highest quality</strong>.</li>
            <li>Building an <strong>ethical, honest, professional</strong> team.</li>
            <li><strong>Supporting clients</strong> end to end.</li>
            <li>Widespread <strong>cooperation and support</strong> nationwide.</li>
        </ul>
    </div>
</section>

{{-- Thông tin doanh nghiệp --}}
<section class="mt-6 sec reveal">
    <div class="sec-head">
        <div class="w-1.5 h-6 rounded bg-accent"></div>
        <h2 class="sec-title">Thông tin doanh nghiệp / Business Information</h2>
    </div>
    <div class="grid sm:grid-cols-2 gap-4 text-sm">
        <div class="info-tile">
            <div class="font-medium">Tên tiếng Việt</div>
            <div>CÔNG TY CỔ PHẦN THẨM ĐỊNH GIÁ VÀ TƯ VẤN ĐẦU TƯ VIỆT NAM</div>
        </div>
        <div class="info-tile">
            <div class="font-medium">Trade name</div>
            <div>VIETNAM APPRAISAL AND INVESTMENT CONSULTING CORPORATION</div>
        </div>
        <div class="info-tile">
            <div class="font-medium">Tên viết tắt</div>
            <div>VINAP</div>
        </div>
        <div class="info-tile">
            <div class="font-medium">Business License</div>
            <div>0312126946</div>
        </div>
        <div class="info-tile">
            <div class="font-medium">Mã đủ điều kiện KD thẩm định giá</div>
            <div>096/TĐG</div>
        </div>
        <div class="info-tile">
            <div class="font-medium">Eligibility code</div>
            <div>096/TDG</div>
        </div>
        <div class="info-tile sm:col-span-2">
            <div class="font-medium">Trụ sở chính / Head office</div>
            <div>Khu biệt thự Nine South, Nhà số 9 đường số 7, KDC Vina Nam Phú, Phước Kiển, Nhà Bè, TP.HCM.</div>
            <div class="mt-1 text-neutral-600">Nine South Estates, villa no 9, road no 7, Vina Nam Phu, HCMC, VietNam.</div>
        </div>
        <div class="info-tile">
            <div class="font-medium">Điện thoại / Tel</div>
            <div>(+8428) 3933 0833</div>
        </div>
        <div class="info-tile">
            <div class="font-medium">Hotline</div>
            <div>(+84) 917 168 816</div>
        </div>
        <div class="info-tile sm:col-span-2">
            <div class="font-medium">Website</div>
            <div>https://www.vinap.vn</div>
        </div>
    </div>
</section>

{{-- Hệ thống chi nhánh --}}
<section class="mt-6">
    <div class="sec-head">
        <div class="w-1.5 h-6 rounded bg-accent"></div>
        <h2 class="sec-title">Hệ thống chi nhánh / System of Branches</h2>
    </div>
    <div class="card-col">
        <article class="sec reveal">
            <h3 class="font-semibold">Chi nhánh Trà Vinh</h3>
            <div class="hr-soft"></div>
            <p class="text-sm">Số 357, đường Nguyễn Thị Minh Khai, khóm 9, phường 7, TP Trà Vinh, tỉnh Trà Vinh.</p>
            <p class="text-sm mt-1">Tel: (+84) 978 910 555 ; (+84) 964 881919 • Hotline: (+84) 917 168 816</p>
            <p class="text-xs text-neutral-600 mt-2">Branch Tra Vinh: No 357, Nguyen Thi Minh Khai Rd, Ward 7, Tra Vinh City, Viet Nam.</p>
        </article>
        <article class="sec reveal">
            <h3 class="font-semibold">Chi nhánh Long An</h3>
            <div class="hr-soft"></div>
            <p class="text-sm">Số 35, Nguyễn Hữu Thọ, phường 3, thị xã Kiến Tường, tỉnh Long An.</p>
            <p class="text-sm mt-1">Hotline: (+84) 917 168 816 – (+84) 942 335 346</p>
            <p class="text-xs text-neutral-600 mt-2">Branch Long An: No 35, Nguyen Huu Tho, Long An Province, Viet Nam.</p>
        </article>
        <article class="sec reveal">
            <h3 class="font-semibold">VPĐD Vũng Tàu</h3>
            <div class="hr-soft"></div>
            <p class="text-sm">Số 25 Ung Văn Khiêm, phường Long Toàn, TP Bà Rịa, tỉnh Bà Rịa – Vũng Tàu.</p>
            <p class="text-sm mt-1">Tel: (+84) 917 61 77 88 • Hotline: (+84) 917 168 816</p>
            <p class="text-xs text-neutral-600 mt-2">Representative office: No 25 Ung Van Khiem, Ba Ria City, Viet Nam.</p>
        </article>
    </div>
</section>

{{-- Tổ chức liên kết --}}
<section class="mt-6 sec reveal">
    <div class="sec-head">
        <div class="w-1.5 h-6 rounded bg-accent"></div>
        <h2 class="sec-title">Tổ chức liên kết / Associated Institution</h2>
    </div>
    <div class="grid md:grid-cols-2 gap-4 text-sm">
        <div>
            <div class="font-medium">Trung Tâm Kỹ thuật Tài nguyên & Môi trường tỉnh Bà Rịa - Vũng Tàu</div>
            <div>Đ/c: 368 Lê Hồng Phong, P.3, TP Vũng Tàu • ĐT: (+84254) 3530 717 • Hotline: (+84) 917 168 816</div>
        </div>
        <div>
            <div class="font-medium">Technical Assistance Center for Natural Resources and Environment, Ba Ria - Vung Tau</div>
            <div>Add: 368 Le Hong Phong Rd, Vung Tau City • Tel: (+84254) 3530 717 • Hotline: (+84) 917 168 816</div>
        </div>
    </div>
</section>

{{-- Main + Sidebar chung hàng --}}
<section class="mt-8 grid lg:grid-cols-3 gap-6">
    {{-- Main: CTA --}}
    <div class="lg:col-span-2 space-y-6">
        <div class="sec gradient-border">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
                <div class="flex-1">
                    <h3 class="text-xl font-bold">Cần hồ sơ năng lực hoặc báo giá?</h3>
                    <p class="text-sm text-neutral-600 mt-1">Gửi yêu cầu, chúng tôi phản hồi trong ngày làm việc.</p>
                </div>
                <div class="flex gap-3">
                    <a class="btn-primary" href="#">Tải hồ sơ năng lực</a>
                    <a class="btn-ghost" href="/#contact">Liên hệ ngay</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Sidebar --}}
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