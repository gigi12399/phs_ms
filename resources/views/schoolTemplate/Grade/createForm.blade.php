@extends('schoolTemplate.layout')
@section('title', 'Create Grade')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Create New Grade</h1>
        </div>
        <div class="col">
            <a href="{{ route('grade.index')}}" class="btn rounded-pill btn-primary float-end">Back</a>
        </div>
        <div class="d-flex justify-content-center">
            <div class="row mt-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Create Grade</h5>
                      <small class="text-muted float-end">Academic</small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('grade.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="name">Name</label>
                          <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}" placeholder="Enter grade..." />
                          @error('name')
                          <div class="text-danger small">{{ $message }}</div>
                      @enderror
                        </div>
                        </div>
                        <button type="submit" class="btn rounded-pill btn-success mb-5">Save</button>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection