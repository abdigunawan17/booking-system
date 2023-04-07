<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcriber;
use Illuminate\Http\Request;
use App\Mail\WebsiteMail;

class AdminSubcribeController extends Controller
{
    public function show()
    {
        $get_all_subcribers = Subcriber::where('status',1)->get();
        
        return view('admin.subcriber_show', compact('get_all_subcribers'));
    }

    public function send_email()
    {
        return view('admin.subcriber_send_email');
    }

    public function send_email_submit(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

            

            $subject = $request->subject;
            $message = $request->message;
            
            $all_subcribers = Subcriber::where('status', 1)->get();

            foreach($all_subcribers as $item)
            {
                \Mail::to($item->email)->send(new WebsiteMail($subject, $message));
            }

            return redirect()->back()->with('success', 'Email is sent successfully');
    }
}
