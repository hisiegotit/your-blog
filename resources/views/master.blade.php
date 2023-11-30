<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hisie - My personal blog</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/main.css')}}" rel='stylesheet' type='text/css' />
</head>

<body>
    <!--header-top-starts-->
    <div class="header-top">
        <div class="container">
            <div class="head-main">
                <a href="index.html"><img src="{{asset('images/logo-1.png')}}" class="logo-img" alt="logo" /></a>
            </div>
        </div>
    </div>
    <!--header-top-end-->
    <!--start-header-->
    <div class="header">
        <div class="container">
            <div class="head">
                <div class="navigation">
                    <span class="menu"></span>
                    <ul class="navig">
                        <li><a href="{{url('/')}}" class="@if(request()->is('/')) active @endif ">Home</a></li>
                        @foreach ($categories as $category)
                        <li><a href="{{route('category.show', $category)}}" class="@if(request()->is('category/' . $category->id)) active @endif">{{$category->title}}</a></li>
                        @endforeach
                </div>
                <div class="header-right">
                    <form action="{{url('/search')}}">
                        @csrf
                        <div class="search-bar">
                            <input type="text" name="keywords" placeholder="Search...">
                            <input type="submit" value="" name="search">
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--main-starts-->
    @yield('content')
    <div class="footer">
        <div class="container">
            <div class="footer-text">
                <p>© 2023 hisie. All Rights Reserved</p>
            </div>
        </div>
    </div>
    <!--footer-end-->
</body>

</html>