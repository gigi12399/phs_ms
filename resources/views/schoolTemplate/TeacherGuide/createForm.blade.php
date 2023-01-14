@extends('schoolTemplate.layout')
@section('title', 'Create Teacher Guide')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Create New Teacher's Guide</h1>
        </div>
        <div class="col">
            <a href="{{ route('guide.index')}}" class="btn rounded-pill btn-primary float-end">Back</a>
        </div>
        <div class="d-flex justify-content-center">
            <div class="row mt-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Create Guide</h5>
                      <small class="text-muted float-end">Teacher</small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('guide.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="teacher">Teaher</label>
                          <select name="teacher" id="teacher" class="form-control">
                          @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                          @endforeach
                          </select>
                          @error('teacher')
                          <div class="text-danger small">{{ $message }}</div>
                      @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="section">Grades & Sections</label>
                          <select name="section" id="section" class="form-control">
                          @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->grade->name }}  ({{ $section->name }})</option>
                          @endforeach
                          </select>
                          @error('section')
                          <div class="text-danger small">{{ $message }}</div>
                      @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="subject">Subjects</label>
                          <select name="subject" id="subject" class="form-control">
                          @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                          @endforeach
                          </select>
                          @error('subject')
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