@php
    $favicon = App\HomeSectionMeta::where('name','=','site_favicon')->first();
    $logo = App\HomeSectionMeta::where('name','=','site_logo')->first();
    $footer_text = App\HomeSectionMeta::where('name','=','footer_text')->first();
    $footer_copyright_text = App\HomeSectionMeta::where('name','=','footer_copyright_text')->first();
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') | LetRecharge</title>
        <link rel="shortcut icon" href="{{ asset('cms/home/'. $favicon->value) }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        <style type="text/css">
            .select-country{
                margin: 30px 0px;
                max-width: 70%;
            }
            .select-country .form-control{
                height: 50px;
            }
            .theme-btn{
                display: inline-block;
                width: 220px;
                height: 50px;
                border-radius: 5px;
                background: #F69625;
                color: #fff;
                line-height: 48px;
                text-align: center;
                border: 1px solid #F69625;
                cursor: pointer;
                transition: .3s;
            }
            .theme-btn:hover{
                background: transparent;
                color: #F69625;
                transition: .3s;
            }
            .banner-features-list{
                margin-bottom: 30px;
            }
            .banner-features-list li{
                font-size: 18px;
                color: #fff;
                margin: 15px 0px;
            }
            .bold{
                font-weight: bold !important;
            }
            .hero h1,
            .hero h2,
            .hero h3,
            .hero h4{
                font-weight: bold !important;
            }
            .promo-slider .img-container{
                padding: 15px 50px;
            }
            .promo-slider{
                margin-top: 200px;
                max-width: 300px;
                display: inline-block !important;
            }
            .promo-slider .owl-prev{
                position: absolute;
                background: rgba(255,255,255.5);
                padding: 3px 10px;
                border-radius: 50%;
                top: 40%;
            }
            .promo-slider .owl-next{
                position: absolute;
                background: rgba(255,255,255.5);
                padding: 3px 10px;
                border-radius: 50%;
                top: 40%;
                right: 0;
            }
            .promo-slider .owl-prev .fa,.promo-slider .owl-next .fa{
                color: #F69625;
            }
            .uppercase{
                text-transform: uppercase;
            }
            #operators{
                margin-bottom: 30px;
                display: none;
            }
            .operator-img-box{
                width: 150px;
                height: 100px;
                background-color: #fff;
                padding: 10px;
                cursor: pointer;
                margin: 10px 0px;
                border: 2px solid #eee;
                border-radius: 4px;
                display: table-cell;
                vertical-align: middle;
                text-align: center;
                opacity: 1;
                transition: .3s;
            }
            .operator-img{
                width: 100px;
            }
            .operator-img-box.faded{
                opacity: .6;
                transition: .3s;
            }
        </style>
        @stack('css')
    </head>
    <body>
        <!-- preloader begin-->
        <div class="preloader">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>
        <!-- preloader end -->

        <!-- header begin -->
        <div class="header">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-3 d-xl-flex d-lg-flex d-block align-items-center">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-6 d-xl-block d-lg-block d-flex align-items-center">
                                <div class="logo">
                                    <a href="/">
                                        <img src="{{ asset('cms/home/'. $logo->value) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 d-xl-none d-lg-none">
                                  <button class="navbar-toggler" type="button" data-toggle="collapse"
                                      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                      aria-expanded="false" aria-label="Toggle navigation">
                                      <i class="fas fa-bars"></i>
                                  </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-8">
                        <div class="mainmenu">
                            <nav class="navbar navbar-expand-lg">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                        <li class="nav-item active">
                                            <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active ' : '' }}" href="{{ route('home') }}">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ Route::currentRouteName() == 'about' ? 'active ' : '' }}" href="{{ route('about') }}">About Us</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ Route::currentRouteName() == 'faqs' ? 'active ' : '' }}" href="{{ route('faqs') }}">FAQs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ Route::currentRouteName() == 'contact' ? 'active ' : '' }}" href="{{ route('contact') }}">Contact</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ Route::currentRouteName() == 'login' ? 'active ' : '' }}" href="{{ route('login') }}">Login</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header end -->

        @yield('content')

        @php
            $facebook = App\SocialLinksMeta::where('platform_name','=','facebook')->first();
            $twitter = App\SocialLinksMeta::where('platform_name','=','twitter')->first();
            $instagram = App\SocialLinksMeta::where('platform_name','=','instagram')->first();
            $pinterest = App\SocialLinksMeta::where('platform_name','=','pinterest')->first();
            $youtube = App\SocialLinksMeta::where('platform_name','=','youtube')->first();
        @endphp
        <!-- footer begin -->
        <div class="footer">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-sm-6 col-xl-4 col-lg-4">
                        <div class="about-area">
                            <a class="logo" href="/"><img src="{{ asset('cms/home/'. $logo->value) }}" alt=""></a>
                            {!! $footer_text->value !!}
                            <ul class="social">
                                <li><a class="social-link" href="{{ $facebook->link }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a class="social-link" href="{{ $twitter->link }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a class="social-link" href="{{ $instagram->link }}"><i class="fab fa-instagram"></i></a></li>
                                <li><a class="social-link" href="{{ $pinterest->link }}"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a class="social-link" href="{{ $youtube->link }}"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-2 col-lg-2">
                        <div class="useful-link">
                            <h3>Who we are</h3>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Privacy and Cookie Policy</a></li>
                                <li><a href="#">Terms and Conditions</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Customer Reviews</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-2 col-lg-2">
                        <div class="useful-link">
                            <h3>What we offer</h3>
                            <ul>
                                <li><a href="#">Mobile Recharge</a></li>
                                <li><a href="#">Promotions</a></li>
                                <li><a href="#">Countries</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-2 col-lg-2">
                        <div class="useful-link">
                            <h3>Help & Support</h3>
                            <ul>
                                <li><a href="#">Faq</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- footer end -->

        <!-- copyright begin -->
        <div class="copyright">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-4">
                        <div class="copyright-area">
                            {!! $footer_copyright_text->value !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- copyright end -->

        <!-- jquery -->
        <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-migrate-3.0.1.js') }}"></script>
        <!-- bootstrap -->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <!-- owl carousel -->
        <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
        <!-- magnific popup -->
        <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
        <!-- counter up js -->
        <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
        <!-- way poin js-->
        <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
        <!-- wow js-->
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <!-- main -->
        <script src="{{ asset('assets/js/main.js') }}"></script>

        @stack('js')
    </body>
</html>