<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $site = config('site');
    return view('home', array_merge(
        $site['home'],
        ['laws' => $site['laws'], 'links' => $site['links']]
    ));
})->name('home');

Route::view('/gioi-thieu', 'about', [
    'laws'     => config('site.laws'),
    'links'    => config('site.links'),
    'featured' => config('site.featured'),
])->name('about');

Route::view('/thu-ngo', 'letter', [
    'laws'         => config('site.laws'),
    'links'        => config('site.links'),
    'featured'     => config('site.featured'),
    'testimonials' => config('site.testimonials'),
])->name('letter');

Route::view('/ho-so-nang-luc', 'capacity', [
    'laws' => config('site.laws'),
    'links' => config('site.links'),
    'hr'   => config('site.capacity.hr'),
    'team' => config('site.capacity.team'),
])->name('capacity');

// routes/web.php
Route::get('/khach-hang', function () {
    // Lấy menu đúng từ config/site.php
    $nav = config('site.nav');

    // Danh sách file đúng theo server
    $base  = 'https://vinap.vn/image/data/khach-hang/';
    $files = [
        'kh1.jpg',
        'kh2.jpg',
        'kh3.jpg',
        'kh4.jpg',
        'kh5.jpg',
        'kh6.jpg',
        'kh07.jpg',
        'kh08.jpg',
        'kh09.jpg',
        'kh 10.jpg',
        'kh 11.jpg',
        'kh_12.jpg',
    ];
    $imgs = array_map(fn($f) => $base . $f, $files);

    return view('clients', compact('nav', 'imgs'));
})->name('clients');
