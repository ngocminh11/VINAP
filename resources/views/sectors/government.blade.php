@extends('layouts.main')

@section('content')
<a href="/" class="back-floating">
    ← Back
</a>
<div class="max-w-7xl mx-auto px-6 py-12"> 
    {{-- TITLE --}}
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold uppercase tracking-wide text-gray-800">
        KHỐI CƠ QUAN NHÀ NƯỚC 
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

        <div class="banking-doc">
    <div class="banking-grid">

        <div class="bank-item">
            <h4>Sở Tài nguyên và Môi trường tỉnh Long An</h4>
            <p class="en-title">Department of Natural Resources and Environment of Long An</p>
            <ul>
                <li>Khu đất diện tích 28.470,9m² tại xã Long Hiệp, huyện Bến Lức để Công ty Cổ phần Sản xuất thép Vina One</li>
                <li class="en">Land area of ​​28,470.9m² in Long Hiep commune, Ben Luc district for Vina One Steel Production Joint Stock Company</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Chi cục Quản lý đất đai thuộc Sở Tài nguyên và Môi trường tỉnh Kiên Giang</h4>
            <p class="en-title">Land Management Branch under the Department of Natural Resources and Environment of Kien Giang Province</p>
            <ul>
                <li>Dự án Cửa Cạn, xã Cửa Dương, huyện Phú Quốc, tỉnh Kiên Giang</li>
                <li class="en">Cua Can project, Cua Duong commune, Phu Quoc district, Kien Giang Province</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Phòng Tài nguyên và Môi trường huyện Côn Đảo, tỉnh Bà Rịa - Vũng Tàu</h4>
            <p class="en-title">Con Dao District Department of Natural Resources and Environment</p>
            <ul>
                <li>Dự án mở rộng đường Trường Chinh, đường Hồng Lam, đường sau trường Nguyễn Du, Phú Mỹ, Bà Rịa</li>
                <li class="en">Project to expand Truong Chinh Street, Hong Lam Street, the road behind Nguyen Du school, Phu My, Ba Ria</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Phòng Tài nguyên và Môi trường thị xã Phú Mỹ, tỉnh Bà Rịa - Vũng Tàu</h4>
            <p class="en-title">Department of Natural Resources and Environment of Phu My town, Ba Ria - Vung Tau province</p>
            <ul>
                <li>Dự án suối Thị Vải, phường Mỹ Xuân, thị xã Phú Mỹ</li>
                <li class="en">Thi Vai stream project, My Xuan ward, Phu My town</li>

                <li>Dự án đường quy hoạch R khu 35ha Đô thị mới Phú Mỹ</li>
                <li class="en">Road planning project R, 35ha Phu My New Urban Area</li>

                <li>Dự án đường bên cạnh khu tái định cư 5,6ha và trường mầm non Mỹ Xuân</li>
                <li class="en">Road next to 5.6ha resettlement area and kindergarten</li>

                <li>Dự án đường quy hoạch N16 khu dân cư số 9</li>
                <li class="en">Planned road N16, residential area No.9</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Trung tâm Phát triển quỹ đất huyện Tịnh Biên tỉnh An Giang</h4>
            <p class="en-title">Land Fund Development Center of Tinh Bien district</p>
            <ul>
                <li>Dự án 2 Nhà máy điện năng lượng mặt trời Sao Mai 2</li>
                <li class="en">Sao Mai 2 solar power plant project</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Cục Điều tra chống buôn lậu</h4>
            <p class="en-title">Anti-smuggling Investigation Department</p>
            <ul>
                <li>Lô hàng hóa chứa trong 35 container tại ICD Long Bình</li>
                <li class="en">35 containers of goods at ICD Long Binh</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Hội đồng định giá tài sản thường xuyên trong tố tụng hình sự</h4>
            <p class="en-title">Asset valuation council in criminal proceedings</p>
            <ul>
                <li>Lô hàng thực phẩm, mỹ phẩm của Công ty XNK ANB</li>
                <li class="en">Shipment of supplements and cosmetics from ANB</li>

                <li>42,58m3 gỗ cao su trong container MEDU7192546</li>
                <li class="en">42.58m3 rubber wood in container MEDU7192546</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Cơ quan cảnh sát điều tra – Công an TP.HCM</h4>
            <p class="en-title">Investigation police agency - Ho Chi Minh City</p>
            <ul>
                <li>Hóa chất, đồng phế liệu</li>
                <li class="en">Chemicals, copper scrap</li>

                <li>Laptop Dell, mỹ phẩm, gỗ giáng hương</li>
                <li class="en">Dell laptops, cosmetics, sandalwood</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Cục Hải quan TP.HCM</h4>
            <p class="en-title">Ho Chi Minh City Customs Department</p>
            <ul>
                <li>3 container hàng hóa tại Tân Cảng Hiệp Phước</li>
                <li class="en">3 containers at Tan Cang Hiep Phuoc</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Hội đồng xử lý hàng tồn đọng 2019 – Cảng Sài Gòn</h4>
            <p class="en-title">Backlogged Goods Handling Council 2019</p>
            <ul>
                <li>Hàng bách hóa và kính xây dựng tại Cát Lái</li>
                <li class="en">Goods and construction glass at Cat Lai Port</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Bệnh viện đa khoa tỉnh Kiên Giang</h4>
            <p class="en-title">Kien Giang Provincial General Hospital</p>
            <ul>
                <li>Máy móc thiết bị y tế phục vụ bệnh viện</li>
                <li class="en">Medical equipment for hospital use</li>
            </ul>
        </div>

        <div class="bank-item">
            <h4>Các cơ quan ban ngành tỉnh Trà Vinh</h4>
            <p class="en-title">Departments in Tra Vinh Province</p>
            <ul>
                <li>Thanh lý xe ô tô con</li>
                <li class="en">Liquidation of cars</li>

                <li>Thanh lý công trình, vật liệu xây dựng</li>
                <li class="en">Liquidation of construction materials</li>
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