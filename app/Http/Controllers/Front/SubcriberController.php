<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WebsiteMail;
use App\Models\Admin;
use App\Models\Subcriber;

class SubcriberController extends Controller
{
    //
    public function send_email(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if(!$validator->passes())
        {
            return response()->json(['code' => 0, 'error_message' => $validator->errors()->toArray()]);
        }
        else 
        {
            $token = hash('sha256', time());


            $obj = new Subcriber();
            $obj->email = $request->email;
            $obj->token = $token;
            $obj->status = 0;
            $obj->save();

            $verification_link = url('/subcriber/verify/'. $request->email . '/' .$token); 

            $subject = "Subcribtion Verification";
            $message = "Please click link below to confirm subcribtion: <br>";
            $message .= '<a href="'. $verification_link .'">';
            $message .= $verification_link;
            $message .= "<a>";

            //$admin_data = Admin::where('id', 1)->first();
            //$admin_email = $admin_data->email;

            \Mail::to($request->email)->send(new WebsiteMail($subject, $message));

            return response()->json(['code' => 1, 'success_message' => 'Please check your email to confirm subcription']);
        }
    }

    public function verify($email, $token)
    {   
        echo $email . "<br>";
        $get_subcriber_data = Subcriber::where('email', $email)->where('token', $token)->first();
        
        if($get_subcriber_data){
            
            $get_subcriber_data->token = '';
            $get_subcriber_data->status = 1;
            $get_subcriber_data->update();

            return redirect()->route('home')->with('success', 'Thank you..your subscription is verified successfully!');
        }
        else{
            return redirect()->route('home')->with('error', 'Sorry..your subscription is not found!');
        }
    }
}
