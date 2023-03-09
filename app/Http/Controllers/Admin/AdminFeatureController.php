<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;

class AdminFeatureController extends Controller
{
    //
    public function index()
    {
        $get_feature = Feature::get();
        return view('view.feature_view', compact('get_feature'));
    }
}
