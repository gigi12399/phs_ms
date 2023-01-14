@extends('schoolTemplate.layout')
@section('title', 'Teacher')
@section('content')
    <h1>Teacher Lists</h1>
    <!-- Responsive Table -->
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
                @foreach ($teachers as $key=>$teacher)
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
@endsection