@extends('schoolTemplate.layout')
@section('title', 'Create Day')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Create Day</h1>
        </div>
        <div class="col">
            <a href="{{ route('day.index')}}" class="btn rounded-pill btn-primary float-end">Back</a>
        </div>
        <div class="d-flex justify-content-center">
            <div class="row mt-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Create Days</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{route('day.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Day</label>
                          <input name="name" type="text" class="form-control" id="basic-default-fullname" value="{{ old('name') }}" placeholder="Enter day..." />
                          @error('name')
                          <div class="text-danger small">{{ $message }}</div>
                          @enderror
                        </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="d-flex justify-content-center">
                              <button type="submit" class="btn rounded-pill btn-success mb-5">Save</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection