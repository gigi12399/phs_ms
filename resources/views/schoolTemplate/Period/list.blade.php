@extends('schoolTemplate.layout')
@section('title', 'Periods')
@section('content')
    <h1>Period Lists</h1>
    <!-- Responsive Table -->
    <div class="card">
        <div class="row">
            <div class="col">
                <h5 class="card-header">Periods</h5>
            </div>
            <div class="col">
                <a href="{{ route('period.create') }}" class="btn rounded-pill btn-primary float-end" style="margin:1rem;">Create New</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped table-hover">
            <thead>
              <tr class="text-nowrap">
                <th>No</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($periods as $key=>$period)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>{{date('h:i A', strtotime($period->start_time))}}</td>
                    <td>{{date('h:i A', strtotime($period->end_time))}}</td>
                    <td>
                        <form action="{{ route('period.destroy', $period->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('period.edit', $period->id) }}" class="btn rounded-pill btn-warning btn-sm">Edit</a>
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