<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        $get_posts = Post::get();
        return view('admin.post_view', compact('get_posts'));
    }

    public function add()
    {
        return view('admin.post_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'heading' => 'required',
            'slug' => 'required',
            'short_content' => 'required',
            'content' => 'required',

        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        
        $obj = new Post();
        $obj->photo = $final_name;
        $obj->heading = $request->heading;
        $obj->slug = $request->slug;
        $obj->short_content = $request->short_content;
        $obj->content = $request->content;
        $obj->total_view = 1;
        $obj->save();

        return redirect()->back()->with('success', 'Post is added successfully.');
    }

    public function edit($slug)
    {
        
        $get_post_data = Post::where('slug', $slug)->firstorfail();

        return view('admin.post_edit', compact('get_post_data'));
    }

    public function update(Request $request, $slug)
    {

        $obj = Post::where('slug', $slug)->firstorfail();

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

        
        $obj->heading = $request->heading;
        $obj->slug = $request->slug;
        $obj->short_content = $request->short_content;
        $obj->content = $request->content;
        $obj->update();

        return redirect()->route('admin_post_view')->with('success', 'Post is updated successfully.');
    }

    public function delete($slug)
    {
        $single_data = Post::where('slug', $slug)->firstorfail();
        unlink(public_path('uploads/'. $single_data->photo));
        $single_data->delete();

        return redirect()->back()->with('success', 'Post is deleted successfully');
    }
}
