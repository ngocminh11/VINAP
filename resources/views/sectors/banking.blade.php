@extends('layouts.main')

@section('content')
<a href="/" class="back-floating">
    ← Back
</a>
<div class="max-w-7xl mx-auto px-6 py-12"> {{-- 👈 tăng width container --}}

{{-- TITLE --}}
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold uppercase tracking-wide text-gray-800">
        KHỐI NGÂN HÀNG VÀ DOANH NGHIỆP 
        </h2>
        <p class="text-gray-500 mt-3 uppercase tracking-widest text-sm">
        BANKING AND BUSINESS
        </p>
    </div>

    {{-- GROUP 1 --}}
    <div class="mb-16">
        <h3 class="section-title">
            Sở Tài Nguyên và Môi Trường thành phố Hồ Chí Minh
            <span>Department Of Natural Resources And Environment Of Ho Chi Minh City</span>
        </h3>

        <div class="grid md:grid-cols-2 gap-10">

            <div class="card" data-index="0">
                <div class="shine"></div><div class="light"></div>
                <img src="{{ asset('images/goverment/image.png') }}" class="img">
                <div class="content">
                    <p class="vi">Khu đất số 124/9D đường Ung Văn Khiêm, phường 25, quận Bình Thạnh của Công ty Cổ phần Tập đoàn Tân Thành Đô</p>
                    <p class="en">Plot No. 124/9D Ung Van Khiem Street, Ward 25, Binh Thanh District of New City Group Joint Stock Company.</p>
                </div>
            </div>

            <div class="card" data-index="1">
                <div class="shine"></div><div class="light"></div>
                <img src="{{ asset('images/goverment/image.png') }}" class="img">
                <div class="content">
                    <p class="vi">Khu đất số 291/2 đường Lũy Bán Bích, phường Hòa Thạnh, quận Tân Phú của Công ty Cổ phần Địa ốc Sài Gòn Thương Tín</p>
                    <p class="en">Plot No. 291/2 Luy Ban Bich Street, Hoa Thanh Ward, Tan Phu District of Sai Gon Thuong Tin Real Estate Joint Stock Company</p>
                </div>
            </div>

        </div>
    </div>

    {{-- GROUP 2 --}}
    <div class="mb-16">
        <h3 class="section-title">
            Sở Tài Chính tỉnh Bình Dương
            <span>Department of Finance of Binh Duong Province</span>
        </h3>

        <div class="grid md:grid-cols-2 gap-10">

            <div class="card" data-index="2">
                <div class="shine"></div><div class="light"></div>
                <img src="{{ asset('images/goverment/image.png') }}" class="img">
                <div class="content">
                    <p class="vi">Khu đất 43ha, phường Hòa Phú, thành phố Thủ Dầu Một, tỉnh Bình Dương</p>
                    <p class="en">43-hectare site, Hoa Phu Ward, Thu Dau Mot City, Binh Duong Province.</p>
                </div>
            </div>

            <div class="card" data-index="3">
                <div class="shine"></div><div class="light"></div>
                <img src="{{ asset('images/goverment/image.png') }}" class="img">
                <div class="content">
                    <p class="vi">Khu đất 145ha, phường Hòa Phú, thành phố Thủ Dầu Một, tỉnh Bình Dương</p>
                    <p class="en">145-hectare site, Hoa Phu ward, Thu Dau Mot City, Binh Duong Province.</p>
                </div>
            </div>

        </div>
    </div>

    {{-- GROUP 3 --}}
    <div class="mb-16">
        <h3 class="section-title">
            Tài sản thẩm định khác
            <span>Other Appraisal Assets</span>
        </h3>

        <div class="grid md:grid-cols-2 gap-10">

            {{-- 4 → 11 FULL --}}
            <div class="card" data-index="4">
                <div class="shine"></div><div class="light"></div>
                <img src="{{ asset('images/goverment/image.png') }}" class="img">
                <div class="content">
                    <p class="vi">Hội đồng định giá tài sản thường xuyên trong tố tụng hình sự cấp thành phố, Lô hàng vi phạm.</p>
                    <p class="en">The Council for regular asset valuation in City-level criminal proceedings - Ho Chi Minh City Department of Finance, Violating shipment.</p>
                </div>
            </div>

            <div class="card" data-index="5">
                <div class="shine"></div><div class="light"></div>
                <img src="{{ asset('images/goverment/image.png') }}" class="img">
                <div class="content">
                    <p class="vi">Sở Tài Chính thành phố Hồ Chí Minh, Thanh lý danh mục 36 món.</p>
                    <p class="en">Department Of Finance, Ho Chi Minh City, Liquidation of list of 36 goods.</p>
                </div>
            </div>

            <div class="card" data-index="6">
                <div class="shine"></div><div class="light"></div>
                <img src="{{ asset('images/goverment/image.png') }}" class="img">
                <div class="content">
                    <p class="vi">Phòng Tài chính Kế hoạch Phú Quốc, Thanh lý 12 dãy phòng học tại xã Bãi Thơm, thành phố Phú Quốc.</p>
                    <p class="en">Phu Quoc Finance and Planning Department, Liquidation of 12 classroom blocks in Bai Thom commune, Phu Quoc City.</p>
                </div>
            </div>

            <div class="card" data-index="7">
                <div class="shine"></div><div class="light"></div>
                <img src="{{ asset('images/goverment/image.png') }}" class="img">
                <div class="content">
                    <p class="vi">Đội Kiểm soát chống buôn lậu khu vực miền Nam - Cục Điều tra chống buôn lậu – Tổng Cục Hải quan, Lô hàng vi phạm máy móc thiết bị của Công ty TNHH Thương mại M.I.C.</p>
                    <p class="en">Southern Anti-Smuggling Control Team - Anti-Smuggling Investigation Department - General Department of Customs, Shipment of violating machinery and equipment of M.I.C Trading Company Limited.</p>
                </div>
            </div>

            <div class="card" data-index="8">
                <div class="shine"></div><div class="light"></div>
                <img src="{{ asset('images/goverment/image.png') }}" class="img">
                <div class="content">
                    <p class="vi">Dự án Khu đô thị Golden City An Giang và Khu liên hợp văn hóa, thể thao, dịch vụ, hội chợ triển lãm và dân cư phường Mỹ Hòa, thành phố Long Xuyên, tỉnh An Giang.</p>
                    <p class="en">Golden City An Giang Urban Area Project and Cultural, Sports, Service, Exhibition Fair and Residential Complex in My Hoa Ward, Long Xuyen City, An Giang Province.</p>
                </div>
            </div>

            <div class="card" data-index="9">
                <div class="shine"></div><div class="light"></div>
                <img src="{{ asset('images/goverment/image.png') }}" class="img">
                <div class="content">
                    <p class="vi">Dự án Nhà máy điện mặt trời Sao Mai, xã An Hảo, huyện Tịnh Biên, tỉnh An Giang của Công ty Cổ phần Tập đoàn Sao Mai.</p>
                    <p class="en">Sao Mai Solar Power Plant Project, An Hao Commune, Tinh Bien District, An Giang Province of Sao Mai Group Corporation.</p>
                </div>
            </div>

            <div class="card" data-index="10">
                <div class="shine"></div><div class="light"></div>
                <img src="{{ asset('images/goverment/image.png') }}" class="img">
                <div class="content">
                    <p class="vi">Dự án Nhà máy điện mặt trời Văn Giáo 1, xã An Cư, huyện Tịnh Biên, tỉnh An Giang của Công ty CP Nhà máy Năng lượng Mặt trời Văn Giáo.</p>
                    <p class="en">Van Giao 1 Solar Power Plant Project, An Cu Commune, Tinh Bien District, An Giang Province of Van Giao Solarenergy Plant Joint Stock Company.</p>
                </div>
            </div>

            <div class="card" data-index="11">
                <div class="shine"></div><div class="light"></div>
                <img src="{{ asset('images/goverment/image.png') }}" class="img">
                <div class="content">
                    <p class="vi">Dự án đầu tư xây dựng Khu dân cư – Trung tâm thương mại hướng Đông, thị trấn Tri Tôn, tỉnh An Giang.</p>
                    <p class="en">Investment project to build residential area - commercial center facing East, Tri Ton town, An Giang Province.</p>
                </div>
            </div>

        </div>
    </div>
    <div class="doc-wrapper">

    {{-- ================= BANKING TEXT SECTION ================= --}}
