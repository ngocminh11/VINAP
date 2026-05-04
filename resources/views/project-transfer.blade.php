@extends('layouts.main')

@section('content')

<section class="relative overflow-hidden py-20 bg-gradient-to-b from-white via-neutral-50 to-white">

    {{-- BACKGROUND --}}
    <div class="absolute inset-0 pointer-events-none opacity-[0.04]">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[1000px] rounded-full border border-emerald-500"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-8 relative z-10">

        {{-- HEADER --}}
        <div class="text-center mb-14">

            <p class="uppercase tracking-[0.35em] text-brand text-sm font-semibold">
                VINAP CONSULTING SERVICES
            </p>

            <h1 class="mt-5 text-4xl md:text-6xl font-black text-slate-900 tracking-tight">
                Tư vấn chuyển nhượng dự án
            </h1>

            <div class="mt-3 text-xl italic text-neutral-400">
                Project for consulting on transfer
            </div>

            <div class="w-40 h-[2px] bg-gradient-to-r from-transparent via-brand to-transparent mx-auto mt-8"></div>

        </div>



        {{-- LANGUAGE SWITCH --}}
        <div class="flex items-center justify-center mb-12">

            <div class="inline-flex rounded-2xl border border-neutral-200 bg-white p-1 shadow-lg">

                <button id="btnVN"
                    onclick="switchLang('vn')"
                    class="lang-btn active px-6 py-3 rounded-xl font-semibold transition-all duration-300">
                    🇻🇳 Tiếng Việt
                </button>

                <button id="btnEN"
                    onclick="switchLang('en')"
                    class="lang-btn px-6 py-3 rounded-xl font-semibold transition-all duration-300">
                    🇺🇸 English
                </button>

            </div>

        </div>



        {{-- FLIP WRAPPER --}}
        <div class="perspective">

            <div id="flipCard"
                class="flip-card relative transition-transform duration-700">



                {{-- ================================================= --}}
                {{-- FRONT --}}
                {{-- ================================================= --}}
                <div class="flip-face bg-white border border-neutral-200 rounded-[34px]
                            shadow-[0_25px_80px_rgba(0,0,0,0.06)]
                            overflow-hidden">

                    {{-- TOP --}}
                    <div class="relative bg-gradient-to-r from-brand to-emerald-600 p-8 md:p-10 text-white overflow-hidden">

                        <div class="absolute right-0 top-0 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

                        <div class="relative z-10">

                            <div class="flex items-center gap-5">

                                <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">

                                    <svg viewBox="0 0 24 24"
                                        class="w-7 h-7"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5">

                                        <path d="M7 17L17 7M7 7h10v10"></path>

                                    </svg>

                                </div>

                                <div>

                                    <h2 class="text-3xl font-black">
                                        Nội dung tư vấn
                                    </h2>

                                    <p class="text-white/80 mt-1">
                                        Dịch vụ chuyển nhượng dự án & doanh nghiệp
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- CONTENT --}}
                    <div class="content-wrap">

                        <div class="grid md:grid-cols-2 gap-x-12 gap-y-7 text-[15px] leading-8 text-neutral-700">

                            <div class="flex gap-4">
                                <span class="text-brand font-bold">◆</span>
                                <p>
                                    Tư vấn các quy định pháp lý về việc chuyển nhượng dự án của doanh nghiệp.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-brand font-bold">◆</span>
                                <p>
                                    Tư vấn điều kiện chuyển nhượng dự án, phương thức,
                                    phương án chuyển nhượng phù hợp với nhu cầu thực tế của doanh nghiệp.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-brand font-bold">◆</span>
                                <p>
                                    Tư vấn, đánh giá tình trạng pháp lý, hồ sơ pháp lý của bên chuyển nhượng
                                    và bên nhận chuyển nhượng dự án.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-brand font-bold">◆</span>
                                <p>
                                    Tư vấn và đánh giá, dự liệu các vấn đề pháp lý phát sinh trong
                                    hoạt động chuyển nhượng dự án của doanh nghiệp.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-brand font-bold">◆</span>
                                <p>
                                    Tư vấn chuyển nhượng dự án độc lập với pháp nhân công ty hoặc
                                    chuyển nhượng dự án gắn liền với chuyển nhượng công ty,
                                    chuyển nhượng vốn, chuyển nhượng cổ phần.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-brand font-bold">◆</span>
                                <p>
                                    Tư vấn các vấn đề về thuế phát sinh trong giao dịch
                                    chuyển nhượng dự án.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-brand font-bold">◆</span>
                                <p>
                                    Tư vấn hình thức thanh toán, thu xếp vốn,
                                    kết nối hỗ trợ vốn từ các tổ chức tín dụng,
                                    ngân hàng trong giao dịch chuyển nhượng dự án.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-brand font-bold">◆</span>
                                <p>
                                    Tư vấn, hướng dẫn doanh nghiệp hoàn thiện hồ sơ theo quy định của pháp luật
                                    và tuân thủ chế độ báo cáo, công bố thông tin liên quan đến việc thực hiện
                                    chuyển nhượng dự án hoặc mua bán doanh nghiệp.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-brand font-bold">◆</span>
                                <p>
                                    Tư vấn, đàm phán về các giao dịch liên quan đến hoạt động chuyển nhượng dự án,
                                    chuyển nhượng doanh nghiệp, soạn thảo hồ sơ,
                                    hợp đồng chuyển nhượng dự án, chuyển nhượng,
                                    mua bán doanh nghiệp, chuyển nhượng vốn góp,
                                    chuyển nhượng cổ phần.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-brand font-bold">◆</span>
                                <p>
                                    Tư vấn pháp lý nội bộ doanh nghiệp,
                                    xây dựng các văn bản pháp lý về tổ chức bộ máy hoạt động của doanh nghiệp.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>





                {{-- ================================================= --}}
                {{-- BACK --}}
                {{-- ================================================= --}}
                <div class="flip-face flip-back absolute inset-0
                            bg-slate-950 text-white rounded-[34px]
                            overflow-hidden
                            shadow-[0_25px_80px_rgba(0,0,0,0.12)]">

                    {{-- TOP --}}
                    <div class="relative bg-gradient-to-r from-slate-900 to-slate-800 p-8 md:p-10 overflow-hidden">

                        <div class="absolute right-0 top-0 w-72 h-72 bg-emerald-500/10 rounded-full blur-3xl"></div>

                        <div class="relative z-10">

                            <div class="flex items-center gap-5">

                                <div class="w-14 h-14 rounded-2xl bg-white/10 backdrop-blur flex items-center justify-center">

                                    <svg viewBox="0 0 24 24"
                                        class="w-7 h-7"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5">

                                        <path d="M7 17L17 7M7 7h10v10"></path>

                                    </svg>

                                </div>

                                <div>

                                    <h2 class="text-3xl font-black">
                                        Consulting Services
                                    </h2>

                                    <p class="text-white/50 mt-1">
                                        Project transfer & enterprise consulting
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- CONTENT --}}
                    <div class="content-wrap">

                        <div class="grid md:grid-cols-2 gap-x-12 gap-y-7 text-[15px] leading-8 text-white/80">

                            <div class="flex gap-4">
                                <span class="text-emerald-300 font-bold">◆</span>
                                <p>
                                    The consultation pertains to legal regulations regarding
                                    the transmission of enterprises' projects.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-emerald-300 font-bold">◆</span>
                                <p>
                                    Advise on the conditions, methodologies,
                                    and plans of project transfer that are appropriate
                                    for the business's current requirements.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-emerald-300 font-bold">◆</span>
                                <p>
                                    Consulting and assessing the legal status and legal documents
                                    of the project transferor and transferee.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-emerald-300 font-bold">◆</span>
                                <p>
                                    The assessment, prediction, and consultation of legal issues
                                    that may arise during the transmission of projects by enterprises.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-emerald-300 font-bold">◆</span>
                                <p>
                                    Providing consulting services for project transfers
                                    that are not related to business litigation entities
                                    or project transfers associated with company transfers,
                                    capital transfers, and share transfers.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-emerald-300 font-bold">◆</span>
                                <p>
                                    Tax consultation regarding project transfer transactions.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-emerald-300 font-bold">◆</span>
                                <p>
                                    Consulting on the coordination of capital support
                                    from credit institutions and banks in project transfer transactions,
                                    as well as payment methods and capital arrangements.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-emerald-300 font-bold">◆</span>
                                <p>
                                    Assisting and advising businesses in the completion of documents
                                    in compliance with the law and the fulfillment of reporting
                                    and information disclosure requirements with respect to the transfer
                                    of a project or the purchase and sale of a business.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-emerald-300 font-bold">◆</span>
                                <p>
                                    Negotiating and consulting on transactions pertaining to project transfer activities,
                                    business transfer activities, drafting documents,
                                    project transfer contracts, transferring,
                                    purchasing and selling businesses,
                                    transferring capital contributions,
                                    and transferring shares.
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <span class="text-emerald-300 font-bold">◆</span>
                                <p>
                                    Internal legal consulting for enterprises,
                                    with the creation of legal documents that govern
                                    the organization of the enterprise's operational framework.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<style>

