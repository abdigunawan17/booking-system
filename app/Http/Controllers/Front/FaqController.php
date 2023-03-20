<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function index()
    {
        //$get_faq_data = Page::where('id', 1)->first();
        $get_faq_data = Faq::get();
        return view('frontend.faq', compact(('get_faq_data')));
    }
}