<div class="banking-doc">

    <div class="banking-grid">

        {{-- ITEM --}}
        <div class="bank-item">
            <h4>Công ty Cổ phần Đầu tư Xây dựng Long An</h4>
            <p class="en-title">IDICO Long An Construction Investment Joint Stock Company - IDICO</p>

            <ul>
                <li>Dự án Khu dân cư, nhà ở công nhân của Công ty Cổ phần Đầu Tư Xây dựng Long An – IDICO, xã Hựu Thạnh, huyện Đức Hòa, tỉnh Long An. Quy mô dự án 470.939m2.</li>
                <li class="en">Residential area and workers' housing project of Long An Investment and Construction Joint Stock Company - IDICO, Huu Thanh commune, Duc Hoa district, Long An province. Project scale 470,939m2.</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Công ty Cổ phần Bất động sản Gia Linh</h4>
            <p class="en-title">Gia Linh Real Estate Joint Stock Company</p>

            <ul>
                <li>Khu đất tại xã Tân Kiên, huyện Bình Chánh, thành phố Hồ Chí Minh</li>
                <li class="en">Land in Tan Kien commune, Binh Chanh district, Ho Chi Minh City</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Công ty Cổ phần Đầu tư và Phát triển Bất động sản An Gia</h4>
            <p class="en-title">Investment and Development Joint Stock Company An Gia Real Estate</p>

            <ul>
                <li>Dự án tại thị trấn Tân Túc, huyện Bình Chánh, thành phố Hồ Chí Minh</li>
                <li class="en">Project in Tan Tuc town, Binh Chanh district, Ho Chi Minh City</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Công ty TNHH Cơ khí Đại Á</h4>
            <p class="en-title">Dai A Mechanical.,LTD</p>

            <ul>
                <li>Lợi thế quyền thuê đất thửa 462, 470 Đức Huệ, Long An + 41, 42…351. 352… Thạnh Hóa, Long An</li>
                <li class="en">Appraisal of advantages of land lease rights of plots 462, 470 Duc Hue, Long An + 41, 42…351. 352… Thanh Hoa, Long An</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Công ty TNHH BIMICO</h4>
            <p class="en-title">BIMICO.,LTD</p>

            <ul>
                <li>Quyền sử dụng đất và công trình xây dựng tại thửa đất số 428 – tờ bản đồ số 12, đường Phan Xích Long, phường 2, quận Phú Nhuận, thành phố Hồ Chí Minh</li>
                <li class="en">Land use rights and construction works at land plot No. 428 - map sheet No. 12, Phan Xich Long Street, Ward 02, Phu Nhuan District, Ho Chi Minh City</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Công ty Cổ phần Nông sản Gia Linh Long An</h4>
            <p class="en-title">Gia Linh Long An Agricultural Products Joint Stock Company</p>

            <ul>
                <li>Dây chuyền máy móc thiết bị hình thành trong tương lai của Công ty CP Nông sản Gia Linh Long An</li>
                <li class="en">Future machinery and equipment lines of Gia Linh Long An Agricultural Products Joint Stock Company</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Công ty Cổ phần Gulf Tây Ninh 2</h4>
            <p class="en-title">Gulf Tay Ninh 2 Joint Stock Company</p>

            <ul>
                <li>Hệ thống máy móc, thiết bị các loại tại Công ty Cổ phần Gulf Tây Ninh 2</li>
                <li class="en">System of machinery and equipment of all kinds at Gulf Tay Ninh 2 Joint Stock Company</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Công ty Cổ phần Đầu tư và Phát triển Năng lượng TTC</h4>
            <p class="en-title">TTC Energy Joint Stock</p>

            <ul>
                <li>Hệ thống máy móc thiết bị năng lượng tại ấp An Hội, xã An Hòa, huyện Trảng Bàng, tỉnh Tây Ninh</li>
                <li class="en">Energy machinery and equipment system in An Hoi hamlet, An Hoa commune, Trang Bang district, Tay Ninh Province</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Công ty CP Tập Đoàn Thép Nguyễn Minh</h4>
            <p class="en-title">Nguyen Minh Steel Group Joint Stock Company</p>

            <ul>
                <li>Máy móc thiết bị tại Bến Lức, Long An</li>
                <li class="en">Machinery and equipment in Ben Luc, Long An</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Công ty TNHH Asia Packaging Industries Việt Nam</h4>
            <p class="en-title">Asia Packaging Industry Co., LTD. (Vietnam)</p>

            <ul>
                <li>Máy móc thiết bị tại KCN Mỹ Phước 2, thị xã Bến Cát, tỉnh Bình Dương và KCN VSIP Bắc Ninh</li>
                <li class="en">Machinery and equipment at My Phuoc 2 Industrial Park, Ben Cat Town, Binh Duong Province and VSIP Bac Ninh Industrial Park</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Công ty Đầu tư Tài chính Nhà nước TP.HCM</h4>
            <p class="en-title">Ho Chi Minh City Finance and Investment State-Owned Company</p>

            <ul>
                <li>Máy móc, thiết bị, vật tư, hàng hóa, công cụ, dụng cụ (khoảng 5.800 mặt hàng)</li>
                <li class="en">Machinery, equipment, materials, goods, tools and instruments (about 5,800 items)</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Công ty TNHH DECCO Việt Nam</h4>
            <p class="en-title">DECCO Vietnam Company Limited</p>

            <ul>
                <li>Xác định giá trị doanh nghiệp của Công ty Decco Việt Nam</li>
                <li class="en">Determining the enterprise value of Decco Vietnam Company</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Tổng Công ty Thủy sản Việt Nam – CTCP</h4>
            <p class="en-title">Vietnam Seaproducts Joint Stock Corporation</p>

            <ul>
                <li>Xác định giá trị doanh nghiệp của Công ty Phú Mỹ</li>
                <li class="en">Determining the enterprise value of Phu My Company</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Công ty cổ phần Hoàn Cầu Solarla</h4>
            <p class="en-title">Hoan Cau Solar LA Corporation</p>

            <ul>
                <li>Xác định giá trị doanh nghiệp của Công ty Hoàn Cầu Solarla</li>
                <li class="en">Determining the enterprise value of Solarla Global Company</li>
            </ul>
        </div>

    </div>

