@extends('layouts.main')

@section('body')

<div class="grid md:grid-cols-2 gap-6">

    @foreach($data['items'] as $item)
    <div class="bg-white rounded-xl border shadow-sm overflow-hidden hover:shadow-lg transition">

        <img src="{{ $item['img'] }}" class="w-full h-56 object-cover">

        <div class="p-4 text-sm leading-relaxed">
        {{ $item['desc'] }}
        </div>

    </div>
    @endforeach

</div>

@endsection