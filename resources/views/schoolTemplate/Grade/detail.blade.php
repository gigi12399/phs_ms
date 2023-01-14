@extends('schoolTemplate.layout')
@section('title', 'Grade Detail')
@section('content')
<div class="row">
  <div class="col">
    <h1>All Data Lists of {{$grade->name}}</h1>
  </div>
  <div class="col">
    <a href="{{ route('grade.index') }}" class="btn rounded-pill btn-primary float-end" style="margin:1rem;">Back</a>
  </div>
</div>
    
    
    <div class="d-flex justify-content-center">
      <div class="col-4">
        <div class="card my-4">
          <div class="card-body">
            <h4 class="card-title text-center">All About Grade</h4>
                <div class="row my-4">
                  <div class="col">
                    <h5 class="card-text">Grade : <span class="text-muted">{{$grade->name}}</span></h5>
                    <h5 class="card-text">Sections : 
                      <span class="text-muted">
                        @foreach ($grade->sections as $section)
                          {{$section->name}},
                        @endforeach
                      </span>
                    </h5>
                    <h5 class="card-text">Teachers : <span class="text-muted">{{count($grade->teachers)}}</span></h5>
                  </div>
                  <div class="col">
                    <h5 class="card-text">Students : <span class="text-muted">{{count($students)}}</span></h5>
                    <h5 class="card-text">Subjects : <span class="text-muted">{{count($subjects)}}</span></h5>
                  </div>
                </div>
            <div class="row mt-4 text-center">
              <div class="col-3">
                <button class="btn btn-primary text-white btn-sm sectionBtn">Sections</button>
              </div>
              <div class="col-3">
                <button class="btn btn-primary text-white btn-sm teacherBtn">Teachers</button>
              </div>
              <div class="col-3">
                <button class="btn btn-primary text-white btn-sm studentBtn">Students</button>
              </div>
              <div class="col-3">
                <button class="btn btn-primary text-white btn-sm subjectBtn">Subjects</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    {{-- Sections --}}
    <div class="container" id="section">
      <div class="divider">
        <div class="divider-text">
          <i class="bx bx-star"></i>
        </div>
      </div>
      <div class="card">
        <div class="row">
            <div class="col">
                <h5 class="card-header">Sections</h5>
            </div>
            <div class="col">
                <a href="{{ route('section.create') }}" class="btn rounded-pill btn-primary float-end" style="margin:1rem;">Create New</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped table-hover">
            <thead>
              <tr class="text-nowrap">
                <th>No</th>
                <th>Section</th>
                <th>Grade</th>
                <th>No of Students</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($grade->sections as $key=>$section)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>Section-{{$section->name}}</td>
                    <th>{{$section->grade->name}}</th>
                    <td>{{count($section->student_histories)}}</td>
                    <td>{{$section->description}}</td>
                    <td>
                        <form action="{{ route('section.destroy', $section->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('section.edit', $section->id) }}" class="btn rounded-pill btn-warning btn-sm">Edit</a>
                            @if (count($section->student_histories) == 0)
                            <button type="submit" class="btn rounded-pill btn-danger btn-sm ms-3" onclick="return confirm('Are You Sure to Delete!!');">Delete</button>
                            @else
                            <a href="{{ route('section.show', $section->id) }}" class="btn rounded-pill btn-info btn-sm ms-3">Detail</a>
                            @endif
                        </form>
                    </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- Teachers --}}
    <div class="container" id="teacher">
      <div class="divider">
        <div class="divider-text">
          <i class="bx bx-star"></i>
        </div>
      </div>
      <div class="card">
        <div class="row">
            <div class="col">
                <h5 class="card-header">Teachers</h5>
            </div>
            <div class="col">
                <a href="{{ route('teacher.create') }}" class="btn rounded-pill btn-primary float-end" style="margin:1rem;">Create New</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped table-hover">
            <thead>
              <tr class="text-nowrap">
                <th>No</th>
                <th>Name</th>
                <th>Profile</th>
                <th>Grades</th>
                <th>Phone</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($grade->teachers as $key=>$teacher)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>{{$teacher->name}}</td>
                    <th>
                      <img width="50" height="50" src="{{asset('school/profile/teacher/'.$teacher->id.'/'.$teacher->profile)}}" alt="">
                    </th>
                    <td>@foreach ($teacher->grades as $grade)
                      {{ $grade->name }},
                    @endforeach</td>
                    <td>{{$teacher->phone}}</td>
                    <td>
                        <form action="{{ route('teacher.destroy', $teacher->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn rounded-pill btn-warning btn-sm">Edit</a>
                            <a href="{{ route('teacher.show', $teacher->id) }}" class="btn rounded-pill btn-info btn-sm ms-3">Detail</a>
                            <button type="submit" class="btn rounded-pill btn-danger btn-sm ms-3" onclick="return confirm('Are You Sure to Delete!!');">Delete</button>
                        </form>
                    </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- Students --}}
    <div class="container" id="student">
      <div class="divider">
        <div class="divider-text">
          <i class="bx bx-star"></i>
        </div>
      </div>
      <div class="card">
        <div class="row">
            <div class="col">
                <h5 class="card-header">Students</h5>
            </div>
            <div class="col">
                <a href="{{ route('student.create') }}" class="btn rounded-pill btn-primary float-end" style="margin:1rem;">Create New</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped table-hover">
            <thead>
              <tr class="text-nowrap">
                <th>No</th>
                <th>Name</th>
                <th>Profile</th>
                <th>Academic Year</th>
                <th>Grade</th>
                <th>Section</th>
                <th>Birthday</th>
                <th>Phone</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($students as $key=>$student)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$student->name}}</td>
                    <td>
                      <img width="50" height="50" src="{{asset('school/profile/student/'.$student->id.'/'.$student->profile)}}" alt="">
                    </td>
                    @foreach ($student->student_histories as $history)
                        @foreach ($grade->sections as $section)
                            @if ($history->section_id == $section->id)
                                <td>{{$history->academic_year->year_one}}~{{$history->academic_year->year_two}}</td>
                                <td>{{$grade->name}}</td>
                                <td>{{$section->name}}</td>
                            @endif
                        @endforeach
                    @endforeach
                    <td>{{ date('d-m-Y', strtotime( $student->birthday )) }}</td>
                    <td>{{$student->phone}}</td>
                    <td>
                        <form action="{{ route('student.destroy', $student->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('student.edit', $student->id) }}" class="btn rounded-pill btn-warning btn-sm">Edit</a>
                            <a href="{{ route('student.show', $student->id) }}" class="btn rounded-pill btn-info btn-sm ms-3">Detail</a>
                            <button type="submit" class="btn rounded-pill btn-danger btn-sm ms-3" onclick="return confirm('Are You Sure to Delete!!');">Delete</button>
                        </form>
                    </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- Subjects --}}
    <div class="container" id="subject">
      <div class="divider">
        <div class="divider-text">
          <i class="bx bx-star"></i>
        </div>
      </div>
      <div class="card">
        <div class="row">
            <div class="col">
                <h5 class="card-header">Subjects</h5>
            </div>
            <div class="col">
                <a href="{{ route('subject.create') }}" class="btn rounded-pill btn-primary float-end" style="margin:1rem;">Create New</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped table-hover">
            <thead>
              <tr class="text-nowrap">
                <th>No</th>
                <th>Name</th>
                <th>Teachers</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $key=>$subject)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>{{$subject->name}}</td>
                    <td>@foreach ($subject->teachers as $teacher)
                      @foreach ($teacher->grades as $t_grade)
                        @if($grade->id == $t_grade->id)
                          {{$teacher->name}},
                        @endif
                      @endforeach
                    @endforeach</td>
                    <td>
                        <form action="{{ route('subject.destroy', $subject->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('subject.edit', $subject->id) }}" class="btn rounded-pill btn-warning btn-sm">Edit</a>
                            <button type="submit" class="btn rounded-pill btn-danger btn-sm ms-3" onclick="return confirm('Are You Sure to Delete!!');">Delete</button>
                        </form>
                    </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @section('script')
    <script>
      $(document).ready(function(){
        $('#teacher').hide();
        $('#student').hide();
        $('#subject').hide();
        $('button.teacherBtn').on('click',function(){
          $('#section').hide();
          $('#teacher').show();
          $('#student').hide();
          $('#subject').hide();
        });
        $('button.studentBtn').on('click',function(){
          $('#section').hide();
          $('#teacher').hide();
          $('#student').show();
          $('#subject').hide();
        });
        $('button.subjectBtn').on('click',function(){
          $('#section').hide();
          $('#teacher').hide();
          $('#student').hide();
          $('#subject').show();
        });
        $('button.sectionBtn').on('click',function(){
          $('#section').show();
          $('#teacher').hide();
          $('#student').hide();
          $('#subject').hide();
        });
      })
    </script>
    @endsection
@endsection