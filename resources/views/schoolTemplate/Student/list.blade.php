@extends('schoolTemplate.layout')
@section('title', 'Student')
@section('content')
    <h1>Student Lists</h1>
    <!-- Responsive Table -->
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
                    <th>{{$key+1}}</th>
                    <td>{{$student->name}}</td>
                    <th>
                      <img width="50" height="50" src="{{asset('school/profile/student/'.$student->id.'/'.$student->profile)}}" alt="">
                    </th>
                    <td>
                      @foreach ($student->student_histories as $item)
                          {{$item->academic_year->year_one}} ~ {{$item->academic_year->year_two}} <br>
                      @endforeach
                    </td>
                    <td>
                      @foreach ($student->student_histories as $item)
                        {{$item->section->grade->name}} <br>
                      @endforeach
                    </td>
                    <td>
                      @foreach ($student->student_histories as $item)
                        {{$item->section->name}} <br>
                      @endforeach
                    </td>
                    
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
@endsection