@extends('layouts.main')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12"> {{-- 👈 tăng width container --}}

    {{-- TITLE --}}
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold uppercase tracking-wide text-gray-800">
            KHỐI CƠ QUAN NHÀ NƯỚC
        </h2>
        <p class="text-gray-500 mt-3 uppercase tracking-widest text-sm">
            GOVERNMENT SECTOR
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
    <div class="max-w-6xl mx-auto px-6 py-16 space-y-10">

<div class="doc-item">
    <div class="doc-title">
        Sở Tài nguyên và Môi trường tỉnh Long An
        <span>Department of Natural Resources and Environment of Long An</span>
    </div>
    <ul>
        <li>Khu đất diện tích 28.470,9m² tại xã Long Hiệp, huyện Bến Lức để Công ty Cổ phần Sản xuất thép Vina One</li>
        <li class="en">Land area of ​​28,470.9m² in Long Hiep commune, Ben Luc district for Vina One Steel Production Joint Stock Company</li>
    </ul>
</div>

<div class="doc-item">
    <div class="doc-title">
        Chi cục Quản lý đất đai thuộc Sở Tài nguyên và Môi trường tỉnh Kiên Giang
        <span>Land Management Branch under the Department of Natural Resources and Environment of Kien Giang Province</span>
    </div>
    <ul>
        <li>Dự án Cửa Cạn, xã Cửa Dương, huyện Phú Quốc, tỉnh Kiên Giang</li>
        <li class="en">Cua Can project, Cua Duong commune, Phu Quoc district, Kien Giang Province</li>
    </ul>
</div>

<div class="doc-item">
    <div class="doc-title">
        Phòng Tài nguyên và Môi trường huyện Côn Đảo, tỉnh Bà Rịa - Vũng Tàu
        <span>Con Dao District Department of Natural Resources and Environment</span>
    </div>
    <ul>
        <li>Dự án mở rộng đường Trường Chinh, đường Hồng Lam, đường sau trường Nguyễn Du, Phú Mỹ, Bà Rịa</li>
        <li class="en">Project to expand Truong Chinh Street, Hong Lam Street, the road behind Nguyen Du school, Phu My, Ba Ria</li>
    </ul>
</div>

<div class="doc-item">
    <div class="doc-title">
        Phòng Tài nguyên và Môi trường thị xã Phú Mỹ, tỉnh Bà Rịa - Vũng Tàu
        <span>Department of Natural Resources and Environment of Phu My town, Ba Ria - Vung Tau province</span>
    </div>
    <ul>
        <li>Dự án suối Thị Vải, phường Mỹ Xuân, thị xã Phú Mỹ, tỉnh Bà Rịa - Vũng Tàu nhằm chỉnh trang đô thị và thoát nước đô thị Phú Mỹ</li>
        <li class="en">Thi Vai stream project, My Xuan ward, Phu My town, Ba Ria - Vung Tau province aims to improve urban area and urban drainage in Phu My</li>
        <li>Dự án đường quy hoạch R khu 35ha Đô thị mới Phú Mỹ, phường Phú Mỹ</li>
        <li class="en">Road planning project R, 35ha area of ​​Phu My New Urban Area, Phu My Ward</li>
        <li>Dự án đường bên cạnh khu hạ tầng kỹ thuật tái định cư 5,6ha và trường mầm non Mỹ Xuân, phường Mỹ Xuân</li>
        <li class="en">Road project next to the 5.6ha resettlement technical infrastructure area and My Xuan kindergarten, My Xuan ward</li>
        <li>Dự án đường quy hoạch N16 khu dân cư số 9, đô thị mới Phú Mỹ, phường Phước Hòa</li>
        <li class="en">Project of planned road N16, residential area No. 9, Phu My new urban area, Phuoc Hoa ward</li>
    </ul>
</div>

<div class="doc-item">
    <div class="doc-title">
        Trung tâm Phát triển quỹ đất huyện Tịnh Biên tỉnh An Giang
        <span>Land Fund Development Center of Tinh Bien district, An Giang Province</span>
    </div>
    <ul>
        <li>Dự án 2 Nhà máy điện năng lượng mặt trời Sao Mai 2, tại xã An Hảo, huyện Tịnh Biên</li>
        <li class="en">Project 2 Sao Mai 2 solar power plant, in An Hao commune, Tinh Bien district</li>
    </ul>
