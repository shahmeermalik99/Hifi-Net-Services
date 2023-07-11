@extends('master')

@section('content')

<main>
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-50 text-center">
                            <h2>About US</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!--? About 1 Start-->
    <section class="about-low-area section-padding2">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-9">
                    <!-- about-img -->
                    <div class="about-img">
                        <img src="{{asset('front_end/img/gallery/about1.png')}}" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-10">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <h2>We listen and work together for Great experience.</h2>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,mod tempor incididunt ut labore et dolore magna aliqua. Utnixm, quis nostrud exercitation ullamc.</p> -->
                        </div>
                        <p>HiFi Net Service is a premium Fiber to the Home (FTTH) Internet, HD TV and Phone service
                            provider that enables you to experience seamless connectivity and entertainment with the
                            power of its 100% Fiber-Optic Network.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About  End-->
    <div class="bg-red py-5 mb-70">
        <div class="container py-5">
            <div class="text-center text-white mb-35" style="font-size: 40px;">Our Team</div>
            <div class="row text-center">

                <!-- Team item -->
                <div class="col-xl-3 col-sm-6 my-2">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{asset('front_end/img/11.jpg')}}" alt=""  style="object-fit: cover; width: 100px; height: 100px; object-position: top;" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0" style="font-weight: 800;">Syed Zubair Shah</h5><span class="small text-uppercase text-muted">Team Leader</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div><!-- End -->
                <!-- Team item -->
                <div class="col-xl-3 col-sm-6 my-2">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{asset('front_end/img/22.jpg')}}" alt=""  style="object-fit: cover; width: 100px; height: 100px; object-position: top;" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0"  style="font-weight: 800;">Shahmeer Malik</h5><span class="small text-uppercase text-muted">Team Member</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div><!-- End -->
                <!-- Team item -->
                <div class="col-xl-3 col-sm-6 my-2">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{asset('front_end/img/33.jpg')}}" alt=""  style="object-fit: cover; width: 100px; height: 100px; object-position: top;" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0"  style="font-weight: 800;">Abaidullah</h5><span class="small text-uppercase text-muted">Team Member</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div><!-- End -->
                <!-- Team item -->
                <div class="col-xl-3 col-sm-6 my-2">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{asset('front_end/img/11.jpg')}}" alt=""  style="object-fit: cover; width: 100px; height: 100px; object-position: top;" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0"  style="font-weight: 800;">Saith Usama</h5><span class="small text-uppercase text-muted">Team Member</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div><!-- End -->
            </div>
        </div>
    </div>
    <!-- Latest Offers End -->
    <!--? About-2 Area Start -->
    <section class="about-area2 testimonial-area section-padding30 fix">
        <div class="container">
            <div class="row align-items-center">
                <div class=" col-lg-6 col-md-9 col-sm-9">
                    <div class="about-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-55">
                            <h2>What our clint think about us!</h2>
                        </div>
                        <!-- Testimonial Start -->
                        <div class="h1-testimonial-active">
                            <!-- Single Testimonial -->
                            <div class="single-testimonial">
                                <div class="testimonial-caption">
                                    <p>Brook presents your services with flexible, convenient and cdpose layouts. You
                                        can select your favorite layouts & elements for cular ts with unlimited
                                        ustomization possibilities. Pixel-perfect replica;ition of thei designers ijtls
                                        intended csents your se.</p>
                                    <div class="rattiong-caption">
                                        <span>Jhon Smith<span>Gym Trainer</span> </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial">
                                <div class="testimonial-caption">
                                    <p>Brook presents your services with flexible, convenient and cdpose layouts. You
                                        can select your favorite layouts & elements for cular ts with unlimited
                                        ustomization possibilities. Pixel-perfect replica;ition of thei designers ijtls
                                        intended csents your se.</p>
                                    <div class="rattiong-caption">
                                        <span>Jhon Smith<span>Gym Trainer</span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Testimonial End -->
                    </div>
                </div>
                <div class="col-lg-5 col-md-11 col-sm-11">
                    <!-- about-img -->
                    <div class="about-img2">
                        <img src="{{asset('front_end/img/gallery/about2.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-2 Area End -->
</main>

@endsection
