<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function profile_submit(Request $request)
    {
        $get_admin_data = Admin::where('email', Auth::guard('admin')->user()->email)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email' 
        ]);

        if($request->password != '')
        {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password' 
            ]);

            $get_admin_data->password = Hash::make($request->password);
        }

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif',
            ]);

            unlink(public_path('uploads/' . $get_admin_data->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'admin'. '.' .$ext;

            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $get_admin_data->photo = $final_name;
        }

        
        $get_admin_data->name = $request->name;
        $get_admin_data->email = $request->email;
        $get_admin_data->update();
        
        return redirect()->back()->with('success', 'Profile information is saved successfully');
    }
}
