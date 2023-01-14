@extends('schoolTemplate.layout')
@section('title', 'Teacher Detail')
@section('content')
  <div class="row">
    <div class="col">
      <h1>Teacher {{$teacher->name}}'s Detail</h1>
  </div>
  <div class="col">
      <a href="{{ route('teacher.index')}}" class="btn rounded-pill btn-primary float-end">Back</a>
  </div>
  </div>
    
    <!-- Card -->
    <div class="d-flex justify-content-center">
      <div class="col-10">
        <div class="row mt-3">
          <div class="card h-100">
            <div class="card-body">
              <h4 class="card-title">Teacher {{ $teacher->name }} ({{$teacher->degree}})</h4>
              <img
                class="img-fluid d-flex mx-auto my-4 rounded"
                width="200"
                src="{{ asset("school/profile/teacher/".$teacher->id.'/'.$teacher->profile )}}"
                alt="Card image cap"
              />
              <div class="row mt-5">
                <div class="col">
                  <p class="card-text"><span class="text-uppercase">age : </span><span class="ms-2">{{ $teacher->age() }}</span></p>
                  <p class="card-text"><span class="text-uppercase">gender : </span><span class="ms-2">@if ($teacher->gender == 0)
                      {{'Female'}}
                  @else
                      {{'Male'}}
                  @endif</span></p>
                  <p class="card-text"><span class="text-uppercase">birthday : </span><span class="ms-2">{{ date('d-m-Y',strtotime($teacher->birthday)) }}</span></p>
                  <p class="card-text"><span class="text-uppercase">phone : </span><span class="ms-2">{{ $teacher->phone }}</span></p>
                  <p class="card-text"><span class="text-uppercase">address : </span><span class="ms-2">{{ $teacher->address }}</span></p>
                </div>
                <div class="col">
                  <p class="card-text"><span class="text-uppercase">grades : </span><span class="ms-2">@foreach ($teacher->grades as $grade)
                    {{ $grade->name }},
                  @endforeach</span></p>
                  <p class="card-text"><span class="text-uppercase">nrc : </span><span class="ms-2">{{ $teacher->nrc }}</span></p>
                  <p class="card-text"><span class="text-uppercase">email : </span><span class="ms-2">{{ $teacher->email }}</span></p>
                  <p class="card-text"><span class="text-uppercase">salary : </span><span class="ms-2">{{ $teacher->salary }}</span></p>
                  <p class="card-text"><span class="text-uppercase">description : </span><span class="ms-2">{{ $teacher->description }}</span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
@endsection