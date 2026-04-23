<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show($slug)
    {
        $newsList = config('site.home.news') ?? [];
    
        $news = collect($newsList)
            ->first(function ($item) use ($slug) {
                return isset($item['slug']) && $item['slug'] === $slug;
            });
    
        if (!$news) {
            abort(404);
        }
    
        return view('news.detail', [
            'news' => $news
        ]);
    }
}
