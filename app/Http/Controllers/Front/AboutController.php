<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index()
    {
        $get_about_data = Page::where('id', 1)->first();
        return view('frontend.about', compact(('get_about_data')));
    }
}
