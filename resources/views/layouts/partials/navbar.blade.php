<header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                    <div class="container-fluid">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left d-flex">
                                    <ul>
                                        <li>Call Us: (+92) 3070624199</li>
                                        <li>sm.scat96@gmail.com</li>
                                    </ul>
                                    <div class="header-social">
                                        <ul>
                                            <li><a href="https://twitter.com/hifi_services" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <li><a  href="https://www.facebook.com/profile.php?id=100089011367917" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="https://www.instagram.com/hifinetservices/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            <li> <a href="https://wa.me/03070624199" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="index.html"><img src="{{asset('front_end/img/hifi-1.png')}}" style="width: 100px" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="{{route('main')}}">Home</a></li>
                                                <li><a href="{{route('pages.about')}}">About</a></li>
                                                <li><a href="{{route('pages.service')}}">Package</a></li>
                                                <li><a href="{{route('pages.contact')}}">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- Header-btn -->
                                    <div class="header-right-btn d-none d-lg-block ml-30">
                                        @if(Auth::user())
                                        <a href="{{ route('login') }}" class="btn header-btn">DASHBOARD</a>
                                        @else
                                        <a href="{{ route('login') }}" class="btn header-btn">Sign Up</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <!-- header end -->
