@extends('schoolTemplate.layout')
@section('title', 'Academic Year')
@section('content')
    <h1>Academic Year Lists</h1>
    <!-- Responsive Table -->
    <div class="card">
        <div class="row">
            <div class="col">
                <h5 class="card-header">Academic Years</h5>
            </div>
            <div class="col">
                <a href="{{ route('academic.create') }}" class="btn rounded-pill btn-primary float-end" style="margin:1rem;">Create New</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped table-hover">
            <thead>
              <tr class="text-nowrap">
                <th>No</th>
                <th>Year One</th>
                <th>Year Two</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($academicYears as $key=>$academic)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>{{$academic->year_one}}</td>
                    <td>{{$academic->year_two}}</td>
                    <td>
                        <form action="{{route('academic.destroy', $academic->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('academic.edit', $academic->id) }}" class="btn rounded-pill btn-warning btn-sm">Edit</a>
                            <button type="submit" class="btn rounded-pill btn-danger btn-sm ms-3" onclick="return confirm('Are you sure to delete!!');">Delete</button>

                        </form>
                    </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
@endsection