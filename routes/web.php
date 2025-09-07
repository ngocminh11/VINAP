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

Route::get('/khach-hang', function () {
    // Lấy menu + footer như các trang khác
    $nav   = config('site.nav');
    $laws  = config('site.laws');
    $links = config('site.links');

    // Lấy danh sách tất cả ảnh kh*.jpg trong public/images
    $files = collect(glob(public_path('images/kh**.jpg')))
        ->map(fn($p) => basename($p))   // chỉ giữ tên file
        ->sort()                          // sắp xếp tăng dần
        ->values()
        ->all();

    return view('clients', compact('nav', 'laws', 'links', 'files'));
})->name('clients');

// Liên hệ
Route::view('/lien-he', 'contact', [
    'laws'   => config('site.laws'),
    'links'  => config('site.links'),
    'embed'  => config('site.contact_map_embed'), // dùng URL embed ở config
])->name('contact');
