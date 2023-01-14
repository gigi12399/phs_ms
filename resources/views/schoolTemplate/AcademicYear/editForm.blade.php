@extends('schoolTemplate.layout')
@section('title', 'Update Year')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Update Academic Year</h1>
        </div>
        <div class="col">
            <a href="{{ route('academic.index')}}" class="btn rounded-pill btn-primary float-end">Back</a>
        </div>
        <div class="d-flex justify-content-center">
            <div class="row mt-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Update Years</h5>
                      <small class="text-muted float-end">Academic</small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('academic.update', $academicYear->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Year One</label>
                          <input name="yearOne" type="number" class="form-control" id="basic-default-fullname" value="{{ $academicYear->year_one }}" />
                          @error('yearOne')
                          <div class="text-danger small">{{ $message }}</div>
                      @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Year Two</label>
                          <input name="yearTwo" type="number" class="form-control" id="basic-default-company" value="{{ $academicYear->year_two }}" />
                          @error('yearTwo')
                          <div class="text-danger small">{{ $message }}</div>
                      @enderror
                        </div>
                        </div>
                        <button type="submit" class="btn rounded-pill btn-success mb-5">Update</button>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection