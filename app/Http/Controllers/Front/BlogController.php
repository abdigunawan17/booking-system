<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        //$get_post_data = Post::get();
        $get_post_data =Post::orderby('id', 'desc')->paginate(2);
        return view('frontend.blog', compact(('get_post_data')));
    }

    public function show_blog($slug)
    {
        $get_blog_detail = Post::where('slug', $slug)->first();
        $get_blog_detail->total_view = $get_blog_detail->total_view +1;
        $get_blog_detail->update();

        return view('frontend.blog_show', compact(('get_blog_detail')));
    }
}
