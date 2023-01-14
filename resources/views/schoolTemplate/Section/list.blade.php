@extends('schoolTemplate.layout')
@section('title', 'Section')
@section('content')
    <h1>Section Lists</h1>
    <!-- Responsive Table -->
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
                @foreach ($sections as $key=>$section)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>Section-{{$section->name}}</td>
                    <td>{{$section->grade->name}}</td>
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
@endsection