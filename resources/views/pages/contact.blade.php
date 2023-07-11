@extends('master')

@section('content')
    <main>
        <!--? Hero Start -->
        <div class="slider-area121">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-50 text-center">
                                <h2>Contact Us</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--?  Contact Area start  -->
        <section class="contact-section">
            <div class="container">
                <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    id="gmap_canvas"
                    src="https://maps.google.com/maps?&amp;hl=en&amp;q=%20Gujranwala+()&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title mt-5">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('pages.contactstore') }}" class="form-contact" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                            placeholder=" Enter Message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text"
                                            placeholder="Enter your name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email"
                                            placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control contact" id="contact" name="contact"
                                            placeholder="Phone Number" max="11" type="tel" pattern="^\d{4}-\d{7}$"
                                            data-inputmask="'mask': '0399-99999999'" type="number" maxlength="12" required
                                            value="{{ old('contact') }}">
                                        <span>Format (0300-0000000)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Pakistan, Punjab.</h3>
                                <p>Gujranwala</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+92 307 0624 199</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>sm.scat96@gmail.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Area End -->
    </main>
    <script>
        $(":input").inputmask();
    </script>
@endsection
