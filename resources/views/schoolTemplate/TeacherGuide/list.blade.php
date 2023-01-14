@extends('schoolTemplate.layout')
@section('title', 'Teacher Guide')
@section('content')
    <h1>Teacher's Guide List</h1>
    <!-- Responsive Table -->
    <div class="card">
        <div class="row">
            <div class="col">
                <h5 class="card-header">Teacher's Guides</h5>
            </div>
            <div class="col">
                <a href="{{ route('guide.create') }}" class="btn rounded-pill btn-primary float-end" style="margin:1rem;">Create New</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped table-hover">
            <thead>
              <tr class="text-nowrap">
                <th>No</th>
                <th>Teacher</th>
                <th>Grade & Section</th>
                <th>Subject</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($teacherGuides as $key=>$guides)
                <tr>
                    <th>{{$key}}</th>
                    <td>{{$guides[0]->teacher->name}}</td>
                    <td>@foreach ($guides as $guide)
                      {{ $guide->section->grade->name }} ({{$guide->section->name}}) <br>
                    @endforeach</td>
                      
                      <td>@foreach ($guides as $guide)
                        {{ $guide->subject->name  }} <br>
                      @endforeach</td>
                    <td>
                      @foreach ($guides as $guide)
                      <form action="{{ route('guide.destroy', $guide->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('guide.edit', $guide->id) }}" class="btn rounded-pill btn-warning btn-xs">Edit</a>
                        <button type="submit" class="btn rounded-pill btn-danger btn-xs ms-3" onclick="return confirm('Are You Sure to Delete!!');">Delete</button>
                    </form>
                      @endforeach
                        
                    </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
@endsection