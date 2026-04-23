@extends('layouts.main')

@section('body')

<ul class="list-disc pl-6 space-y-2">
    @foreach($data['items'] as $item)
        <li>{{ $item }}</li>
    @endforeach
</ul>

@endsection