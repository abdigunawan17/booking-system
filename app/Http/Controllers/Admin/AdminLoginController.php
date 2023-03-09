<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\WebsiteMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    
    public function showpass()
    {
        $pass = Hash::make('1234');
        dd($pass);
    }

    public function login()
    {
        //$pwd = Hash;
        return view('admin.login');
    }

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
        if(Auth::guard('admin')->attempt($credential)) 
        {
            //dd($credential);
            return redirect()->route('admin_home');
        }else{
            //dd(Auth::guard('admin'));
            return redirect()->route('admin_login')->with('error', 'Information is not correct!');
        }
        
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }

    public function forget_password()
    {
        return view('admin.forget_pass');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            
        ]);

        $search_admin_email = Admin::where('email', $request->email)->first();
        if( !$search_admin_email )
        {
            return redirect()->back()->with('error', 'Email Address Not Found!');
        }

        $token = hash('sha256', time());

        $search_admin_email->token = $token;
        $search_admin_email->update();

        $reset_link = url('admin/reset-password/' . $token . '/' .$request->email);
        $subject = "Reset Password";
        $message = "Please click on following link: <br>";
        $message .= '<a href="'. $reset_link .'">Click here</a>';

        \Mail::to($request->email)->send(new WebsiteMail($subject, $message));

        return redirect()->route('admin_login')->with('success', 'Please check your email and follow the steps there');
    }

    public function reset_password($token, $email )
    {
        $get_admin_data = Admin::where('token', $token)->where('email', $email)->first();
        if(!$get_admin_data)
        {
            return redirect()->route('admin_login');
        }

        return view('admin.reset_pass', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);

        //echo $request->password;

        //cek dulu apakah token dan emailnya sama atau tidak
        $get_admin_token_email = Admin::where('token', $request->token)->where('email', $request->email)->first();
        $get_admin_token_email->password = Hash::make($request->password);
        $get_admin_token_email->token = '';
        $get_admin_token_email->update();

        return redirect()->route('admin_login')->with('success', 'Password is reset successfully');
   
    }
}
