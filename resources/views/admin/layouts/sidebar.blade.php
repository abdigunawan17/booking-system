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

            
            <li class="nav-item dropdown {{ $route == 'admin_page_about' || $route == 'admin_page_termcond' || $route == 'admin_page_privacy' || $route == 'admin_page_blog' || $route == 'admin_page_faq' || $route == 'admin_page_photo'  ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Page</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ $route == 'admin_page_about' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_about') }}"><i class="fa fa-angle-right"></i> About</a></li>
                    <li class="{{ $route == 'admin_page_termcond' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_termcond') }}"><i class="fa fa-angle-right"></i> Term & Conditions</a></li>
                    <li class="{{ $route == 'admin_page_privacy' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_privacy') }}"><i class="fa fa-angle-right"></i> Privacy Policy</a></li>
                    <li class="{{ $route == 'admin_page_photo' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_photo') }}"><i class="fa fa-angle-right"></i> Photo Gallery</a></li>
                    <li class="{{ $route == 'admin_page_blog' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_blog') }}"><i class="fa fa-angle-right"></i> Blog</a></li>
                    <li class="{{ $route == 'admin_page_faq' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_faq') }}"><i class="fa fa-angle-right"></i> Faq</a></li>
                </ul>
            </li>
             

            <li class="{{ $route == 'admin_slider_view' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_slider_view') }}"><i class="fa fa-hand-o-right"></i> <span>Slider</span></a></li>

            <li class="{{ $route == 'admin_feature_view' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_feature_view') }}"><i class="fa fa-hand-o-right"></i> <span>Feature</span></a></li>

            <li class="{{ $route == 'admin_testimonial_view' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_testimonial_view') }}"><i class="fa fa-hand-o-right"></i> <span>Testimonial</span></a></li>

            <li class="{{ $route == 'admin_post_view' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post_view') }}"><i class="fa fa-hand-o-right"></i> <span>Post</span></a></li>

            <li class="{{ $route == 'admin_photo_view' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_photo_view') }}"><i class="fa fa-hand-o-right"></i> <span>Photo Gallery</span></a></li>

            <li class="{{ $route == 'admin_faq_view' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_view') }}"><i class="fa fa-hand-o-right"></i> <span>FAQ</span></a></li>
        </ul>
    </aside>
</div>