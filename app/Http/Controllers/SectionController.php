<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function show($slug)
    {
        $data = config('site.sectors')[$slug] ?? null;

        abort_if(!$data, 404);

        return view("sectors.$slug", compact('data'));
    }
}
