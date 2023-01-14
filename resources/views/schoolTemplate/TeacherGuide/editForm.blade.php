@extends('schoolTemplate.layout')
@section('title', 'Update Teacher Guide')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Update Teacher's Guide</h1>
        </div>
        <div class="col">
            <a href="{{ route('guide.index')}}" class="btn rounded-pill btn-primary float-end">Back</a>
        </div>
        <div class="d-flex justify-content-center">
            <div class="row mt-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Update Guide</h5>
                      <small class="text-muted float-end">Teacher</small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('guide.update', $teacherGuide->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label class="form-label" for="teacher">Teaher</label>
                          <select name="teacher" id="teacher" class="form-control">
                          @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" @if ($teacherGuide->teacher_id == $teacher->id)
                                {{'selected'}}
                            @endif>{{ $teacher->name }}</option>
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
                            <option value="{{ $section->id }}" @if ($teacherGuide->section_id == $section->id)
                                {{'selected'}}
                            @endif>{{ $section->grade->name }}  ({{ $section->name }})</option>
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
                            <option value="{{ $subject->id }}" @if ($teacherGuide->subject_id == $subject->id)
                                {{'selected'}}
                            @endif>{{ $subject->name }}</option>
                          @endforeach
                          </select>
                          @error('subject')
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