@extends('layouts.main')

@section('content')
<div class="bg-gray-50 py-10">

    <div class="max-w-5xl mx-auto px-4 grid lg:grid-cols-12 gap-8">

        <!-- MAIN -->
        <div class="lg:col-span-8 space-y-6">

            <!-- TITLE -->
            <div class="bg-white border rounded-xl p-6 shadow-sm">
                <h1 class="text-3xl font-bold text-gray-900 leading-tight">
                    {{ $news['title'] }}
                </h1>

                <div class="flex items-center gap-4 text-sm text-gray-500 mt-3">
                    <span>🕒 {{ $news['date'] }}</span>
                    <span>👁 {{ $news['views'] ?? 0 }} lượt xem</span>
                </div>
            </div>

            <!-- BANNER -->
            <div class="overflow-hidden rounded-xl shadow-sm">
                <img src="https://picsum.photos/900/450"
                     class="w-full object-cover hover:scale-105 transition duration-500">
            </div>

            <!-- CONTENT -->
            <div class="bg-white border rounded-xl p-6 shadow-sm">
                <article class="prose max-w-none text-gray-800">
                    {!! $news['content'] !!}
                </article>
            </div>

            <!-- SHARE -->
            <div class="bg-white border rounded-xl p-5 shadow-sm flex items-center justify-between">
                <h3 class="text-sm font-semibold text-gray-700">
                    Chia sẻ bài viết
                </h3>

                <button onclick="openShareModal()"
                    class="flex items-center gap-2 px-4 py-2 text-sm bg-blue-600 text-white rounded-lg hover:opacity-90">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="currentColor">
                        <path stroke-width="2" d="M4 12v-2a4 4 0 014-4h8"/>
                        <path stroke-width="2" d="M16 6l4 4-4 4"/>
                    </svg>

                    Chia sẻ
                </button>
            </div>

            <!-- COMMENT -->
            <div class="bg-white border rounded-xl p-5 shadow-sm">
                <h3 class="font-bold text-lg mb-4">Bình luận</h3>

                <textarea class="w-full border rounded-lg p-3 text-sm focus:ring focus:ring-blue-200"
                          rows="3"
                          placeholder="Nhập bình luận..."></textarea>

                <button class="mt-3 px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:opacity-90">
                    Gửi bình luận
                </button>

                <div class="mt-6 space-y-4 border-t pt-4">
                    <div class="text-sm">
                        <strong>Nguyễn Văn A</strong>
                        <p class="text-gray-600">Bài viết rất hay 👍</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- SIDEBAR -->
        <div class="lg:col-span-4 space-y-6">

            <!-- RELATED -->
            <div class="bg-white border rounded-xl p-4 shadow-sm">
                <h3 class="font-bold text-sm uppercase text-gray-700 mb-3">
                    Tin liên quan
                </h3>

                <div class="space-y-3 text-sm">
                    @foreach(config('site.home.news') as $item)
                        <a href="/tin-tuc/{{ $item['slug'] }}"
                           class="block hover:text-blue-600">
                            {{ $item['title'] }}
                        </a>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</div>

<!-- SHARE MODAL -->
<div id="shareModal"
     class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-md rounded-xl p-6 relative">

        <!-- CLOSE -->
        <button onclick="closeShareModal()"
                class="absolute top-3 right-3 text-gray-400 hover:text-black">
            ✕
        </button>

        <h3 class="text-lg font-bold mb-4 text-center">
            Chia sẻ bài viết
        </h3>

        <!-- ICONS -->
        <div class="flex justify-center gap-4 mb-5">

            <a target="_blank"
               href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
               class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-600 text-white font-bold">
                f
            </a>

            <a target="_blank"
               href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}"
               class="w-10 h-10 flex items-center justify-center rounded-full bg-sky-400 text-white font-bold">
                t
            </a>

            <a target="_blank"
               href="https://zalo.me/share?url={{ urlencode(request()->fullUrl()) }}"
               class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-500 text-white font-bold">
                Z
            </a>

        </div>

        <!-- COPY LINK -->
        <div class="flex items-center border rounded-lg overflow-hidden">
            <input type="text"
                   id="shareLink"
                   value="{{ request()->fullUrl() }}"
                   class="flex-1 px-3 py-2 text-sm outline-none">

            <button onclick="copyLink()"
                    class="px-4 py-2 bg-blue-600 text-white text-sm">
                Copy
            </button>
        </div>

    </div>
</div>

<!-- JS -->
<script>
function openShareModal() {
    document.getElementById('shareModal').classList.remove('hidden');
    document.getElementById('shareModal').classList.add('flex');
}

function closeShareModal() {
    document.getElementById('shareModal').classList.add('hidden');
    document.getElementById('shareModal').classList.remove('flex');
}

function copyLink() {
    const input = document.getElementById('shareLink');
    input.select();
    document.execCommand('copy');
    alert('Đã copy link!');
}
</script>

@endsection