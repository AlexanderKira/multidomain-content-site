<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index ()
    {
        $website = request()->tenant;

        return view('pages.home', compact('website'));
    }
}
