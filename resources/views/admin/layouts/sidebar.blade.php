@php
     $route = Route::current()->getName();   
@endphp
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ $route == 'admin_home' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home') }}"><i class="fa fa-hand-o-right"></i> <span>Dashboard</span></a></li>

            <li class="nav-item dropdown {{ $route == 'admin_amenity_view' || $route == 'admin_room_view' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Room Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ $route == 'admin_amenity_view' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_amenity_view') }}"><i class="fa fa-angle-right"></i> Amenities</a></li>
                    <li class="{{ $route == 'admin_room_view' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_room_view') }}"><i class="fa fa-angle-right"></i> Rooms</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ $route == 'admin_page_about' || $route == 'admin_page_termcond' || $route == 'admin_page_privacy' || $route == 'admin_page_blog' || $route == 'admin_page_room' || 
            $route == 'admin_page_faq' || $route == 'admin_page_photo' || $route == 'admin_page_cart' || $route == 'admin_page_checkout' || $route == 'admin_page_payment' || 
            $route == 'admin_page_signup' || $route == 'admin_page_signin'  ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Page</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ $route == 'admin_page_about' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_about') }}"><i class="fa fa-angle-right"></i> About</a></li>
                    <li class="{{ $route == 'admin_page_termcond' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_termcond') }}"><i class="fa fa-angle-right"></i> Term & Conditions</a></li>
                    <li class="{{ $route == 'admin_page_privacy' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_privacy') }}"><i class="fa fa-angle-right"></i> Privacy Policy</a></li>
                    <li class="{{ $route == 'admin_page_photo' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_photo') }}"><i class="fa fa-angle-right"></i> Photo Gallery</a></li>
                    <li class="{{ $route == 'admin_page_blog' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_blog') }}"><i class="fa fa-angle-right"></i> Blog</a></li>
                    <li class="{{ $route == 'admin_page_room' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_room') }}"><i class="fa fa-angle-right"></i> Room</a></li>
                    <li class="{{ $route == 'admin_page_faq' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_faq') }}"><i class="fa fa-angle-right"></i> Faq</a></li>
                    <li class="{{ $route == 'admin_page_cart' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_cart') }}"><i class="fa fa-angle-right"></i> Cart</a></li>
                    <li class="{{ $route == 'admin_page_checkout' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_checkout') }}"><i class="fa fa-angle-right"></i> Checkout</a></li>
                    <li class="{{ $route == 'admin_page_payment' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_payment') }}"><i class="fa fa-angle-right"></i> Payment</a></li>
                    <li class="{{ $route == 'admin_page_signup' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_signup') }}"><i class="fa fa-angle-right"></i> Sign up</a></li>
                    <li class="{{ $route == 'admin_page_signin' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_signin') }}"><i class="fa fa-angle-right"></i> Sign in</a></li>
                </ul> 
            </li>
             

            <li class="{{ $route == 'admin_slider_view' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_slider_view') }}"><i class="fa fa-hand-o-right"></i> <span>Slider</span></a></li>

            <li class="{{ $route == 'admin_feature_view' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_feature_view') }}"><i class="fa fa-hand-o-right"></i> <span>Feature</span></a></li>

            <li class="{{ $route == 'admin_testimonial_view' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_testimonial_view') }}"><i class="fa fa-hand-o-right"></i> <span>Testimonial</span></a></li>

            <li class="{{ $route == 'admin_post_view' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post_view') }}"><i class="fa fa-hand-o-right"></i> <span>Post</span></a></li>

            <li class="{{ $route == 'admin_photo_view' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_photo_view') }}"><i class="fa fa-hand-o-right"></i> <span>Photo Gallery</span></a></li>

            <li class="{{ $route == 'admin_faq_view' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_view') }}"><i class="fa fa-hand-o-right"></i> <span>FAQ</span></a></li>
            
            <li class="nav-item dropdown {{ $route == 'admin_subcriber_show' || $route == 'admin_subcriber_send_email' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Subscribers</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ $route == 'admin_subcriber_show' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subcriber_show') }}"><i class="fa fa-angle-right"></i> All Subricber</a></li>
                    <li class="{{ $route == 'admin_subcriber_send_email' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subcriber_send_email') }}"><i class="fa fa-angle-right"></i> Send Email</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>