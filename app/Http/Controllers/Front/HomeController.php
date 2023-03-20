<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $get_slide_all = Slider::get();
        $get_feature_all = Feature::get();
        $get_testimonial_all = Testimonial::get();
        $get_post_all =Post::orderby('id', 'desc')->limit(3)->get();
        
        return view('frontend.home', compact('get_slide_all', 'get_feature_all', 'get_testimonial_all', 'get_post_all'));
    }

    
}
