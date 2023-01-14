@extends('frontendTemplate.layout')
@section('title', 'Team')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Our Team</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{route('frontend')}}">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="{{route('contact')}}">Contact</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-danger px-3">Teachers</h6>
                <h1 class="mb-5">Expert Teachers</h1>
            </div>
            <div class="row g-4">
                @foreach ($teachers as $teacher)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset("school/profile/teacher/" . $teacher->id . '/' . $teacher->profile )}}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <h5 class="bg-primary text-light mx-1 px-3 py-2">{{$teacher->name}}</h5>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            
                            <small>{{$teacher->degree}}</small> <br>
                            <small>
                                @foreach ($teacher->grades as $grade)
                                    {{ $grade->name }},
                                @endforeach
                            </small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection