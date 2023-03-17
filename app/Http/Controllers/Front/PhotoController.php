<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $photo_all = Photo::paginate(2); 
        return view('frontend.photo_gallery', compact('photo_all'));
    }
}
