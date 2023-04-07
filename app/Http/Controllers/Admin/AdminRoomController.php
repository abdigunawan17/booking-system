<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Room;
use App\Models\RoomPhoto;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    public function index()
    {
        $get_rooms = Room::get();
        return view('admin.room_view', compact('get_rooms'));
        //RoomPhoto;  
    }

    public function add()
    {
        $all_amenities = Amenity::get();
        return view('admin.room_add', compact('all_amenities'));
    }

    public function store(Request $request)
    {

        $amenities = '';
        $i=0;
        if(isset($request->arr_amenities))
        {
            foreach($request->arr_amenities as $item) {
                if($i==0) {
                    $amenities .= $item;
                }else{
                    $amenities .= ','.$item;
                }
                $i++;
            }
        }
    

        $request->validate([
            'feature_photo' => 'required|image|mimes:jpg,jpeg,png, gif',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required'
        ]);

        $ext = $request->file('feature_photo')->extension();
        $final_name = time() . '.' . $ext;
        $request->file('feature_photo')->move(public_path('uploads/'), $final_name);
        
        $obj = new Room();
        $obj->feature_photo = $final_name;
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->room_size = $request->room_size;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_quests = $request->total_quests;
        $obj->video_id = $request->video_id;
        $obj->save();

        return redirect()->back()->with('success', 'Room is added successfully.');
    }

    public function edit($id)
    {
        $all_amenities = Amenity::get();
        $get_room_data = Room::where('id', $id)->first();

        if($get_room_data->amenities != '')
        {
            $existing_amenities = explode(',', $get_room_data->amenities);   
        }

        return view('admin.room_edit', compact('get_room_data', 'all_amenities', 'existing_amenities'));
    }

    public function update(Request $request, $id)
    {
        $obj = Room::where('id', $id)->first();

        $amenities = '';
        $i=0;
        if(isset($request->arr_amenities))
        {
            foreach($request->arr_amenities as $item) {
                if($i==0) {
                    $amenities .= $item;
                }else{
                    $amenities .= ','.$item;
                }
                $i++;
            }
        }

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required'
        ]);

        if($request->hasFile('feature_photo'))
        {
            $request->validate([
                'feature_photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            ]);

            unlink(public_path('uploads/' . $obj->feature_photo));

            $ext = $request->file('feature_photo')->extension();
            $final_name = time(). '.' .$ext;
            $request->file('feature_photo')->move(public_path('uploads/'), $final_name);
            $obj->feature_photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->room_size = $request->room_size;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_quests = $request->total_quests;
        $obj->video_id = $request->video_id;
        $obj->update();

        return redirect()->back()->with('success', 'Room is updated successfully.');
    }

    public function delete($id)
    {
        $get_room_data = Room::where('id', $id)->first();
        unlink(public_path('uploads/'. $get_room_data->feature_photo));
        $get_room_data->delete();

        $get_gallery_photo = RoomPhoto::where('room_id', $id)->get();
        foreach($get_gallery_photo as $item)
        { 
            unlink(public_path('uploads/'. $item->photo));
            $item->delete();
        }
        
        return redirect()->back()->with('success', 'Room is  deleted successfully.');
    }

    public function gallery($id)
    {
        $single_room_data = Room::where('id', $id)->first();
        $room_photos = RoomPhoto::where('room_id', $id)->get();

        return view('admin.room_gallery', compact('single_room_data', 'room_photos'));
    }

    public function gallery_store(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png, gif',
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        
        $obj = new RoomPhoto();
        $obj->photo = $final_name;
        $obj->room_id = $id;
        $obj->save();

        return redirect()->back()->with('success', 'Photo is added successfully.');
    }

    public function gallery_delete($id)
    {
        $get_photo_gallery = RoomPhoto::where('id', $id)->first();
        unlink(public_path('uploads/'. $get_photo_gallery->photo));
        $get_photo_gallery->delete();
        
        return redirect()->back()->with('success', 'Room gallery is  deleted successfully.');
    }
}
