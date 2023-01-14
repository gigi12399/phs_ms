@extends('schoolTemplate.layout')
@section('title', 'Grades')
@section('content')
    <h1>Grade Lists</h1>
    <!-- Responsive Table -->
    <div class="card">
        <div class="row">
            <div class="col">
                <h5 class="card-header">Grades</h5>
            </div>
            <div class="col">
                <a href="{{ route('grade.create') }}" class="btn rounded-pill btn-primary float-end" style="margin:1rem;">Create New</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped table-hover">
            <thead>
              <tr class="text-nowrap">
                <th>No</th>
                <th>Name</th>
                <th>No of Sections</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($grades as $key=>$grade)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>{{$grade->name}}</td>
                    <td>{{count($grade->sections)}}</td>
                    <td>
                        <form action="{{ route('grade.destroy', $grade->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('grade.edit', $grade->id) }}" class="btn rounded-pill btn-warning btn-sm">Edit</a>
                            @if (count($grade->sections) == 0)
                            <button type="submit" class="btn rounded-pill btn-danger btn-sm ms-3" onclick="return confirm('Are You Sure to Delete!!');">Delete</button>
                            @else
                            <a href="{{ route('grade.show', $grade->id) }}" class="btn rounded-pill btn-info btn-sm ms-3">Detail</a>
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