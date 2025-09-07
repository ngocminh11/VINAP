<footer class="mt-16">
    <section class="section">
        <div class="rounded-2xl p-6 md:p-8 bg-gradient-to-br from-brand to-emerald-600 text-white shadow-glow">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
                <div class="flex-1">
                    <h3 class="text-xl md:text-2xl font-bold">Cần báo giá thẩm định trong 24h?</h3>
                    <p class="text-white/90 mt-1">Gửi mô tả tài sản và mục đích, phản hồi trong ngày làm việc.</p>
                </div>
                <div class="flex gap-3">
                    <a href="#contact" class="btn bg-white text-brand hover:bg-white/90">Liên hệ ngay</a>
                    <a href="#" class="btn bg-white/10 border border-white/30 text-white hover:bg-white/15">Tải form</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white border-t mt-8">
        <div class="section py-10 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div>
                <h4 class="kicker">Về VINAP</h4>
                <p class="mt-3 text-sm text-neutral-600">
                    Số 9, đường 7, KDC Vina Nam Phú, Phước Kiển, Nhà Bè, TP.HCM<br>
                    Điện thoại: (+84.028) 39330831 • Hotline: (84) 917168816<br>
                    Website: vinap.vn • Email: hanh.tran@vinap.vn
                </p>
            </div>
            <div>
                <h4 class="kicker">Văn bản pháp luật</h4>
                <ul class="mt-3 space-y-2 text-sm">
                    @foreach(($laws ?? []) as $law)
                    <li class="flex gap-2"><span class="mt-1 h-1.5 w-1.5 rounded-full bg-accent"></span>{{ $law }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h4 class="kicker">Liên kết</h4>
                <ul class="mt-3 space-y-2 text-sm">
                    @foreach(($links ?? []) as $l)
                    <li><a class="hover:text-brand" href="{{ $l['href'] }}">{{ $l['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h4 class="kicker">Nhận bản tin</h4>
                <form class="mt-3 flex gap-2" onsubmit="return false;">
                    <input type="email" class="border border-neutral-200 rounded-xl px-3 py-2 w-full" placeholder="Email của bạn">
                    <button class="btn-primary">Đăng ký</button>
                </form>
            </div>
        </div>
        <div class="section py-4 text-xs text-neutral-500 flex items-center justify-between border-t">
            <span>© {{ date('Y') }} VINAP • All rights reserved</span>
            <span>Thiết kế bởi NTVC</span>
        </div>

        <button id="backToTop" title="Về đầu trang"
            class="fixed right-4 bottom-5 opacity-0 pointer-events-none transition bg-brand text-white p-3 rounded-full shadow-soft">
            <svg viewBox="0 0 24 24" class="h-5 w-5">
                <path fill="none" stroke="currentColor" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </button>
    </section>
</footer>