<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png"  href="/storage/images/favicon.png">
    @if($site_layout === 'boxed')
    <style>
    body{
        width:85%;
        margin:auto;
        background-color:white !important;
        background-image:url('/images/pattern_1.svg'); 
        background-size:40px 40px;
    }
    </style>
    @endif
    @yield('page-styles')
    <title>{{$site_title}}</title>
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <div class="item">
                <i class="icon-envelope"></i> {{$site_email}}
            </div>|
            <div class="item">
                <i class="icon-phone"></i> {{$site_phone}}
            </div>
            @if($show_facebook)
            | <div class="item"><a href="{{$facebook_url}}"><i class="icon-facebook-square"></i></a></div>
            @endif
            @if($show_linkedin)
            | <div class="item"><a href="{{$linkedin_url}}"><i class="icon-linkedin"></i></a></div>
            @endif
        </div>
        <div class="page-header">
        <div class="logo-container">
            <img class="logo" src="{{asset('/storage/images/'.$site_logo_name)}}">
        </div>
        <button class="nav-toggle" id="nav-toggle">
            <div class="bars bar1"></div>
            <div class="bars bar2"></div>
            <div class="bars bar3"></div>
        </button>
        <nav class="menu-container">
        <ul class="nav-menu">
            <li class="nav-menu-item">
                <a href="{!! route('home') !!}"> <i class="icon-home"></i> Home</a>
            </li>
            <li class="nav-menu-item">
                <a href="{!! route('about') !!}"> <i class="icon-address-card"></i> About</a>
            </li>
            <li class="nav-menu-item">
                <a href="{!! route('products') !!}"> <i class="icon-lemon"></i> Products</a>
            </li>
            <li class="nav-menu-item">
                <a href="{{route('calender')}}"> <i class="icon-calendar"></i> Calendar</a>
            </li>
            <li class="nav-menu-item">
                <a href="{!! route('contact') !!}"> <i class="icon-paper-plane"></i> Contact us</a>
            </li>
        </ul>
        </nav>
        </div>
        @yield('page-content')
        <div class="footer">
            <div class="columns">
                <div class="column socials">
                    <div class="item">
                        <i class="icon-envelope"></i> {{$site_email}}
                    </div>
                    <div class="item">
                        <i class="icon-phone"></i> {{$site_phone}}
                    </div>
                    @if($show_linkedin)
                    <div class="item">
                        <a href="{{$linkedin_url}}"><i class="icon-linkedin"></i> linked in</a>
                    </div>
                    @endif
                    @if($show_facebook)
                    <div class="item">
                        <a href="{{$facebook_url}}"><i class="icon-facebook-square"></i> Facebook</a>
                    </div>
                    @endif
                </div>
                <div class="column company">
                    <h3 class="header">Company</h3>
                    <a href="{{route('home')}}">Home</a>
                    <a href="{{route('about')}}">About</a>
                    <a href="{{route('products')}}">Products</a>
                    <a href="{{route('calender')}}">Calender</a>
                    <a href="{!! route('contact') !!}">Contact Us</a>
                </div>
                <div class="column">
                    <img src="{{asset('/storage/images/'.$site_logo_name)}}" class="footer-logo">
                </div>
            </div>
            <div class="copyright">
                <p>COPYRIGHT © 2020 | <span style="text-transform: uppercase;">{{$site_title}}</span> | All Right Reserved</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $('.nav-toggle').on("click",function(){
                $(this).toggleClass("toggled")
                var $nav_menu = $(".nav-menu")
                if( $nav_menu.css("display") == "none")
                    $nav_menu.slideDown()
                else
                    $nav_menu.slideUp()
            })
        })
    </script>
</body>
</html>