<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function about()
    {
        $get_page_data = Page::where('id', 1)->first();
        return view('admin.page_about', compact('get_page_data'));
    }

    public function about_update(Request $request)
    {

        $obj = Page::where('id', 1)->first();
        $obj->about_heading = $request->heading;
        $obj->about_content = $request->content;
        $obj->about_status = $request->status;
        $obj->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function termcond()
    {
        $get_termcond_data = Page::where('id', 1)->first();
        return view('admin.page_termcond', compact('get_termcond_data'));
    }

    public function termcond_update(Request $request)
    {

        $obj = Page::where('id', 1)->first();
        $obj->term_condition_heading = $request->heading;
        $obj->term_condition_content = $request->content;
        $obj->term_condition_status = $request->status;
        $obj->update();

        return redirect()->back()->with('success', 'Term & conditiona is updated successfully.');
    }

    public function privacy()
    {
        $get_privacy_data = Page::where('id', 1)->first();
        return view('admin.page_privacy', compact('get_privacy_data'));
    }

    public function privacy_update(Request $request)
    {

        $obj = Page::where('id', 1)->first();
        $obj->privacy_heading = $request->privacy_heading;
        $obj->privacy_content = $request->privacy_content;
        $obj->privacy_status = $request->privacy_status;
        $obj->update();

        return redirect()->back()->with('success', 'Privacy policy is updated successfully.');
    }


    public function photo_gallery()
    {
        $get_photo_data = Page::where('id', 1)->first();
        return view('admin.page_photo', compact('get_photo_data'));
    }

    public function photo_gallery_update(Request $request)
    {

        $obj = Page::where('id', 1)->first();
        $obj->photo_gallery_heading = $request->photo_heading;
        $obj->photo_gallery_status = $request->photo_status;
        $obj->update();

        return redirect()->back()->with('success', 'Photo Gallery is updated successfully.');
    }

    public function faq()
    {
        $get_faq_data = Page::where('id', 1)->first();
        return view('admin.page_faq', compact('get_faq_data'));
    }

    public function faq_update(Request $request)
    {

        $obj = Page::where('id', 1)->first();
        $obj->faq_heading = $request->faq_heading;
        $obj->faq_status = $request->faq_status;
        $obj->update();

        return redirect()->back()->with('success', 'Faq is updated successfully.');
    }

    public function blog()
    {
        $get_blog_data = Page::where('id', 1)->first();
        return view('admin.page_blog', compact('get_blog_data'));
    }

    public function blog_update(Request $request)
    {

        $obj = Page::where('id', 1)->first();
        $obj->blog_heading = $request->blog_heading;
        $obj->blog_status = $request->blog_status;
        $obj->update();

        return redirect()->back()->with('success', 'Blog is updated successfully.');
    }

    public function room()
    {
        $get_room_data = Page::where('id', 1)->first();
        return view('admin.page_room', compact('get_room_data'));
    }

    public function room_update(Request $request)
    {

        $obj = Page::where('id', 1)->first();
        $obj->room_heading = $request->room_heading;
        $obj->update();

        return redirect()->back()->with('success', 'Room is updated successfully.');
    }

    public function cart()
    {
        $get_cart_data = Page::where('id', 1)->first();
        return view('admin.page_cart', compact('get_cart_data'));
    }

    public function cart_update(Request $request)
    {

        $obj = Page::where('id', 1)->first();
        $obj->cart_heading = $request->cart_heading;
        $obj->cart_status = $request->cart_status;
        $obj->update();

        return redirect()->back()->with('success', 'Cart is updated successfully.');
    }

    public function checkout()
    {
        $get_checkout_data = Page::where('id', 1)->first();
        return view('admin.page_checkout', compact('get_checkout_data'));
    }

    public function checkout_update(Request $request)
    {

        $obj = Page::where('id', 1)->first();
        $obj->checkout_heading = $request->checkout_heading;
        $obj->checkout_status = $request->checkout_status;
        $obj->update();

        return redirect()->back()->with('success', 'Checkout is updated successfully.');
    }

    public function payment()
    {
        $get_payment_data = Page::where('id', 1)->first();
        return view('admin.page_payment', compact('get_payment_data'));
    }

    public function payment_update(Request $request)
    {

        $obj = Page::where('id', 1)->first();
        $obj->payment_heading = $request->payment_heading;
        $obj->payment_status = $request->payment_status;
        $obj->update();

        return redirect()->back()->with('success', 'payment is updated successfully.');
    }


    public function signup()
    {
        $get_signup_data = Page::where('id', 1)->first();
        return view('admin.page_signup', compact('get_signup_data'));
    }

    public function signup_update(Request $request)
    {

        $obj = Page::where('id', 1)->first();
        $obj->signup_heading = $request->signup_heading;
        $obj->signup_status = $request->signup_status;
        $obj->update();

        return redirect()->back()->with('success', 'signup is updated successfully.');
    }


    public function signin()
    {
        $get_signin_data = Page::where('id', 1)->first();
        return view('admin.page_signin', compact('get_signin_data'));
    }

    public function signin_update(Request $request)
    {

        $obj = Page::where('id', 1)->first();
        $obj->signin_heading = $request->signin_heading;
        $obj->signin_status = $request->signin_status;
        $obj->update();

        return redirect()->back()->with('success', 'signin is updated successfully.');
    }
}
