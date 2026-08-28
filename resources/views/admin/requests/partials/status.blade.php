@php

$labels = [
    'pending' => 'Chờ xử lý',
    'assigned' => 'Đã phân công',
    'contacted' => 'Đã liên hệ',
    'processing' => 'Đang xử lý',
    'completed' => 'Hoàn thành',
    'cancelled' => 'Đã hủy',
];

$classes = [
    'pending' => 'bg-orange-50 text-orange-700',
    'assigned' => 'bg-blue-50 text-blue-700',
    'contacted' => 'bg-purple-50 text-purple-700',
    'processing' => 'bg-yellow-50 text-yellow-700',
    'completed' => 'bg-green-50 text-green-700',
    'cancelled' => 'bg-red-50 text-red-700',
];

@endphp

<span class="inline-flex px-3 py-1 rounded-full text-xs font-medium
             {{ $classes[$status] ?? 'bg-neutral-100 text-neutral-600' }}">

    {{ $labels[$status] ?? $status }}

</span>