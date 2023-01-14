@extends('schoolTemplate.layout')
@section('title', 'Day')
@section('content')
    <h1>Day Lists</h1>
    <!-- Responsive Table -->
    <div class="card">
        <div class="row">
            <div class="col">
                <h5 class="card-header">Days</h5>
            </div>
            <div class="col">
                <a href="{{ route('day.create') }}" class="btn rounded-pill btn-primary float-end" style="margin:1rem;">Create New</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped table-hover">
            <thead>
              <tr class="text-nowrap">
                <th>No</th>
                <th>Day</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($days as $key=>$day)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>{{$day->name}}</td>
                    <td>
                        <form action="{{ route('day.destroy', $day->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('day.edit', $day->id) }}" class="btn rounded-pill btn-warning btn-sm">Edit</a>
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