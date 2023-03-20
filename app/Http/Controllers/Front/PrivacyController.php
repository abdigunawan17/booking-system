<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index()
    {
        $get_privacy_data = Page::where('id', 1)->first();
        return view('frontend.privacy', compact(('get_privacy_data')));
    }
}
