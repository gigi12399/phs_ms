@extends('frontendTemplate.layout')
@section('title', 'Home')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('school/frontend/img/school1.jpg')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-danger text-uppercase mb-3 animated slideInDown">{{$academic_year->year_one}} ~ {{$academic_year->year_two}} Academic Year</h5>
                                <h1 class="display-3 text-white animated slideInDown">Genius Private High School</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Genius is a private professional and higher educational private school, that has been providing a productive alternative to higher education since 2015.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('school/frontend/img/school2.jpg')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-danger text-uppercase mb-3 animated slideInDown">{{$academic_year->year_one}} ~ {{$academic_year->year_two}} Academic Year</h5>
                                <h1 class="display-3 text-white animated slideInDown">Genius Private High School</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Genius is a private professional and higher educational private school, that has been providing a productive alternative to higher education since 2019.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Skilled Teachers</h5>
                            <p>Genius members are diverse with different cultural backgrounds from different parts of Myanmar and the world. They are experienced, honourable and visionary players bringing with them their excellent knowledge and experiences from various fields of studies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Learning & Studying</h5>
                            <p>Studying will involve your participation in a wide range of teaching and learning activities. Lectures and seminars will take up some of your time but in addition you will be expected to engage in a range of activities designed to support and develop your learning.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Lectures & Tutorials</h5>
                            <p>Used to transfer and contextualise theoretical concepts relating to performance practice. Small group or individual discussions with a tutor, used to enhance understanding of practice and theoretical concepts through tutor’s feedback.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <h5 class="mb-3">Book Library</h5>
                            <p>The library contains a full range of texts. All core texts on the course will be available in the library. Genius is continually upgrading its library and providing updated books, reference materials and other supplemental study resources in various disciplines.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{asset('school/frontend/img/about1.jpg')}}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-danger pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to Genius</h1>
                    <p class="mb-4">Genius is a local higher education institution mandated to provide higher education in Myanmar. Its governance as well as management, teaching arrangements and expertise is designed towards attaining a world-class organization and meeting the interests of the country's wider community through producing an excellent group of well-rounded young professionals and leaders.</p>
                    <p class="mb-4">Genius's vision is to create a learning and teaching environment enriched with diverse perspectives where a school can change its students' lives and society, and to advance an intellectual environment to provide wide range of opportunities.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Teachers</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-danger me-2"></i>Book library</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-danger me-2"></i>International Certificate</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>School Activities</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-danger px-3">Activities</h6>
                <h1 class="mb-5">School Activities</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{asset('school/frontend/img/school_festival.jpg')}}" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">School Festival</h5>
                                    <small class="text-primary">12.04.2017</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{asset('school/frontend/img/school_trip.jpg')}}" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">School Trip</h5>
                                    <small class="text-primary">25.11.2018</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{asset('school/frontend/img/painting.jpg')}}" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Painting Contest</h5>
                                    <small class="text-primary">03.07.2016</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{asset('school/frontend/img/sport_activity.jpg')}}" alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                            <h5 class="m-0">Sport Activity</h5>
                            <small class="text-primary">21.12.2029</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Start -->


    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-danger px-3">Info</h6>
                <h1 class="mb-5">School Informations</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{asset('school/frontend/img/course-8.jpg')}}" alt="">
                            
                        </div>
                        <div class="text-center p-4 pb-2">
                            <h3 class="mb-2">Teachers</h3>
                            <h5 class="mb-4">Total ~ {{count($teachers)}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{asset('school/frontend/img/classroom.jpg')}}" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Grades</a>
                                <a class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Total ~ {{count($grades)}}</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-2">
                            <h3 class="mb-2">Sections</h3>
                            <h5 class="mb-4">Total ~ {{count($sections)}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{asset('school/frontend/img/student.jpg')}}" alt="">
                            
                        </div>
                        <div class="text-center p-4 pb-2">
                            <h3 class="mb-2">Students</h3>
                            <h5 class="mb-4">Total ~ {{count($students)}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-danger px-3">Teachers</h6>
                <h1 class="mb-5">Expert Teachers</h1>
            </div>
            <div class="row g-4">
                @for ($i = 0; $i < 4; $i++)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset("school/profile/teacher/" . $teachers[$i]->id . '/' . $teachers[$i]->profile )}}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <h5 class="bg-primary text-light mx-1 px-3 py-2">{{$teachers[$i]->name}}</h5>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            
                            <small>{{$teachers[$i]->degree}}</small> <br>
                            <small>
                                @foreach ($teachers[$i]->grades as $grade)
                                    {{ $grade->name }},
                                @endforeach
                            </small>
                        </div>
                    </div>
                </div>
                @endfor
                
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-danger px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset("school/profile/student/" . $students[0]->id . '/' . $students[0]->profile )}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">{{$students[0]->name}}</h5>
                    <p>{{$students[0]->student_histories[count($students[0]->student_histories)-1]->section->grade->name}}({{$students[0]->student_histories[count($students[0]->student_histories)-1]->section->name}})</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">"စာသင်ပြတာကောင်းတဲ့အပြင်ကိုself-studyအချိန်တွေမှာလည်းစာလုပ်ရင်းမသိတာရှိရင်မေးပြီးစာလုပ်လို့ရတာအရမ်းကြိုက်ပါတယ်။"</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset("school/profile/student/" . $students[1]->id . '/' . $students[1]->profile )}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">{{$students[1]->name}}</h5>
                    <p>{{$students[1]->student_histories[count($students[1]->student_histories)-1]->section->grade->name}}({{$students[1]->student_histories[count($students[1]->student_histories)-1]->section->name}})</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">"ဆရာဆရာမတွေလည်းအသင်အပြကောင်းပြီးတော့မေးခွန်းတွေကိုလည်းစိတ်ရှည်ရှည်နဲ့သေသေချာချာရှင်းပြပေးပါတယ်။"</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset("school/profile/student/" . $students[2]->id . '/' . $students[2]->profile )}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">{{$students[2]->name}}</h5>
                    <p>{{$students[2]->student_histories[count($students[2]->student_histories)-1]->section->grade->name}}({{$students[2]->student_histories[count($students[2]->student_histories)-1]->section->name}})</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">"ကျောင်းfacilityတွေလည်းပြည့်စုံပြီးတော့ဆရာဆရာမတွေလည်းအသင်အပြကောင်းလို့ကျောင်းပျော်တဲ့ကျောင်းသားဖြစ်လာရပါတယ်။"</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset("school/profile/student/" . $students[3]->id . '/' . $students[3]->profile )}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">{{$students[3]->name}}</h5>
                    <p>{{$students[3]->student_histories[count($students[3]->student_histories)-1]->section->grade->name}}({{$students[3]->student_histories[count($students[3]->student_histories)-1]->section->name}})</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">“အချိန်က ရပ်တန့်မနေတဲ့အတွက် ကြိုးစားနေရမှာ လူတိုင်းတာဝန်ပါ။ ကြိုးစားတဲ့ နေရာမှာ
                        ကြုံလာတဲ့အခက်အခဲတွေကို ရင်ဆိုင်ကျော်ဖြတ်နိုင်ဖို့ အသိဉာဏ်၊ ပညာနဲ့ နည်းလမ်းတွေကို
                        Genius Private High School သင်ကြားပေးတဲ့အတွက်ကြောင့် ညီမဘဝအတွက် အရမ်းအထောက်အကူဖြစ်ပါတယ်။”</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection