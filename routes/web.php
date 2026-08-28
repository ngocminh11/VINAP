<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactRequestController;
/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES + ANTI SPAM
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

$adminPath = config('admin.path');


Route::prefix($adminPath)
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | LOGIN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/login',
            [AuthController::class, 'showLogin']
        )->name('login');

        Route::post(
            '/login',
            [AuthController::class, 'login']
        )
        ->middleware('throttle:10,1')
        ->name('login.submit');


        /*
        |--------------------------------------------------------------------------
        | AUTHENTICATED ADMIN
        |--------------------------------------------------------------------------
        */

        Route::middleware('admin.auth')->group(function () {

            /*
            | Dashboard
            */

            Route::get(
                '/',
                [DashboardController::class, 'index']
            )->name('dashboard');


            /*
            | Logout
            */

            Route::post(
                '/logout',
                [AuthController::class, 'logout']
            )->name('logout');


            /*
            |--------------------------------------------------------------------------
            | CONTACT REQUESTS
            |--------------------------------------------------------------------------
            */

            Route::prefix('requests')
                ->name('requests.')
                ->group(function () {

                    Route::get(
                        '/',
                        [ContactRequestController::class, 'index']
                    )->name('index');

                    Route::get(
                        '/{id}',
                        [ContactRequestController::class, 'show']
                    )->whereNumber('id')
                    ->name('show');


                    /*
                    | Phân công
                    */

                    Route::post(
                        '/{id}/assign',
                        [
                            ContactRequestController::class,
                            'assign'
                        ]
                    )->whereNumber('id')
                    ->name('assign');


                    /*
                    | Đổi trạng thái
                    */

                    Route::post(
                        '/{id}/status',
                        [
                            ContactRequestController::class,
                            'updateStatus'
                        ]
                    )->whereNumber('id')
                    ->name('status');


                    /*
                    | Ghi chú
                    */

                    Route::post(
                        '/{id}/notes',
                        [
                            ContactRequestController::class,
                            'addNote'
                        ]
                    )->whereNumber('id')
                    ->name('notes');
                });
        });
    });

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
// VALUATION
Route::view('/valuation', 'valuation', [
    'laws'  => config('site.laws'),
    'links' => config('site.links'),
])->name('valuation');

// AUCTION
Route::view('/auction', 'auction', [
    'laws'  => config('site.laws'),
    'links' => config('site.links'),
])->name('auction');

// PROJECT TRANSFER
Route::view('/project-transfer', 'project-transfer', [
    'laws'  => config('site.laws'),
    'links' => config('site.links'),
])->name('project.transfer');

// INVESTMENT CONSULTING
Route::view('/investment-consulting', 'investment-consulting', [
    'laws'  => config('site.laws'),
    'links' => config('site.links'),
])->name('investment.consulting');

// MARKET RESEARCH
Route::view('/market-research', 'market-research', [
    'laws'  => config('site.laws'),
    'links' => config('site.links'),
])->name('market.research');

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
    Route::post(
    '/contact-submit',
    [ContactController::class, 'submit']
)->name('contact.submit');
});