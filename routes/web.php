<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SectionController;
/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES + ANTI SPAM
|--------------------------------------------------------------------------
*/

Route::middleware(['anti.spam'])->group(function () {

    // HOME
    Route::get('/', function () {
        $site = config('site');

        return view('home', array_merge(
            $site['home'],
            [
                'laws'  => $site['laws'],
                'links' => $site['links']
            ]
        ));
    })->name('home');


    // ABOUT
    Route::view('/gioi-thieu', 'about', [
        'laws'     => config('site.laws'),
        'links'    => config('site.links'),
        'featured' => config('site.featured'),
    ])->name('about');


    // LETTER
    Route::view('/thu-ngo', 'letter', [
        'laws'         => config('site.laws'),
        'links'        => config('site.links'),
        'featured'     => config('site.featured'),
        'testimonials' => config('site.testimonials'),
    ])->name('letter');


    // CAPACITY
    Route::view('/ho-so-nang-luc', 'capacity', [
        'laws'  => config('site.laws'),
        'links' => config('site.links'),
        'hr'    => config('site.capacity.hr'),
        'team'  => config('site.capacity.team'),
    ])->name('capacity');


    // CLIENTS (có logic)
    Route::get('/khach-hang', function () {

        $nav   = config('site.nav');
        $laws  = config('site.laws');
        $links = config('site.links');

        $files = collect(glob(public_path('images/kh**.jpg')))
            ->map(fn($p) => basename($p))
            ->sort()
            ->values()
            ->all();

        return view('clients', compact('nav', 'laws', 'links', 'files'));

    })->name('clients');

    Route::get('/tin-tuc/{slug}', [NewsController::class, 'show']);
    // CONTACT
    Route::view('/lien-he', 'contact', [
        'laws'  => config('site.laws'),
        'links' => config('site.links'),
        'embed' => config('site.contact_map_embed'),
    ])->name('contact');
    Route::get('/linh-vuc/{slug}', [SectionController::class, 'show']);
    

});