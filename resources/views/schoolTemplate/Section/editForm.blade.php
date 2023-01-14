@extends('schoolTemplate.layout')
@section('title', 'Update Section')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Update Section</h1>
        </div>
        <div class="col">
            <a href="{{ route('section.index')}}" class="btn rounded-pill btn-primary float-end">Back</a>
        </div>
        <div class="d-flex justify-content-center">
          <div class="col-4">
            <div class="row mt-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Update Section</h5>
                      <small class="text-muted float-end">Academic</small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('section.update', $section->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label class="form-label" for="name">Name</label>
                          <input name="name" type="text" class="form-control" id="name" value="{{ $section->name }}" />
                          @error('name')
                          <div class="text-danger small">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="grade">Grades</label>
                          <select name="grade" id="grade" class="form-control">
                          @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}" @if ($section->grade->id == $grade->id)
                                {{'selected'}}
                            @endif>{{$grade->name}}</option>
                          @endforeach
                          </select>
                          @error('grade')
                          <div class="text-danger small">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="name">Description</label>
                          <input name="description" type="text" class="form-control" id="name" value="{{ $section->description }}" placeholder="Enter description..." />
                          @error('description')
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
    </div>
@endsection