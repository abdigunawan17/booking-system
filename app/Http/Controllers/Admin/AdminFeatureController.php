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
        return view('admin.feature_view', compact('get_feature'));
    }

    public function add()
    {
        return view('admin.feature_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'heading' => 'required',
        ]);

        
        $obj = new Feature();
        $obj->icon = $request->icon;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->save();

        return redirect()->back()->with('success', 'Feature is added successfully.');
    }

    public function edit($id)
    {
        
        $get_feature_data = Feature::where('id', $id)->first();

        return view('admin.feature_edit', compact('get_feature_data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required',
            'heading' => 'required',
        ]);

        $obj = Feature::where('id', $id)->first();
        $obj->icon = $request->icon;    
        $obj->heading = $request->heading;
        $obj->text = $request->text;

        $obj->update();

        return redirect()->back()->with('success', 'Feature is updated successfully.');
    }

    public function delete($id)
    {
        $get_single_data = Feature::where('id', $id)->first();
        $get_single_data->delete();
        
        return redirect()->back()->with('success', 'Feature is  deleted successfully.');
    
    }
}
