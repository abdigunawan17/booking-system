<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class TermController extends Controller
{
    //
    public function index()
    {
        $get_term_data = Page::where('id', 1)->first();
        return view('frontend.term_cond', compact(('get_term_data')));
    }
}
