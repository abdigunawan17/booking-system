<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="">
        <title>Hotel Website</title>        
		
        <link rel="icon" type="image/png" href="{{ asset('dist-frontend/uploads/favicon.png') }}">

        @include('frontend.layout.styles')
        
        @include('frontend.layout.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;500&display=swap" rel="stylesheet">
        
        <!-- Google Analytics -->
        <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84213520-6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-84213520-6');
        </script> -->

    </head>
    <body>
        
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side">
                        <ul>
                            <li class="phone-text">111-222-3333</li>
                            <li class="email-text">contact@arefindev.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 right-side">
                        <ul class="right">
                            @if($global_page_data->cart_status == 1)
                                <li class="menu"><a href="cart.html">{{ $global_page_data->cart_heading }}</a></li>
                            @endif

                            @if($global_page_data->checkout_status == 1)
                                <li class="menu"><a href="checkout.html">{{ $global_page_data->checkout_heading }}</a></li>
                            @endif

                            @if($global_page_data->signup_status == 1)
                                <li class="menu"><a href="{{ route('customer_signup') }}">{{ $global_page_data->signup_heading }}</a></li>
                            @endif

                            @if($global_page_data->signin_status == 1)
                                <li class="menu"><a href="{{ route('customer_login') }}">{{ $global_page_data->signin_heading }}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        @include('frontend.layout.navbar')

        @yield('main_content')

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Site Links</h2>
                            <ul class="useful-links">
                                <li><a href="rooms.html">Rooms & Suites</a></li>

                                @if($global_page_data->photo_gallery_status == 1)
                                    <li><a href="{{ route('photo') }}">{{ $global_page_data->photo_gallery_heading }}</a></li>
                                @endif

                                @if($global_page_data->blog_status == 1)
                                    <li><a href="{{ route('blog') }}">{{ $global_page_data->blog_heading }}</a></li>
                                @endif
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Useful Links</h2>
                            <ul class="useful-links">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                @if($global_page_data->term_condition_status == 1)
                                    <li><a href="{{ route('term_cond') }}">{{ $global_page_data->term_condition_heading }}</a></li>
                                @endif
                                @if($global_page_data->privacy_status == 1)
                                    <li><a href="{{ route('privacy') }}">{{ $global_page_data->privacy_heading }}</a></li>
                                @endif
                                @if($global_page_data->faq_status == 1)
                                    <li><a href="{{ route('faq') }}">{{ $global_page_data->faq_heading }}</a></li>
                                @endif
                                <li><a href="disclaimer.html">Disclaimer</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Contact</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="right">
                                    34 Antiger Lane,<br>
                                    PK Lane, USA, 12937
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-volume-control-phone"></i>
                                </div>
                                <div class="right">
                                    contact@arefindev.com
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="right">
                                    122-222-1212
                                </div>
                            </div>
                            <ul class="social">
                                <li><a href=""><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                <li><a href=""><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Newsletter</h2>
                            <p>
                                In order to get the latest news and other great items, please subscribe us here: 
                            </p>
                            <form action="{{ route('subcribe_send_email') }}" method="post" class="form_subcribe_ajax">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control">
                                    <span class="text-danger error-text email_error"> </span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Subscribe Now">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="copyright">
            Copyright 2022, ArefinDev. All Rights Reserved.
        </div>
     
        <div class="scroll-top">
            <i class="fa fa-angle-up"></i>
        </div>
		
        @include('frontend.layout.scripts_footer')     
		
        <script>
            (function($){
                $(".form_subcribe_ajax").on('submit', function(e){
                    e.preventDefault();
                    $('#loader').show();
                    var form = this;
                    $.ajax({
                        url:$(form).attr('action'),
                        method:$(form).attr('method'),
                        data:new FormData(form),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend:function(){
                            $(form).find('span.error-text').text('');
                        },
                        success:function(data)
                        {
                            $('#loader').hide();
                            if(data.code == 0)
                            {
                                $.each(data.error_message, function(prefix, val) {
                                    $(form).find('span.'+prefix+'_error').text(val[0]);
                                });
                            }
                            else if(data.code == 1)
                            {
                                $(form)[0].reset();
                                iziToast.success({
                                    title: '',
                                    position: 'topRight',
                                    message: data.success_message,
                                });
                            }
                            
                        }
                    });
                });
            })(jQuery);
        </script>
        <div id="loader"></div>

        @if($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ $error }}',
                });
            </script>
        @endforeach
    
    @endif
    
    @if(session()->get('error'))
        <script>
            iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
            });
        </script>
    @endif
    
    @if(session()->get('success'))
        <script>
            iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
            });
        </script>
    @endif


        
   </body>
</html>