</div>

</div>
</div>

<style>
.section-title{
    text-align:center;
    font-weight:700;
    margin-bottom:28px;
}
.section-title span{
    display:block;
    font-size:13px;
    color:#9ca3af;
}

/* CARD */
.card{
    border-radius:18px;
    overflow:hidden;
    background:#fff;
    transition:.5s;
}
.card:hover{
    transform:translateY(-10px) scale(1.02);
    box-shadow:0 30px 80px rgba(0,0,0,.2);
}

.banking-doc {
    max-width: 1200px;
    margin: 60px auto;
}

.banking-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px 40px;
}

.bank-item {
    border-left: 3px solid rgb(9, 83, 2);
    padding-left: 16px;
}

.bank-item h4 {
    font-weight: 700;
    font-size: 15px;
    color: #111827;
}

.en-title {
    font-size: 13px;
    color: #6b7280;
    font-style: italic;
    margin-bottom: 6px;
}

.bank-item ul {
    padding-left: 16px;
}

.bank-item li {
    font-size: 14px;
    line-height: 1.6;
}

.bank-item li.en {
    font-size: 13px;
    color: #9ca3af;
}

@media(max-width:768px){
    .banking-grid {
        grid-template-columns: 1fr;
    }
}

/* MOBILE */
@media (max-width: 768px) {
    .doc-grid {
        grid-template-columns: 1fr;
    }
}

