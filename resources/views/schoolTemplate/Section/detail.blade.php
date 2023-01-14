@extends('schoolTemplate.layout')
@section('title', 'Section Details')
@section('content')
    <h1>{{$section->grade->name}}({{$section->name}})'s Student Lists</h1>
    <!-- Responsive Table -->
    <div class="card">
        <div class="row">
            <div class="col">
                <h5 class="card-header">Section-{{$section->name}}'s Students</h5>
            </div>
            <div class="col">
                <a href="{{ route('section.index') }}" class="btn rounded-pill btn-primary float-end" style="margin:1rem;">Back</a>
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
                @foreach ($section->student_histories as $key=>$std_history)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>{{$std_history->student->name}}</td>
                    <td>
                      <img width="50" height="50" src="{{asset('school/profile/student/'.$std_history->student->id.'/'.$std_history->student->profile)}}" alt="">
                    </td>
                    <td>
                      @foreach ($std_history->student->student_histories as $item)
                          {{$item->academic_year->year_one}} ~ {{$item->academic_year->year_two}} <br>
                      @endforeach
                    </td>
                    <td>
                      @foreach ($std_history->student->student_histories as $item)
                        {{$item->section->grade->name}} <br>
                      @endforeach
                    </td>
                    <td>
                      @foreach ($std_history->student->student_histories as $item)
                        {{$item->section->name}} <br>
                      @endforeach
                    </td>
                    
                    <td>{{ date('d-m-Y', strtotime( $std_history->student->birthday )) }}</td>
                    <td>{{$std_history->student->phone}}</td>
                    <td>
                        <form action="{{ route('student.destroy', $std_history->student_id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('student.edit', $std_history->student_id) }}" class="btn rounded-pill btn-warning btn-sm">Edit</a>
                            <a href="{{ route('student.show', $std_history->student_id) }}" class="btn rounded-pill btn-info btn-sm ms-3">Detail</a>
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