.perspective{
    perspective:2200px;
}

.flip-card{
    transform-style:preserve-3d;
    min-height:760px;
    max-width:1180px;
    margin:auto;
}

.flip-face{
    backface-visibility:hidden;
    -webkit-backface-visibility:hidden;
}

.flip-back{
    transform:rotateY(180deg);
}

.flip-card.flipped{
    transform:rotateY(180deg);
}

.content-wrap{
    padding:42px 48px;
}

.lang-btn{
    color:#6b7280;
}

.lang-btn.active{
    background:linear-gradient(135deg,#16a34a,#22c55e);
    color:white;
    box-shadow:0 10px 30px rgba(34,197,94,.25);
}

@media(max-width:768px){

    .flip-card{
        min-height:1450px;
    }

    .content-wrap{
        padding:28px;
    }
}

</style>



<script>

function switchLang(lang){

    const card = document.getElementById('flipCard');

    const btnVN = document.getElementById('btnVN');
    const btnEN = document.getElementById('btnEN');

    if(lang === 'en'){

        card.classList.add('flipped');

        btnEN.classList.add('active');
        btnVN.classList.remove('active');

    }else{

        card.classList.remove('flipped');

        btnVN.classList.add('active');
        btnEN.classList.remove('active');
    }
}

</script>

@endsection