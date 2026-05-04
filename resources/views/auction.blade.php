@extends('layouts.main')

@section('content')

<section class="relative bg-gradient-to-b from-white to-neutral-50 py-20 overflow-hidden">

    {{-- BG EFFECT --}}
    <div class="absolute inset-0 pointer-events-none opacity-[0.04]">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[900px] rounded-full border border-emerald-500"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-8 relative z-10">

        {{-- HEADER --}}
        <div class="text-center mb-16">

            <p class="uppercase tracking-[0.3em] text-brand text-sm font-semibold">
                Real estate & asset auction
            </p>

            <h1 class="mt-4 text-4xl md:text-6xl font-black text-slate-900 tracking-tight">
                Đấu giá BĐS, tài sản
            </h1>

            <div class="mt-3 text-xl italic text-neutral-400">
                Real Estate & Asset Auction
            </div>

            <div class="w-32 h-[2px] bg-gradient-to-r from-transparent via-brand to-transparent mx-auto mt-8"></div>

        </div>


        {{-- TOP CARDS --}}
        <div class="grid lg:grid-cols-2 gap-8 mb-16">

            {{-- INFO --}}
            <div class="rounded-[32px] bg-white border border-neutral-200 p-8 shadow-[0_20px_60px_rgba(0,0,0,0.04)] hover:-translate-y-1 transition duration-300">

                <div class="flex items-center gap-4 mb-6">

                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center text-brand">
                        <svg viewBox="0 0 24 24"
                             class="w-7 h-7"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.5">
                            <path d="M4 20h16M6 20V8l6-4 6 4v12"></path>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-2xl font-black text-slate-900">
                            Thông tin bán đấu giá
                        </h2>

                        <p class="italic text-neutral-400 mt-1">
                            Auction information
                        </p>
                    </div>

                </div>

                <div class="space-y-5 text-[15px] leading-8 text-neutral-700">

                    <p>
                        VINAP cung cấp dịch vụ bán đấu giá bất động sản, tài sản doanh nghiệp,
                        tài sản thanh lý, tài sản bảo đảm và nhiều loại tài sản khác theo đúng
                        quy định pháp luật hiện hành.
                    </p>

                    <p>
                        Các tài sản đấu giá được công bố công khai, minh bạch, đầy đủ hồ sơ pháp lý,
                        hỗ trợ khách hàng tham gia đấu giá nhanh chóng và thuận tiện.
                    </p>

                    <ul class="space-y-2 list-disc pl-5 marker:text-brand">
                        <li>Đấu giá bất động sản</li>
                        <li>Đấu giá tài sản doanh nghiệp</li>
                        <li>Đấu giá tài sản thanh lý</li>
                        <li>Đấu giá tài sản bảo đảm ngân hàng</li>
                        <li>Đấu giá máy móc thiết bị, phương tiện vận tải</li>
                    </ul>

                </div>

            </div>


            {{-- FEE INFO --}}
            <div class="rounded-[32px] bg-slate-950 p-8 text-white relative overflow-hidden shadow-[0_20px_60px_rgba(0,0,0,0.08)]">

                <div class="absolute top-0 right-0 w-72 h-72 bg-emerald-500/10 rounded-full blur-3xl"></div>

                <div class="relative z-10">

                    <div class="flex items-center gap-4 mb-6">

                        <div class="w-14 h-14 rounded-2xl bg-white text-slate-900 flex items-center justify-center">
                            <svg viewBox="0 0 24 24"
                                 class="w-7 h-7"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="1.5">
                                <path d="M12 2v20M5 7h14M5 17h14"></path>
                            </svg>
                        </div>

                        <div>
                            <h2 class="text-2xl font-black">
                                Biểu phí bán đấu giá
                            </h2>

                            <p class="italic text-white/40 mt-1">
                                Auction fee schedule
                            </p>
                        </div>

                    </div>

                    <div class="space-y-5 text-[15px] leading-8 text-white/80">

                        <p>
                            Theo Quyết định số 42/2012/QĐ-UBND của UBND TP Hồ Chí Minh ngày 21/9/2012.
                        </p>

                        <p>
                            Mức thu phí đấu giá tài sản được áp dụng theo quy định hiện hành đối với từng loại tài sản và giá trị bán đấu giá.
                        </p>

                        <div class="border-t border-white/10 pt-5 text-sm text-white/60">
                            VINAP luôn đảm bảo công khai, minh bạch và đúng quy định pháp luật.
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- TABLE 1 --}}
        <div class="rounded-[32px] bg-white border border-neutral-200 overflow-hidden shadow-[0_20px_60px_rgba(0,0,0,0.04)] mb-14">

            <div class="px-8 py-7 border-b border-neutral-200 bg-neutral-50">

                <h2 class="text-2xl font-black text-slate-900">
                    Mức thu phí tham gia đấu giá tài sản
                </h2>

                <p class="mt-2 text-neutral-500">
                    Phí tham gia đấu giá theo giá khởi điểm tài sản
                </p>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-left border-collapse">

                    <thead class="bg-slate-900 text-white">

                        <tr>

                            <th class="px-6 py-4 font-semibold border border-slate-800 w-[80px]">
                                TT
                            </th>

                            <th class="px-6 py-4 font-semibold border border-slate-800">
                                Giá khởi điểm của tài sản
                            </th>

                            <th class="px-6 py-4 font-semibold border border-slate-800 w-[260px]">
                                Mức thu (đồng/hồ sơ)
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr class="hover:bg-neutral-50 transition">
                            <td class="px-6 py-4 border">1</td>
                            <td class="px-6 py-4 border">Từ 20 triệu đồng trở xuống</td>
                            <td class="px-6 py-4 border font-semibold text-brand">50.000</td>
                        </tr>

                        <tr class="hover:bg-neutral-50 transition">
                            <td class="px-6 py-4 border">2</td>
                            <td class="px-6 py-4 border">Từ trên 20 triệu đồng đến 50 triệu đồng</td>
                            <td class="px-6 py-4 border font-semibold text-brand">100.000</td>
                        </tr>

                        <tr class="hover:bg-neutral-50 transition">
                            <td class="px-6 py-4 border">3</td>
                            <td class="px-6 py-4 border">Từ trên 50 triệu đồng đến 100 triệu đồng</td>
                            <td class="px-6 py-4 border font-semibold text-brand">150.000</td>
                        </tr>

                        <tr class="hover:bg-neutral-50 transition">
                            <td class="px-6 py-4 border">4</td>
                            <td class="px-6 py-4 border">Từ trên 100 triệu đồng đến 500 triệu đồng</td>
                            <td class="px-6 py-4 border font-semibold text-brand">200.000</td>
                        </tr>

                        <tr class="hover:bg-neutral-50 transition">
                            <td class="px-6 py-4 border">5</td>
                            <td class="px-6 py-4 border">Trên 500 triệu đồng</td>
                            <td class="px-6 py-4 border font-semibold text-brand">500.000</td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>


        {{-- TABLE 2 --}}
        <div class="rounded-[32px] bg-white border border-neutral-200 overflow-hidden shadow-[0_20px_60px_rgba(0,0,0,0.04)]">

            <div class="px-8 py-7 border-b border-neutral-200 bg-neutral-50">

                <h2 class="text-2xl font-black text-slate-900">
                    Mức phí bán đấu giá tài sản thành công
                </h2>

                <p class="mt-2 text-neutral-500">
                    Áp dụng theo giá trị tài sản bán được
                </p>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-left border-collapse">

                    <thead class="bg-slate-900 text-white">

                        <tr>

                            <th class="px-6 py-4 font-semibold border border-slate-800 w-[80px]">
                                TT
                            </th>

                            <th class="px-6 py-4 font-semibold border border-slate-800">
                                Giá trị tài sản bán được
                            </th>

                            <th class="px-6 py-4 font-semibold border border-slate-800">
                                Mức thu
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr class="hover:bg-neutral-50 transition">
                            <td class="px-6 py-4 border">1</td>
                            <td class="px-6 py-4 border">Dưới 50 triệu đồng</td>
                            <td class="px-6 py-4 border font-semibold">5% giá trị tài sản bán được</td>
                        </tr>

                        <tr class="hover:bg-neutral-50 transition">
                            <td class="px-6 py-4 border">2</td>
                            <td class="px-6 py-4 border">Từ 50 triệu đến 1 tỷ đồng</td>
                            <td class="px-6 py-4 border font-semibold">
                                2,5 triệu + 1,5% giá trị tài sản bán được quá 50 triệu
                            </td>
                        </tr>

                        <tr class="hover:bg-neutral-50 transition">
                            <td class="px-6 py-4 border">3</td>
                            <td class="px-6 py-4 border">Từ trên 1 tỷ đến 10 tỷ đồng</td>
                            <td class="px-6 py-4 border font-semibold">
                                16,75 triệu + 0,2% giá trị tài sản bán được vượt 1 tỷ
                            </td>
                        </tr>

                        <tr class="hover:bg-neutral-50 transition">
                            <td class="px-6 py-4 border">4</td>
                            <td class="px-6 py-4 border">Từ trên 10 tỷ đến 20 tỷ đồng</td>
                            <td class="px-6 py-4 border font-semibold">
                                34,75 triệu + 0,15% giá trị tài sản bán được vượt 10 tỷ
                            </td>
                        </tr>

                        <tr class="hover:bg-neutral-50 transition">
                            <td class="px-6 py-4 border">5</td>
                            <td class="px-6 py-4 border">Từ trên 20 tỷ đồng</td>
                            <td class="px-6 py-4 border font-semibold">
                                49,75 triệu + 0,1% giá trị tài sản bán được vượt 20 tỷ.
                                Tổng số phí không quá 300 triệu/cuộc đấu giá
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection