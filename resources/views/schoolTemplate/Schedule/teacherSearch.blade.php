@extends('schoolTemplate.layout')
@section('title', 'Find Schedule With Teacher')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Find Schedule With Teacher</h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="row mt-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Find Schedule</h5>
                    </div>
                    <div class="card-body">
                      <form>
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="teacher">Teachers</label>
                          <select name="teacher" id="teacher" class="form-control" onchange="location = this.value;">
                            <option value="">Choose Teacher</option>
                            @foreach ($teachers as $teacher)
                            <option value="{{route('schedule.show', 'teacher='.$teacher->id)}}">{{ $teacher->name }}</option>
                          @endforeach
                          </select>
                          @error('teacher')
                          <div class="text-danger small">{{ $message }}</div>
                      @enderror
                        </div>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection