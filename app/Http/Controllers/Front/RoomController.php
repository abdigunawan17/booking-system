<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    
    public function index()
    {
        $room_all = Room::paginate(3);
        //$room_all = Room::orderby('id', 'desc')->paginate(2);
        return view('frontend.room', compact(('room_all')));
    }
    

    public function single_room($id)
    {
        //ambil data dari table roomphoto
        $get_room_detail = Room::with('rRoomPhoto')->where('id', $id)->first();

        return view('frontend.room_detail', compact(('get_room_detail')));
    }
}
