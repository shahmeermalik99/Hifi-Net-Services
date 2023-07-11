@extends('master')

@section('content')

<main>
    <!--? Pricing Card Start -->
    <section class="pricing-card-area section-padding2">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center mt-5">
                <div class="col-xl-6 col-lg-8 col-md-10 col-sm-10">
                    <div class="section-tittle text-center mb-100">
                        <p>Our pricing plan for you</p>
                        <h2>No hidden charges! choose  your plan wisely.</h2>
                    </div>
                </div>
            </div>
            @php
            use App\Models\Package; 
            $package = Package::get();
         @endphp
         <div class="row">
         @foreach ($package as $package)
             <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10 {{$package->id==26?'order-1':'order-2'}}">
                 <div class="single-card text-center mb-30">
                     <div class="card-top">
                         {{-- <p>Single Package</p> --}}
                         {{-- <h4>Only Broadband connectio</h4> --}}
                         <img src="{{asset('uploads/images/'.$package->image)}}" alt="">
                     </div>
                     <div class="card-mid">
                         <h4>Rs{{$package->fee}}<span> / mo</span></h4>
                     </div>
                     <div class="card-bottom">
                         <ul>
                             <li>{{$package->description}}</li>
                             <li>Unlimited Download</li>
                             <li>Quality Video Streaming</li>
                             <li>Enjoy family on weekends</li>
                         </ul>
                         <a href="{{route('dashboard')}}" class="borders-btn">Subcribe Now</a>
                     </div>
                 </div>
             </div>
             @endforeach
         </div>
        </div>
    </section>
    <!-- Pricing Card End -->
    <!-- Latest Offers Start -->
    {{-- <div class="latest-wrapper pb-bottom">
        <div class="container">
            <div class="latest-area latest-height  section-bg2" data-background="{{asset('front_end/img/gallery/section_bg01.png')}}">
                <div class="row  align-items-center justify-content-between">
                    <div class="col-xl-5 col-lg-7">
                        <div class="latest-caption">
                            <h2>Check our unbelievable super  fast Broadband availability in your area.</h2>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-10 ">
                        <div class="latest-subscribe">
                            <form action="#">
                                <input type="email" placeholder="Enter Zipcode">
                                <button>Check Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Latest Offers End -->
</main>
@endsection