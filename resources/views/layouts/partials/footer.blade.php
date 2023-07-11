<footer>
    <!--? Footer Start-->
    <div class="footer-area section-bg" data-background="{{ asset('front_end/img/gallery/footer_bg.png') }}">
        <div class="container">
            <!-- Brand Area End -->
            <div class="footer-top footer-padding">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="{{ asset('front_end/img/hifi-1.png') }}"
                                        alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p class="info1">Receive updates and latest news direct from Simply enter.</p>
                                </div>
                            </div>
                            <div class="footer-number">
                                <h4><span>+92 </span>3070624199</h4>
                                <p>sm.scat96@gmail.com </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Our Support</h4>
                                <ul>
                                    <li><a href="#">Advanced</a></li>
                                    <li><a href="#"> Management</a></li>
                                    <li><a href="#">Corporate</a></li>
                                    <li><a href="#">Customer</a></li>
                                    <li><a href="#">Information</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Link</h4>
                                <ul>
                                    <li><a href="{{ route('main') }}">Home</a></li>
                                    <li><a href="{{ route('pages.about') }}">About</a></li>
                                    <li><a href="{{ route('pages.service') }}">Package</a></li>
                                    <li><a href="{{ route('pages.privacy') }}">Privacy Policy</a></li>
                                    <li><a href="{{ route('pages.contact') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Newslatter</h4>
                                <div class="footer-pera">
                                    <p class="info1">Subscribe now to get daily updates</p>
                                </div>
                            </div>
                            <!-- Form -->
                            <div class="footer-form">
                                <div id="">
                                    <form action="{{ route('daily_updates.store') }}" method="post">
                                        @csrf
                                        <input type="email" name="email" id="email"
                                            placeholder=" Email Address " class="placeholder hide-on-focus"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Your email address'" required>
                                        @if ($errors->has('email'))
                                            <span class="text-white">{{ $errors->first('email') }}</span>
                                        @endif
                                        <div class="form-icon">
                                            <button type="submit" class="email_icon">
                                                Send
                                            </button>
                                        </div>
                                        <div class="mt-10 info"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="footer-copy-right">
                            <p>
                                Copyright &copy; HiFi Net Services
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <!-- Footer Social -->
                        <div class="footer-social f-right">
                            <a href="https://twitter.com/hifi_services" target="_blank"><i
                                    class="fab fa-twitter"></i></a>
                            <a href="https://www.facebook.com/profile.php?id=100089011367917" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/hifinetservices/" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                            <a href=" https://wa.me/03070624199" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

<!-- Scroll Up -->
<div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>