</div>

<div class="doc-item">
    <div class="doc-title">
        Cục Điều tra chống buôn lậu
        <span>Anti-smuggling Investigation Department</span>
    </div>
    <ul>
        <li>Lô hàng hóa chứa trong 35 container tại ICD Long Bình, Biên Hòa, tỉnh Đồng Nai</li>
        <li class="en">Lot of goods contained in 35 containers at ICD Long Binh, Bien Hoa, Dong Nai Province</li>
    </ul>
</div>

<div class="doc-item">
    <div class="doc-title">
        Hội đồng định giá tài sản thường xuyên trong tố tụng hình sự cấp thành phố
        <span>The Board evaluates assets regularly in municipal criminal proceedings</span>
    </div>
    <ul>
        <li>Lô hàng nhập khẩu thực phẩm bổ sung, thức uống dinh dưỡng, mỹ phẩm các loại của Công ty XNK ANB</li>
        <li class="en">Imported shipment of food supplements, nutritional drinks, and cosmetics of all kinds from ANB Import-Export Company</li>
        <li>Thẩm định giá 42,58m3 gỗ cao su xẻ, đã bào, đã chà nhám gồm 39 kiện chứa trong container số hiệu MEDU7192546 (662-48)</li>
        <li class="en">Appraisal of 42.58m3 of sawn, planed, and sanded rubber wood including 39 bales contained in container number MEDU7192546 (662-48)</li>
    </ul>
</div>

<div class="doc-item">
    <div class="doc-title">
        Cơ quan cảnh sát điều tra – Công an thành phố Hồ Chí Minh
        <span>Investigation police agency - Ho Chi Minh City’s Public Security</span>
    </div>
    <ul>
        <li>Lô hàng hóa chất, tinh quặng, lô đồng phế liệu</li>
        <li class="en">Chemicals, concentrates, copper scrap lots</li>
        <li>Máy tính xách tay Dell, chuột và board mạch vi tính; Lô Mỹ phẩm các loại, gỗ giáng hương…</li>
        <li class="en">Dell laptops, mice and computer circuit boards; Lot of all kinds of cosmetics, sandal wood</li>
    </ul>
</div>

<div class="doc-item">
    <div class="doc-title">
        Cục Hải quan thành phố Hồ Chí Minh
        <span>Ho Chi Minh City Customs Department</span>
    </div>
    <ul>
        <li>3 cont hàng bách hóa tại Tân Cảng Hiệp Phước</li>
        <li class="en">3 containers of grocery goods at Tan Cang Hiep Phuoc</li>
    </ul>
</div>

<div class="doc-item">
    <div class="doc-title">
        Hội đồng xử lý hàng hóa tồn đọng năm 2019 tại Chi cục Hải quan cửa khẩu cảng Sài Gòn
        <span>2019 Backlogged Goods Handling Council at Saigon Port Border Gate</span>
    </div>
    <ul>
        <li>Lô hàng bách hóa các loại tại Cảng Cát Lái; Lô kính xây dựng tại Cảng Cát Lái</li>
        <li class="en">Grocery goods at Cat Lai Port; Construction glass lot at Cat Lai Port</li>
    </ul>
</div>

<div class="doc-item">
    <div class="doc-title">
        Bệnh viện đa khoa tỉnh Kiên Giang
        <span>Kien Giang Provincial General Hospital</span>
    </div>
    <ul>
        <li>Máy móc thiết bị y tế phục vụ bệnh viện hàng năm</li>
        <li class="en">Medical machinery and equipment serve hospitals every year</li>
    </ul>
</div>

<div class="doc-item">
    <div class="doc-title">
        Các cơ quan ban ngành tại tỉnh Trà Vinh như Ủy ban nhân dân, Hội đồng nhân dân, Sở Tài Chính, Sở Xây dựng, Sở Giáo dục và Đào tạo, ...
        <span>Agencies and departments in Tra Vinh province such as People's Committee, People's Council, Department of Finance, Department of Construction, Department of Education and Training, ...</span>
    </div>
    <ul>
        <li>Thanh lý xe ô tô con</li>
        <li class="en">Liquidation of cars.</li>
        <li>Thanh lý công trình, vật liệu xây dựng</li>
        <li class="en">Liquidation of construction works and materials</li>
    </ul>
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