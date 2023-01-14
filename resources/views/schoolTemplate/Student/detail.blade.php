@extends('schoolTemplate.layout')
@section('title', 'Student Detail')
@section('content')
  <div class="row">
    <div class="col">
      <h1>Student {{$student->name}}'s Detail</h1>
  </div>
  <div class="col">
      <a href="{{ route('student.index')}}" class="btn rounded-pill btn-primary float-end">Back</a>
  </div>
  </div>
    
    <!-- Card -->
    <div class="d-flex justify-content-center">
      <div class="col-10">
        <div class="row mt-3">
          <div class="card h-100">
            <div class="card-body">
              <h4 class="card-title">Student {{ $student->name }}</h4>
              <img
                class="img-fluid d-flex mx-auto my-4 rounded"
                width="200"
                src="{{ asset("school/profile/student/".$student->id.'/'.$student->profile )}}"
                alt="Card image cap"
              />
              <div class="row mt-5">
                <div class="col">
                  <p class="card-text"><span class="text-uppercase">age : </span><span class="ms-2">{{ $student->age() }}</span></p>
                  <p class="card-text"><span class="text-uppercase">gender : </span><span class="ms-2">@if ($student->gender == 0)
                    {{'Female'}}
                @else
                    {{'Male'}}
                @endif</span></p>
                  <p class="card-text"><span class="text-uppercase">birthday : </span><span class="ms-2">{{date('d-m-Y', strtotime( $student->birthday ))}}</span></p>
                  <p class="card-text"><span class="text-uppercase">academic year : </span><span class="ms-2">
                    @foreach ($student->student_histories as $item)
                          {{$item->academic_year->year_one}} ~ {{$item->academic_year->year_two}},
                    @endforeach
                  </span></p>
                  <p class="card-text"><span class="text-uppercase">grade : </span><span class="ms-2">
                    @foreach ($student->student_histories as $item)
                        {{$item->section->grade->name}},
                    @endforeach
                  </span></p>
                  <p class="card-text"><span class="text-uppercase">section : </span><span class="ms-2">
                    @foreach ($student->student_histories as $item)
                      {{$item->section->name}},
                    @endforeach</span></p>
                </div>
                <div class="col">
                  <p class="card-text"><span class="text-uppercase">email : </span><span class="ms-2">{{ $student->email }}</span></p>
                  <p class="card-text"><span class="text-uppercase">phone : </span><span class="ms-2">{{ $student->phone }}</span></p>
                  <p class="card-text"><span class="text-uppercase">nrc : </span><span class="ms-2">{{ $student->nrc }}</span></p>
                  <p class="card-text"><span class="text-uppercase">address : </span><span class="ms-2">{{ $student->address }}</span></p>
                  <p class="card-text"><span class="text-uppercase">description : </span><span class="ms-2">{{ $student->info }}</span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
@endsection