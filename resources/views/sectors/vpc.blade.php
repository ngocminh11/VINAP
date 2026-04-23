@extends('layouts.main')

@section('content')

{{-- ================= HERO ================= --}}
<section class="relative h-[640px] lg:h-[720px] overflow-hidden">

<img src="{{ asset('images/VPC/VPC_3.jpg') }}"
class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(6,12,20,0.85)_0%,rgba(6,12,20,0.65)_40%,rgba(6,12,20,0.2)_70%,transparent_100%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_40%,rgba(201,169,110,0.25),transparent_60%)]"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 h-full flex items-center">
        <div class="text-white max-w-[640px]">

            <p class="text-[13px] tracking-[0.28em] uppercase opacity-70 mb-5">
                VINAP & VPC Asia Pacific
            </p>

            <h1 class="text-[clamp(3rem,6vw,5.2rem)] leading-[1.05] font-medium tracking-[-0.02em]">
                Trusted Valuation
            </h1>

            <h2 class="mt-3 text-[clamp(1.4rem,2.4vw,2rem)] tracking-[0.18em] uppercase opacity-80">
                Global Reach
            </h2>

        </div>
    </div>
</section>


{{-- ================= STATS ================= --}}
<section class="relative -mt-16 z-20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="bg-white/90 backdrop-blur-xl rounded-[22px] shadow-[0_20px_60px_rgba(0,0,0,0.08)]">
            <div class="grid grid-cols-3 text-center py-8">

                <div>
                    <div class="text-[34px] font-semibold text-[#c9a96e]">25+</div>
                    <div class="mt-2 text-[15px] text-gray-800">Offices</div>
                    <div class="text-xs text-gray-500">Văn phòng</div>
                </div>

                <div class="border-x border-gray-200">
                    <div class="text-[34px] font-semibold text-[#c9a96e]">450+</div>
                    <div class="mt-2 text-[15px] text-gray-800">Professionals</div>
                    <div class="text-xs text-gray-500">Chuyên gia</div>
                </div>

                <div>
                    <div class="text-[34px] font-semibold text-[#c9a96e]">12</div>
                    <div class="mt-2 text-[15px] text-gray-800">Countries</div>
                    <div class="text-xs text-gray-500">Quốc gia</div>
                </div>

            </div>
        </div>
    </div>
</section>


{{-- ================= CONTENT ================= --}}
<section class="py-20 bg-[#f8f6f2] relative overflow-hidden">

    <div class="absolute inset-0 opacity-[0.15] bg-[radial-gradient(circle_at_70%_30%,rgba(201,169,110,0.3),transparent_60%)]"></div>

    <div class="relative max-w-6xl mx-auto px-6">

        {{-- ===== TITLE ===== --}}
        <div class="max-w-3xl mb-14">

            <h2 class="text-[34px] md:text-[42px] leading-[1.2] font-medium tracking-[-0.03em] text-gray-900">
                VINAP là một trong những thành viên của
                <br>
                <span class="text-[#c9a96e]">VPC Châu Á Thái Bình Dương</span>
            </h2>

            <p class="mt-4 text-[14px] tracking-[0.18em] uppercase text-gray-400">
                VINAP is a member of VPC Asia Pacific
            </p>

        </div>


        {{-- ===== TEXT BLOCK ===== --}}
        <div class="grid md:grid-cols-2 gap-16">

            {{-- VI --}}
            <div>
                <div class="w-10 h-[2px] bg-[#c9a96e] mb-6"></div>

                <h3 class="text-[28px] font-medium text-[#c9a96e] mb-6">
                    VINAP & VPC
                </h3>

                <div class="space-y-5 text-[16px] leading-[1.95] text-gray-700">

                    <p>
                        Năm 2004, <strong>VPC Asia Pacific Ltd. (VPC Asia Pacific)</strong> ra mắt 
                        <em>mạng lưới khu vực</em> gồm các chuyên gia tư vấn và cố vấn bất động sản quốc tế, 
                        với <strong>hơn 35 văn phòng</strong> và <strong>hơn 450 nhân sự</strong> tại 
                        <strong>12 quốc gia lớn</strong> ở khu vực Châu Á – Thái Bình Dương.
                    </p>

                    <p>
                        Cùng với các quốc gia trong khu vực, Việt Nam cũng là một thành viên trong 
                        <em>mạng lưới VPC Asia Pacific</em>, với 
                        <strong>Công ty Cổ phần Thẩm định giá và Tư vấn đầu tư Việt Nam (VINAP)</strong> 
                        là đơn vị đại diện.
                    </p>

                    <p>
                        Là thành viên chính thức, VINAP luôn tích cực 
                        <strong>kết nối</strong>, <strong>chia sẻ thông tin thị trường</strong> 
                        và <strong>kinh nghiệm chuyên môn</strong> trong toàn hệ thống, 
                        nhằm mang đến cho khách hàng những dịch vụ 
                        <em>thẩm định giá và tư vấn đầu tư chuẩn quốc tế</em>.
                    </p>

                    <p class="text-gray-800">
                        Sự hợp tác này giúp VINAP tiếp cận 
                        <strong>nguồn dữ liệu rộng lớn</strong>, 
                        <strong>công nghệ chuyên môn hiện đại</strong> 
                        và <strong>mạng lưới chuyên gia toàn cầu</strong>, 
                        từ đó cung cấp cho khách hàng giải pháp 
                        <em>chính xác, hiệu quả và phù hợp nhất</em>.
                    </p>

                </div>
            </div>

            {{-- EN --}}
            <div>
                <div class="w-10 h-[2px] bg-[#c9a96e] mb-6"></div>

                <h3 class="text-[26px] font-medium text-gray-900">
                    Trusted Connections
                </h3>

                <p class="text-gray-500 mb-5">A Global Network</p>

                <div class="space-y-5 text-[16px] leading-[1.95] text-gray-700">

                    <p>
                        In 2004, <strong>VPC Asia Pacific Ltd. (VPC Asia Pacific)</strong> launched its 
                        <em>regional network</em> of international property consultants and advisors, 
                        comprising <strong>more than 35 offices</strong> and 
                        <strong>over 450 professionals</strong> across 
                        <strong>12 major countries</strong> in the Asia–Pacific region.
                    </p>

                    <p>
                        Alongside other countries in the region, Vietnam is also a member of the 
                        <em>VPC Asia Pacific network</em>, represented by 
                        <strong>the Vietnam Appraisal And Investment Consulting Corporation (VINAP)</strong>.
                    </p>

                    <p>
                        As an official member, VINAP actively 
                        <strong>connects market information</strong> and 
                        <strong>shares professional expertise</strong> throughout the network 
                        to deliver <em>internationally standardized valuation and investment consultancy services</em>.
                    </p>

                    <p class="text-gray-800">
                        This collaboration allows VINAP to access 
                        <strong>extensive data resources</strong>, 
                        <strong>advanced professional methodologies</strong>, 
                        and a <strong>global network of experts</strong>, 
                        thereby providing clients with 
                        <em>precise, effective, and well-tailored solutions</em>.
                    </p>

                </div>
            </div>

        </div>

    </div>
</section>

@endsection