/* IMAGE FIX (TO RÕ) */
.img{
    width:100%;
    height:320px; /* 👈 tăng mạnh */
    object-fit:cover;
}

/* TEXT */
.content{ padding:20px }
.vi{ font-weight:600; color:#111 }
.en{ color:#6b7280; margin-top:6px }

/* EFFECT */
.shine{
    position:absolute;
    left:-120%;
    width:100%; height:100%;
    background:linear-gradient(120deg,transparent,rgba(255,255,255,.4),transparent);
}
.card:hover .shine{ left:120%; transition:.8s }
.light{ position:absolute; inset:0 }
.back-floating {
    position: fixed;
    left: 20px;
    top: 120px; /* chỉnh tùy header */

    padding: 10px 16px;
    border-radius: 999px;

    font-size: 13px;
    font-weight: 500;
    text-decoration: none;

    color: #065f46; /* xanh đậm */

    background: rgba(16, 185, 129, 0.12); /* xanh lá nhạt trong suốt */
    backdrop-filter: blur(8px);

    border: 1px solid rgba(16, 185, 129, 0.25);

    transition: all 0.25s ease;
    z-index: 1000;
}

/* hover */
.back-floating:hover {
    background: rgba(16, 185, 129, 0.22);
    transform: translateX(-3px);
    color: #064e3b;
}
</style>

<script>
document.querySelectorAll('.card').forEach(card=>{
    card.addEventListener('mousemove',e=>{
        const r=card.getBoundingClientRect();
        const x=e.clientX-r.left;
        const y=e.clientY-r.top;
        card.querySelector('.light').style.background=
        `radial-gradient(circle at ${x}px ${y}px, rgba(255,255,255,.25), transparent 60%)`;
    });
});
</script>

@endsection