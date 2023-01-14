@extends('schoolTemplate.layout')
@section('title', 'Subject')
@section('content')
    <h1>Subject Lists</h1>
    <!-- Responsive Table -->
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
                        {{$teacher->name}},
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
@endsection