<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Mail\WebsiteMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    public function login()
    {
        return view('frontend.login');
    }
    
    /*
    public function login_submit(Request $request)
    {
        //echo $request->email;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        //remember, the password di hash!! bukan di md5, makanya tidak terbaca credential
        //apabila pakai md5
        if(Auth::guard('customer')->attempt($credential)) 
        {
            //dd($credential);
            return redirect()->route('customer_home');
        }else{
            //dd(Auth::guard('admin'));
            return redirect()->route('customer_login')->with('error', 'Information is not correct!');
        }
    }
    */

    public function signup()
    {
        return view('frontend.signup');
    }

    

    public function signup_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);

        dd($request);

        //return redirect()->route('customer_login')->with('success', 'Please check your email and click on the link to complete');
    }

    
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer_login');
    }

    
    
}
