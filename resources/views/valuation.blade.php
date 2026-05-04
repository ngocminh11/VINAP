@extends('layouts.main')

@section('content')

<section class="relative bg-white overflow-hidden">

    {{-- BACKGROUND --}}
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[900px] rounded-full border border-emerald-500"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-8 py-20 relative z-10">

        {{-- HEADER --}}
        <div class="text-center mb-16">

            <p class="uppercase tracking-[0.3em] text-brand text-sm font-semibold">
                Professional appraisal services
            </p>

            <h1 class="mt-5 text-4xl md:text-6xl font-black text-slate-900 tracking-tight">
                Thẩm định giá
            </h1>

            <div class="mt-3 text-xl md:text-2xl italic text-neutral-400 font-light">
                Valuation
            </div>

            <div class="w-32 h-[2px] bg-gradient-to-r from-transparent via-brand to-transparent mx-auto mt-8"></div>

        </div>


        {{-- QUICK LINKS --}}
        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-5 mb-16">

            <a href="/government-real-estate-valuation"
               class="group rounded-3xl border border-neutral-200 bg-white p-7 hover:border-brand hover:-translate-y-1 transition duration-300 shadow-sm hover:shadow-xl">

                <div class="w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center text-brand mb-5 group-hover:scale-110 transition">
                    <svg viewBox="0 0 24 24" class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M3 21h18M5 21V7l7-4 7 4v14"></path>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-slate-900 leading-tight">
                    Thẩm định giá bất động sản thuộc sở hữu Nhà nước
                </h3>

                <p class="mt-3 text-sm italic text-neutral-400 leading-6">
                    State-owned real estate valuation
                </p>

                <div class="mt-5 text-brand text-sm font-semibold flex items-center gap-2">
                    Xem chi tiết
                    <span class="group-hover:translate-x-1 transition">→</span>
                </div>

            </a>


            <a href="/real-estate-valuation"
               class="group rounded-3xl border border-neutral-200 bg-white p-7 hover:border-brand hover:-translate-y-1 transition duration-300 shadow-sm hover:shadow-xl">

                <div class="w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center text-brand mb-5 group-hover:scale-110 transition">
                    <svg viewBox="0 0 24 24" class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M4 20h16M6 20V8l6-4 6 4v12"></path>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-slate-900 leading-tight">
                    Thẩm định giá bất động sản
                </h3>

                <p class="mt-3 text-sm italic text-neutral-400 leading-6">
                    Real estate valuation
                </p>

                <div class="mt-5 text-brand text-sm font-semibold flex items-center gap-2">
                    Xem chi tiết
                    <span class="group-hover:translate-x-1 transition">→</span>
                </div>

            </a>


            <a href="/movable-assets-valuation"
               class="group rounded-3xl border border-neutral-200 bg-white p-7 hover:border-brand hover:-translate-y-1 transition duration-300 shadow-sm hover:shadow-xl">

                <div class="w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center text-brand mb-5 group-hover:scale-110 transition">
                    <svg viewBox="0 0 24 24" class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M5 7h14M7 7v10m10-10v10M4 17h16"></path>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-slate-900 leading-tight">
                    Thẩm định giá động sản
                </h3>

                <p class="mt-3 text-sm italic text-neutral-400 leading-6">
                    Movable assets appraisal
                </p>

                <div class="mt-5 text-brand text-sm font-semibold flex items-center gap-2">
                    Xem chi tiết
                    <span class="group-hover:translate-x-1 transition">→</span>
                </div>

            </a>


            <a href="/private-price-list-2020"
               class="group rounded-3xl border border-neutral-200 bg-white p-7 hover:border-brand hover:-translate-y-1 transition duration-300 shadow-sm hover:shadow-xl">

                <div class="w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center text-brand mb-5 group-hover:scale-110 transition">
                    <svg viewBox="0 0 24 24" class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M12 2v20M5 7h14M5 17h14"></path>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-slate-900 leading-tight">
                    Biểu giá Tư Nhân năm 2020
                </h3>

                <p class="mt-3 text-sm italic text-neutral-400 leading-6">
                    Private price list 2020
                </p>

                <div class="mt-5 text-brand text-sm font-semibold flex items-center gap-2">
                    Xem chi tiết
                    <span class="group-hover:translate-x-1 transition">→</span>
                </div>

            </a>

        </div>


        {{-- CONTENT --}}
        <div class="grid xl:grid-cols-2 gap-10">

            {{-- VIETNAMESE --}}
            <div class="rounded-[32px] border border-neutral-200 bg-white p-8 md:p-10 shadow-[0_20px_60px_rgba(0,0,0,0.04)]">

                <div class="flex items-center gap-4 mb-8">
                    <div class="w-14 h-14 rounded-2xl bg-brand text-white flex items-center justify-center font-bold text-xl shadow-lg">
                        VN
                    </div>

                    <div>
                        <h2 class="text-2xl font-black text-slate-900">
                            Thẩm định giá
                        </h2>

                        <p class="text-neutral-400 italic mt-1">
                            Valuation
                        </p>
                    </div>
                </div>


                <div class="space-y-6 text-[15px] leading-8 text-neutral-700">

                    <p>
                        <strong class="text-slate-900">VINAP</strong> cung cấp nhiều dịch vụ thẩm định giá đặc biệt cho các loại tài sản khác nhau với các mục đích thẩm định giá khác nhau như thực hiện nghĩa vụ tài chính, thanh lý tài sản Nhà nước, cho thuê, mua bán, xử lý vụ án, tài sản đảm bảo, xử lý nợ.... VINAP luôn thể hiện tính chuyên nghiệp cao trong việc cung cấp cho Khách hàng nhiều dịch vụ.
                    </p>

                    <div>
                        <h3 class="font-bold text-brand mb-2">
                            + Thẩm định giá bất động sản, Định giá đất
                        </h3>

                        <p>
                            Đây được xem là thế mạnh của VINAP với việc thẩm định giá trị quyền sử dụng đất, giá trị công trình xây dựng, nhà xưởng, khách sạn, cao ốc văn phòng, chung cư, trang trại… phục vụ cho nhiều mục đích khác nhau của Khách hàng.
                        </p>
                    </div>

                    <div>
                        <h3 class="font-bold text-brand mb-2">
                            + Thẩm định giá động sản
                        </h3>

                        <p>
                            VINAP có thể đáp ứng tốt nhất nhu cầu của khách hàng trong việc xác định giá trị dây chuyền máy móc thiết bị công nghiệp, thiết bị y tế, trường học, thiết bị truyền hình, thiết bị chuyên dùng, phương tiện vận tải (đường sông, đường biển, đường bộ), hệ thống khai thác dầu khí, vật tư, thiết bị ngành điện, cung cấp nước… phục vụ cho nhiều mục đích khác nhau như lập dự toán, mua sắm, bán đấu giá, thanh lý,...
                        </p>
                    </div>

                    <div>
                        <h3 class="font-bold text-brand mb-2">
                            + Thẩm định giá trị doanh nghiệp, giá trị thương hiệu, lợi thế kinh doanh
                        </h3>

                        <p>
                            Ngoài các dịch vụ trên, VINAP còn cung cấp dịch vụ xác định giá trị doanh nghiệp, giá trị thương hiệu, lợi thế kinh doanh cho nhiều doanh nghiệp hoạt động trong các lĩnh vực khác nhau ở khắp các địa phương trong cả nước phục vụ cho nhiều mục đích khác nhau của khách hàng.
                        </p>
                    </div>

                    <ul class="space-y-2 pl-4 list-disc marker:text-brand">
                        <li>Thẩm Định giá để mua, thuê, chuyển nhượng tài sản thật</li>
                        <li>Đánh giá lại giá trị tài sản của danh mục cho vay ngân hàng</li>
                        <li>Thẩm Định giá thế chấp</li>
                        <li>Thẩm Định giá lại báo cáo tài chính doanh nghiệp</li>
                        <li>Thẩm định giá để xử lý vụ án trong tố tụng hình sự</li>
                        <li>Xây dựng cơ sở dữ liệu đất đai theo quy định của pháp luật</li>
                        <li>Xác định giá đất, định giá đất cụ thể theo quy định của pháp luật; điều tra khảo sát, thống kê các loại đất và xây dựng cơ sở dữ liệu về giá đất</li>
                    </ul>

                </div>

            </div>


            {{-- ENGLISH --}}
            <div class="rounded-[32px] bg-slate-950 p-8 md:p-10 text-white shadow-[0_20px_60px_rgba(0,0,0,0.08)] relative overflow-hidden">

                <div class="absolute top-0 right-0 w-72 h-72 bg-emerald-500/10 rounded-full blur-3xl"></div>

                <div class="relative z-10">

                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-14 h-14 rounded-2xl bg-white text-slate-900 flex items-center justify-center font-bold text-xl shadow-lg">
                            EN
                        </div>

                        <div>
                            <h2 class="text-2xl font-black text-white">
                                Valuation
                            </h2>

                            <p class="text-white/40 italic mt-1">
                                Professional appraisal services
                            </p>
                        </div>
                    </div>


                    <div class="space-y-6 text-[15px] leading-8 text-white/80">

                        <p>
                            <strong class="text-white">VINAP</strong> offers a variety of specialized appraisal services for the valuation of various categories of assets, including those used for financial obligation performance valuation, liquidation of State assets, leasing, buying and selling, collateral, debt settlement, and case management.
                        </p>

                        <div>
                            <h3 class="font-bold text-emerald-300 mb-2">
                                + Real estate valuation, land appraisal
                            </h3>

                            <p>
                                This is considered VINAP's strength, with expertise in appraising the value of land use rights, construction works, factories, hotels, office buildings, apartments, farms, and more, serving various purposes for clients.
                            </p>
                        </div>

                        <div>
                            <h3 class="font-bold text-emerald-300 mb-2">
                                + Movables Appraisal
                            </h3>

                            <p>
                                VINAP can best meet the needs of customers in determining the value of industrial machinery and equipment, medical equipment, school equipment, television equipment, specialized equipment, transportation vehicles, oil and gas exploitation systems, supplies, and equipment for water and electricity supply.
                            </p>
                        </div>

                        <div>
                            <h3 class="font-bold text-emerald-300 mb-2">
                                + Business Valuation, Brand Valuation, and Business Advantage Assessment
                            </h3>

                            <p>
                                VINAP also provides services for determining business value, brand value, and business advantages for companies operating across many sectors nationwide.
                            </p>
                        </div>

                        <ul class="space-y-2 pl-4 list-disc marker:text-emerald-300">
                            <li>Appraisal for acquisition, rental, and transfer of real estate</li>
                            <li>Reevaluation of bank loan portfolio assets</li>
                            <li>Mortgage valuation</li>
                            <li>Reassessment of corporate financial statements</li>
                            <li>Valuation for criminal proceedings</li>
                            <li>Construction of land database systems</li>
                            <li>Land valuation and investigation in accordance with legal regulations</li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
