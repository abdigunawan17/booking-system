<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $get_testimonial = Testimonial::get();
        return view('admin.testimonial_view', compact('get_testimonial'));
    }


    public function add()
    {
        return view('admin.testimonial_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        
        $obj = new Testimonial();
        $obj->photo = $final_name;
        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->save();

        return redirect()->back()->with('success', 'Testimonial is added successfully.');
    }

    public function edit($id)
    {
        
        $get_testimonial_data = Testimonial::where('id', $id)->first();

        return view('admin.testimonial_edit', compact('get_testimonial_data'));
    }

    public function update(Request $request, $id)
    {

        $obj = Testimonial::where('id', $id)->first();

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            ]);

            unlink(public_path('uploads/' . $obj->photo));

            $ext = $request->file('photo')->extension();
            $final_name = time(). '.' .$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);



            $obj->photo = $final_name;
        }

        
        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->update();

        return redirect()->back()->with('success', 'Testimonial is updated successfully.');
    }

    public function delete($id)
    {
        $get_single_data = Testimonial::where('id', $id)->first();
        unlink(public_path('uploads/'. $get_single_data->photo));
        $get_single_data->delete();
        
        return redirect()->back()->with('success', 'Testimonial is  deleted successfully.');
    
    }
}
