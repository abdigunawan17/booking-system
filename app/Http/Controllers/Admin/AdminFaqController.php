<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    public function index()
    {
        $get_faq = Faq::get();
        return view('admin.faq_view', compact('get_faq'));
    }

    public function add()
    {
        return view('admin.faq_add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        
        $obj = new Faq();
        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->save();

        return redirect()->back()->with('success', 'Faq is added successfully.');
    }

    public function edit($id)
    {
           
        $get_faq_data = Faq::where('id', $id)->first();

        return view('admin.faq_edit', compact('get_faq_data'));
    }

    public function update(Request $request, $id)
    {

        $obj = Faq::where('id', $id)->first();
        $obj->question = $request->question;
        $obj->answer = $request->answer;
    
        $obj->update();

        return redirect()->back()->with('success', 'Faq is updated successfully.');
    }

    public function delete($id)
    {
        $get_single_data = Faq::where('id', $id)->first();
        $get_single_data->delete();
        
        return redirect()->back()->with('success', 'Faq is  deleted successfully.');
    
    }
}
