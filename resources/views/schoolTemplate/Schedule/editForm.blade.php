@extends('schoolTemplate.layout')
@section('title', 'Update Schedule')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Update Schedule</h1>
        </div>
        <div class="col">
            <a href="{{ route('schedule.index')}}" class="btn rounded-pill btn-primary float-end">Back</a>
        </div>
        <div class="d-flex justify-content-center">
          <div class="col-6">
            <div class="row mt-5">
              <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Schedule</h5>
                  </div>
                  <div class="card-body">
                    <form action="{{route('schedule.update', $schedule->id)}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <div class="row">
                          <div class="col">
                            <label class="form-label" for="day">Days</label>
                            <select name="day" id="day" class="form-control">
                            @foreach ($days as $day)
                              <option value="{{ $day->id }}" @if ($schedule->day_id == $day->id)
                                  {{'selected'}}
                              @endif>{{ $day->name }}</option>
                            @endforeach
                            </select>
                            @error('day')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col">
                            <label class="form-label" for="period">Periods</label>
                            <select name="period" id="period" class="form-control">
                            @foreach ($periods as $period)
                              <option value="{{ $period->id }}" @if ($schedule->period_id == $period->id)
                                {{'selected'}}
                            @endif>{{date('h:i A', strtotime($period->start_time))}} ~ {{date('h:i A', strtotime($period->end_time))}}</option>
                            @endforeach
                            </select>
                            @error('period')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror   
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <div class="row">
                          <div class="col">
                            <label class="form-label" for="grade">Grades</label>
                            <select name="grade" id="inputGrade" class="form-control">
                            @foreach ($grades as $grade)
                              <option value="{{ $grade->id }}" @if ($schedule->section->grade->id == $grade->id)
                                {{'selected'}}
                            @endif>{{ $grade->name }}</option>
                            @endforeach
                            </select>
                            @error('grade')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col">
                            <label class="form-label" for="teacherGuide">Sections</label>
                            <select name="section" id="inputSection" class="form-control" disabled>
                              <option value="{{ $schedule->section_id }}" >Section-{{ $schedule->section->name }}</option>
                            </select>
                            @error('section')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        
                      </div>
                      <div class="mb-3">
                        <div class="row">
                          <div class="col">
                            <label class="form-label" for="teacher">Teachers</label>
                            <select name="teacher" id="inputTeacher" class="form-control" disabled>
                            <option value="{{ $schedule->teacher_id }}" >{{ $schedule->teacher->name }}</option>
                            </select>
                            @error('teacher')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col">
                            <label class="form-label" for="subject">Subjects</label>
                            <select name="subject" id="inputSubject" class="form-control" disabled>
                              <option value="{{ $schedule->subject_id }}" >{{ $schedule->subject->name }}</option>
                            </select>
                            @error('subject')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        
                      </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <button type="submit" class="btn rounded-pill btn-success mb-5 float-end me-2">Update</button>
                          </form>
                        </div>
                        <div class="col">
                          <form action="{{ route('schedule.destroy', $schedule->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn rounded-pill btn-danger float-start ms-2" onclick="return confirm('Are You Sure to Delete!!');">Delete</button>
                        </form>
                        </div>
                      </div>
                      
                  </div>
                </div>
          </div>
          </div>
        </div>
    </div>
    @section('script')
    
    {{-- <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script> --}}
    <script>
      $(document).ready(function(){
        $('#inputGrade').on('change', function(){
          let id = $(this).val();
          $.get("{{route('getteacherandsection')}}",{grade_id:id},function (resp) { 
            //console.log(resp.teachers)
            
            //console.log(resp.teachers)
            if(resp.teachers.length > 0){
              $('#inputTeacher').prop('disabled',false);
              $("#inputTeacher option").remove();
              $('#inputTeacher').append(`<option selected>Choose Teacher.....</option>`);
              
              $.each(resp.teachers, function(index, teacher){
                $('#inputTeacher').append($('<option>').val(teacher.id).text(teacher.name));
              })
            }else{
              $("#inputTeacher option").remove();
              $("#inputSubject option").remove();
            }
            if(resp.sections.length > 0){
              $('#inputSection').prop('disabled',false);
              $("#inputSection option").remove();
              $.each(resp.sections, function(index, section){
                $('#inputSection').append($('<option>').val(section.id).text(section.name));
              })
            }else{
              $("#inputSection option").remove();
            }
          })
        })

        $('#inputTeacher').on('change', function(){
          let id = $(this).val();
          $.get("{{route('getteacherandsubject')}}", {teacher_id:id}, function(resp){
            if(resp.subjects.length > 0){
              $('#inputSubject').prop('disabled',false);
              console.log(resp.subjects);
              $("#inputSubject option").remove();
              $.each(resp.subjects, function(index, subject){
                $('#inputSubject').append($('<option>').val(subject.id).text(subject.name));
              })
            }else{
              $("#inputSubject option").remove();
          }
        })
      })
      })
    </script>
@endsection
@endsection