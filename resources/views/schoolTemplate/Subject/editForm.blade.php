@extends('schoolTemplate.layout')
@section('title', 'Update Subject')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Update Subject</h1>
        </div>
        <div class="col">
            <a href="{{ route('subject.index')}}" class="btn rounded-pill btn-primary float-end">Back</a>
        </div>
        <div class="d-flex justify-content-center">
            <div class="row mt-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Update Subjects</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{route('subject.update', $subject->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <div class="row">
                            <div class="col">
                              <label class="form-label" for="basic-default-fullname">Subject Name</label>
                              <input name="name" type="text" class="form-control" id="basic-default-fullname" value="{{ $subject->name }}" placeholder="Enter subject name..." />
                              @error('name')
                              <div class="text-danger small">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col">
                              <label class="form-label" for="teacher">Teachers</label>
                              <select name="teachers[]" id="teacher" class="form-control" multiple>
                              @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}"
                                  @foreach ($subject->teachers as $t)
                                      @if ($t->id == $teacher->id)
                                          {{'selected'}}
                                      @endif
                                  @endforeach
                                  >{{ $teacher->name }}</option>
                              @endforeach
                              </select>
                              @error('teacher')
                              <div class="text-danger small">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row mt-5">
                          <button type="submit" class="btn rounded-pill btn-success mb-5">Update</button>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection