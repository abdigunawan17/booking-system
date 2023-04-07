<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AdminAmenityController extends Controller
{
    public function index()
    {
        $get_amenity = Amenity::get();
        return view('admin.amenity_view', compact('get_amenity'));
    }

    public function add()
    {
        return view('admin.amenity_add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $obj = new Amenity();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', 'Amenity is added successfully.');
    }

    public function edit($id)
    {
           
        $get_amenity_data = Amenity::where('id', $id)->first();

        return view('admin.amenity_edit', compact('get_amenity_data'));
    }

    public function update(Request $request, $id)
    {

        $obj = Amenity::where('id', $id)->first();
        $obj->name = $request->name;
    
        $obj->update();

        return redirect()->back()->with('success', 'Anemity is updated successfully.');
    }

    public function delete($id)
    {
        $get_single_data = Amenity::where('id', $id)->first();
        $get_single_data->delete();
        
        return redirect()->back()->with('success', 'Amenity is  deleted successfully.');
    
    }
}
