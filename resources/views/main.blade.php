@extends('master')

@section('content')
    <main>
        <!-- slider Area Start-->

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('slider-image/FYPs1.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('slider-image/FYPs2.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('slider-image/FYPs3.jpg') }}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- slider Area End-->
        <!--? About 1 Start-->
        <section class="about-low-area section-padding2">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-6 col-lg-6 col-md-9">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" style="border: 1px solid;border-radius: 20px;"
                                        src="slider-image/ss4.jpg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" style="border: 1px solid;border-radius: 20px;"
                                        src="slider-image/ss2.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" style="border: 1px solid;border-radius: 20px;"
                                        src="slider-image/ss3.jpg" alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" style="border: 1px solid;border-radius: 20px;"
                                        src="slider-image/ss1.jpg" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-10">
                        <div class="about-caption mb-50">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-35">
                                <h2>We listen and work together for Great experience.</h2>
                            </div>
                            <p>HiFi Net Service is a premium Fiber to the Home (FTTH) Internet, HD TV and Phone service
                                provider that enables you to experience seamless connectivity and entertainment with the
                                power of its 100% Fiber-Optic Network.</p>
                        </div>
                        <a href="{{ route('pages.about') }}" class="btn">About US</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- About  End-->
        <!--? service Area Start -->
        <section class="service-area pb-bottom">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6 col-md-9">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-50">
                            <h2 class="mb-35">Mission is to bring all the power of every business.</h2>
                            <p>Enjoy seamless internet experiences with HiFi Net Service Unlimited Internet around the
                                clock. Enjoy Unlimited gaming, browsing, and streaming on the go with Fatest services.</p>
                            <a href="{{ route('pages.service') }}" class="btn  mt-30">View Packages</a>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-4 col-sm-6">
                                <div class="single-services mb-30 text-center">
                                    <i class="flaticon-null"></i>
                                    <p>Perfect in Coverage</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-6">
                                <div class="single-services mb-30 text-center">
                                    <i class="flaticon-null-1"></i>
                                    <p>Get Internet Support</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-6">
                                <div class="single-services mb-30 text-center">
                                    <i class="flaticon-null-2"></i>
                                    <p>Secured Payment</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-6">
                                <div class="single-services mb-30 text-center">
                                    <i class="flaticon-null-3"></i>
                                    <p>1 Gbps Data Rate</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service Area End -->
        <!--? Pricing Card Start -->
        <section class="pricing-card-area section-padding2">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10 col-sm-10">
                        <div class="section-tittle text-center mb-100">
                            <p>Our pricing plan for you</p>
                            <h2>No hidden charges! choose your plan wisely.</h2>
                        </div>
                    </div>
                </div>
                @php
                    use App\Models\Package;
                    $package = Package::limit(6)->get();
                @endphp
                <div class="row">
                    @foreach ($package as $package)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                            <div class="single-card text-center mb-30">
                                <div class="card-top">
                                    <img src="{{ asset('uploads/images/' . $package->image) }}" alt="">
                                </div>
                                <div class="card-mid">
                                    <h4>Rs{{ $package->fee }}<span>/ mo</span></h4>
                                </div>
                                <div class="card-bottom">
                                    <ul>
                                        <li>{{ $package->description }}</li>
                                        <li>Unlimited Download</li>
                                        <li>Quality Video Streaming</li>
                                        <li>Enjoy family on weekends</li>
                                    </ul>
                                    <a href="{{ route('dashboard') }}" class="borders-btn">Subcribe Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <center>
                    <a href="{{ route('pages.service') }}" class="btn header-btn mt-5">View More Packages</a>
                </center>
            </div>
        </section>
        <!-- Pricing Card End -->
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
                            <img src="{{ asset('front_end/img/gallery/about2.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About-2 Area End -->
        <!--? Blog Area Start -->
        <div class="bg-red py-5 mb-70">
            <div class="container py-5">
                <div class="text-center text-white mb-35" style="font-size: 40px;">Our Team</div>
                <div class="row text-center">

                    <!-- Team item -->
                    <div class="col-xl-3 col-sm-6 my-2">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('front_end/img/11.jpg') }}"
                                alt=""
                                style="object-fit: cover; width: 100px; height: 100px; object-position: top;"
                                class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0" style="font-weight: 800;">Syed Zubair Shah</h5><span
                                class="small text-uppercase text-muted">Team Leader</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- End -->
                    <!-- Team item -->
                    <div class="col-xl-3 col-sm-6 my-2">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('front_end/img/22.jpg') }}"
                                alt=""
                                style="object-fit: cover; width: 100px; height: 100px; object-position: top;"
                                class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0" style="font-weight: 800;">Shahmeer Malik</h5><span
                                class="small text-uppercase text-muted">Team Member</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- End -->
                    <!-- Team item -->
                    <div class="col-xl-3 col-sm-6 my-2">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('front_end/img/33.jpg') }}"
                                alt=""
                                style="object-fit: cover; width: 100px; height: 100px; object-position: top;"
                                class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0" style="font-weight: 800;">Abaidullah</h5><span
                                class="small text-uppercase text-muted">Team Member</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- End -->
                    <!-- Team item -->
                    <div class="col-xl-3 col-sm-6 my-2">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('front_end/img/11.jpg') }}"
                                alt=""
                                style="object-fit: cover; width: 100px; height: 100px; object-position: top;"
                                class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0" style="font-weight: 800;">Saith Usama</h5><span
                                class="small text-uppercase text-muted">Team Member</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- End -->
                </div>
            </div>
        </div>
        <!-- Blog Area End -->
    </main>
@endsection
