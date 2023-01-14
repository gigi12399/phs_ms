@extends('frontendTemplate.layout')
@section('title', 'contact')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Contact</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{route('frontend')}}">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="{{route('team')}}">Our Team</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-danger px-3">Contact Us</h6>
                <h1 class="mb-5">Contact For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Address</h5>
                            <p class="mb-0">No.142, 146 Sule Pagoda Road, Kyauktada Township, Yangon.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Mobile</h5>
                            <p class="mb-0">09-794567890</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Email</h5>
                            <p class="mb-0">info@genius.edu.mm</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3820.004696980908!2d96.15686231485392!3d16.776441924552525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ede079b3e5b5%3A0x844494bfe4dcd155!2sStrategy%20First%20University%20-%20Sule%20Campus!5e0!3m2!1sen!2smm!4v1672337059784!5m2!1sen!2smm" 
                        width="600" 
                        height="450" 
                        style="border:0;"
                         allowfullscreen="" 
                         loading="lazy" 
                         referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection