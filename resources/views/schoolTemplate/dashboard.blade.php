@extends('schoolTemplate.layout')
@section('title','Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-8 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">Welcome To Genius! 🎉</h5>
              <p class="mb-4">
                Our private high school <span class="fw-bold">Genius</span> is Lorem ipsum dolor sit amet consectetur adipisicing elit
              </p>
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img
                src="{{asset('school/assets/img/illustrations/man-with-laptop-light.png')}}"
                height="140"
                alt="View Badge User"
                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                data-app-light-img="illustrations/man-with-laptop-light.png"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img
                    src="{{asset('school/assets/img/icons/unicons/grades.png')}}"
                    alt="chart success"
                    class="rounded"
                  />
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt3"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                    <a class="dropdown-item" href="{{route('grade.index')}}">View More</a>
                    <a class="dropdown-item" href="{{route('grade.create')}}">Create New</a>
                  </div>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Grades</span>
              <h3 class="card-title mb-2">Total : {{count($grades)}}</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img
                    src="{{asset('school/assets/img/icons/unicons/sections.png')}}"
                    alt="Credit Card"
                    class="rounded"
                  />
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt6"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                    <a class="dropdown-item" href="{{route('section.index')}}">View More</a>
                    <a class="dropdown-item" href="{{route('section.create')}}">Create New</a>
                  </div>
                </div>
              </div>
              <span>Sections</span>
              <h3 class="card-title text-nowrap mb-1">Total : {{count($sections)}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Total Revenue -->
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
      <div class="card">
        <div class="row row-bordered g-0">
          <div class="col-md-8">
            <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
            <div id="totalRevenueChart" class="px-2"></div>
          </div>
          <div class="col-md-4">
            <div class="card-body">
              <div class="text-center">
                <div class="dropdown">
                  <button
                    class="btn btn-sm btn-outline-primary dropdown-toggle"
                    type="button"
                    id="growthReportId"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    2022
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                    <a class="dropdown-item" href="javascript:void(0);">2021</a>
                    <a class="dropdown-item" href="javascript:void(0);">2020</a>
                    <a class="dropdown-item" href="javascript:void(0);">2019</a>
                  </div>
                </div>
              </div>
            </div>
            <div id="growthChart"></div>
            <div class="text-center fw-semibold pt-3 mb-2">62% School Growth</div>

            <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
              <div class="d-flex">
                <div class="me-2">
                  <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                </div>
                <div class="d-flex flex-column">
                  <small>2022</small>
                  <h6 class="mb-0">70%</h6>
                </div>
              </div>
              <div class="d-flex">
                <div class="me-2">
                  <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                </div>
                <div class="d-flex flex-column">
                  <small>2021</small>
                  <h6 class="mb-0">80%</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Total Revenue -->
    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
      <div class="row">
        <div class="col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{asset('school/assets/img/icons/unicons/teachers.png')}}" alt="Credit Card" class="rounded" />
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt4"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                    <a class="dropdown-item" href="{{route('teacher.index')}}">View More</a>
                    <a class="dropdown-item" href="{{route('teacher.create')}}">Create New</a>
                  </div>
                </div>
              </div>
              <span class="d-block mb-1">Teachers</span>
              <h3 class="card-title text-nowrap mb-2">Total : {{count($teachers)}}</h3>
            </div>
          </div>
        </div>
        <div class="col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{asset('school/assets/img/icons/unicons/students.png')}}" alt="Credit Card" class="rounded" />
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt1"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="cardOpt1">
                    <a class="dropdown-item" href="{{route('student.index')}}">View More</a>
                    <a class="dropdown-item" href="{{route('student.create')}}">Create New</a>
                  </div>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Students</span>
              <h3 class="card-title mb-2">Total : {{count($students)}}</h3>
            </div>
          </div>
        </div>
        <!-- </div>
<div class="row"> -->
          <div class="card mt-4">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{asset('school/assets/img/icons/unicons/subjects.png')}}" alt="Credit Card" class="rounded" />
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt1"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                      <a class="dropdown-item" href="{{route('subject.index')}}">View More</a>
                      <a class="dropdown-item" href="{{route('subject.create')}}">Create New</a>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                    <span class="fw-semibold d-block mb-1">Subjects</span>
                    <h3 class="card-title mb-2">Total : {{count($subjects)}}</h3>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection