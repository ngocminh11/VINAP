@extends('layouts.main')

@section('content')
<div class="max-w-5xl mx-auto py-10">

    <h1 class="text-xl font-bold mb-6">CMS Sections</h1>

    <div class="space-y-3">
        @foreach($data as $key => $section)
            <a href="/admin/sections/{{ $key }}"
               class="block bg-white p-4 rounded border hover:bg-gray-50">
                {{ $section['title'] ?? $key }}
            </a>
        @endforeach
    </div>

</div>
@endsection