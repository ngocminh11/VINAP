<footer class="mt-20">

    {{-- CTA --}}
    <section class="section">
        <div class="relative rounded-3xl overflow-hidden bg-gradient-to-br from-brand to-emerald-600 text-white p-8 md:p-10">

            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="flex-1">
                    <h3 class="text-2xl font-semibold">
                        Cần báo giá thẩm định 
                    </h3>
                    <p class="text-white/90 text-sm mt-2">
                        Gửi thông tin, VINAP sẽ liên hệ sớm nhất.
                    </p>
                </div>

                <button onclick="openContactModal()"
                    class="px-6 py-3 bg-white text-brand rounded-xl font-semibold">
                    Liên hệ ngay
                </button>
            </div>

        </div>
    </section>

    {{-- FOOTER --}}
    <section class="mt-12 border-t bg-white">
        <div class="section py-10 grid md:grid-cols-3 gap-8">

            <div>
                <h4 class="font-semibold text-sm uppercase">VINAP</h4>
                <p class="mt-3 text-sm text-neutral-600 leading-relaxed">
                    Số 9, Nhà Bè, TP.HCM<br>
                    Hotline: 0917 168 816<br>
                    Email: hanh.tran@vinap.vn
                </p>
            </div>

            <div>
                <h4 class="font-semibold text-sm uppercase">Liên kết</h4>
                <ul class="mt-3 text-sm space-y-2">
                    @foreach(($links ?? []) as $l)
                        <li><a href="{{ $l['href'] }}" class="hover:text-brand">{{ $l['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="font-semibold text-sm uppercase">Pháp lý</h4>
                <ul class="mt-3 text-sm space-y-2">
                    @foreach(($laws ?? []) as $law)
                        <li>{{ $law }}</li>
                    @endforeach
                </ul>
            </div>

        </div>

        <div class="border-t py-4 text-xs text-neutral-500 text-center">
            © {{ date('Y') }} VINAP
        </div>
    </section>

    {{-- MODAL --}}
    <div id="contactModal"
         class="fixed inset-0 bg-black/60 hidden items-center justify-center z-[9999]">

        <div id="modalBox"
             class="bg-white w-full max-w-md rounded-2xl p-6 relative
                    opacity-0 scale-95 transition-all duration-300">

            <button onclick="closeContactModal()"
                class="absolute top-3 right-3 text-gray-400 text-xl">✕</button>

            <h3 class="text-lg font-semibold mb-4">Liên hệ</h3>

            <form id="contactForm" class="space-y-3">

                <input name="name" required class="w-full border p-2 rounded" placeholder="Họ tên">
                <input name="phone" required class="w-full border p-2 rounded" placeholder="SĐT">
                <input name="email" class="w-full border p-2 rounded" placeholder="Email">
                <input name="address" class="w-full border p-2 rounded" placeholder="Địa chỉ">

                <button class="w-full bg-brand text-white py-2 rounded">
                    Gửi
                </button>
            </form>

            <div id="successBox" class="hidden text-center mt-4">
                <p class="text-green-600 font-medium mb-3">
                    Xin cảm ơn quý khách! VINAP sẽ liên hệ sớm nhất.
                </p>

                <button onclick="closeContactModal()"
                    class="px-4 py-2 bg-brand text-white rounded">
                    Đóng
                </button>
            </div>

        </div>
    </div>

</footer>

<script>
// ===== MODAL =====
const modal = document.getElementById('contactModal');
const box = document.getElementById('modalBox');

function openContactModal(){
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    setTimeout(()=> box.classList.remove('opacity-0','scale-95'),10);
}

function closeContactModal(){
    box.classList.add('opacity-0','scale-95');
    setTimeout(()=>{
        modal.classList.add('hidden');

        document.getElementById('contactForm').reset();
        document.getElementById('contactForm').classList.remove('hidden');
        document.getElementById('successBox').classList.add('hidden');

    },200);
}

// click ngoài
modal.addEventListener('click', e=>{
    if(e.target === modal) closeContactModal();
});

// ESC
document.addEventListener('keydown', e=>{
    if(e.key === "Escape") closeContactModal();
});

// ===== SUBMIT =====
document.getElementById('contactForm').onsubmit = async function(e){
    e.preventDefault();

    const data = new FormData(this);

    const res = await fetch('/contact-submit',{
        method:'POST',
        headers:{ 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body:data
    });

    if(res.ok){
        this.classList.add('hidden');
        document.getElementById('successBox').classList.remove('hidden');
    }else{
        alert('Lỗi gửi dữ liệu');
    }
};
</script>