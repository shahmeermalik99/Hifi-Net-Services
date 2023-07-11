<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HiFi Net Services | Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('layouts.admin.head')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    @include('layouts.admin.sidebar')
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="logo-pro col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" style="height: 60px; padding: 10px;"
                                src="{{asset('front_end/img/hifi-1.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.admin.navbar')
        @yield('content')
        @include('sweetalert::alert')
        @include('layouts.admin.footer')
        @include('layouts.admin.script')
</body>

</html>