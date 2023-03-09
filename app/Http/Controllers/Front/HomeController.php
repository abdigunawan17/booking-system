<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $get_slide_all = Slider::get();
        return view('frontend.home', compact('get_slide_all'));
    }
}
