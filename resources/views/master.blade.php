<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HiFi Internet Service</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('front_end/img/hifi-1.png')}}">

    @include('layouts.partials.head')

</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('front_end/img/hifi-1.png')}}"  alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    @include('layouts.partials.navbar')

    @yield('content')

    @include('layouts.partials.footer')

    @include('layouts.partials.script')

</body>

</html>