@extends('schoolTemplate.layout')
@section('title', 'Schedule With Grade')
@section('content')
  <div class="row">
    <div class="col-md-9 col-12">
      <h2>Each Section's Schedule Lists of ({{$academic_year->year_one}} ~ {{$academic_year->year_two}})</h2>
    </div>
    <div class="col-md-3 col-12">
      <div class="float-end">
        <a class="btnprint btn btn-primary text-white btn-sm print-route">
          <i class="bx bx-printer"></i>
        </a>
        <button class="btn btn-primary text-white btn-sm listBtn"><i class="fas fa-solid fa-list fa-lg"></i></button>
        <button class="btn btn-primary text-white btn-sm tableBtn"><i class="fas fa-solid fa-table fa-lg"></i></button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <form>
        @csrf
        <div class="mb-3">
          <label class="form-label" for="section">Grades & Sections</label>
          <select name="section" id="section" class="form-control select-section">
            <option>Choose Grade and Section</option>
            @foreach ($sections as $section)
            <option value="{{$section->id}}">{{ $section->grade->name }} ({{$section->name}})</option>
          @endforeach
          </select>
          @error('section')
          <div class="text-danger small">{{ $message }}</div>
      @enderror
        </div>
      </form>
    </div>
    
  </div>
  {{-- Table --}}
  <div class="select_section_schedule_table mt-5">
  <div class="container px-0" id="table">
    <!-- Responsive Table -->
    <div class="card">
      <div class="row">
          <div class="col">
              <h5 class="card-header header">Grade Schedule</h5>
          </div>
          <div class="col">
              <a href="{{route('schedule.index')}}" class="btn rounded-pill btn-primary float-end" style="margin:1rem;">Back</a>
          </div>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
          <thead>
            <tr class="text-nowrap table-active text-center">
              <th>Time</th>
              <th colspan="5">Days</th>
            </tr>
          </thead>
          <tbody>
            
            
              <tr class="text-center table-primary">
                <th></th>
                @foreach ($days as $day)
                    <td>{{$day->name}}</td>
                @endforeach
              </tr>
                @foreach ($periods as $period)
                <tr class="text-center">
                  @if (date('h:i A',strtotime($period->start_time)) == '12:00 PM')
                  <td class="table-danger">{{date('h:i A',strtotime($period->start_time))}} ~ {{date('h:i A',strtotime($period->end_time))}}</td>
                  <td colspan="6" class="table-danger">Lunch Time</td>
                  @else
                  <td class="table-active">{{date('h:i A',strtotime($period->start_time))}} ~ {{date('h:i A',strtotime($period->end_time))}}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  {{-- @foreach ($days as $day)
                  @php
                      $count = 0;
                  @endphp
                      @foreach ($schedules as $schedule)
                          @if ($schedule->day_id == $day->id && $schedule->period_id == $period->id)
                            <td>
                              <a id="edit" data-editday="{{$day->id}}" data-editperiod="{{$period->id}}" data-editgrade="{{$schedule->section->grade->id}}" data-editschedule="{{$schedule->id}}"  data-editteacherid="{{$schedule->teacher_id}}" data-editteachername="{{$schedule->teacher->name}}"  data-editsectionid="{{$schedule->section_id}}" data-editsectionname="{{$schedule->section->name}}" data-editsubjectid="{{$schedule->subject_id}}" data-editsubjectname="{{$schedule->subject->name}}">
                                <div>
                                  <p>{{$schedule->subject->name}}</p>
                                  <small>{{$schedule->teacher->name}}</small>
                                </div>
                              </a>
                              @php
                                  $count = 1;
                              @endphp
                            </td> 
                          @endif
                      @endforeach
                      @if ($count == 0)
                      <td>
                        <a id="create" data-day="{{$day->id}}" data-period="{{$period->id}}" class="btn btn-xl p-5"></a>
                      </td>
                      @endif
                  @endforeach --}}
                  @endif
                    
              </tr>
                  @endforeach
              
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  </div>

  {{-- list --}}
  <div class="select_section_schedule_list mt-5">
  <div class="container px-0" id="list">
    <!-- Responsive Table -->
    <div class="card">
      <div class="row">
          <div class="col">
              <h5 class="card-header">Schedules</h5>
          </div>
          <div class="col">
              <a href="{{route('schedule.index')}}" class="btn rounded-pill btn-primary float-end" style="margin:1rem;">Back</a>
          </div>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Days</th>
              <th>Periods</th>
              <th>Teaches</th>
              <th>Subjects</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="section_schedule_list">
            {{-- @foreach ($schedules as $key=>$schedule)
                    <tr>
                      <td>{{$key+1}}</td>
                    <td>{{$schedule->day->name}}</td>
                    <td>{{date('h:i A', strtotime($schedule->period->start_time))}} ~ {{date('h:i A', strtotime($schedule->period->end_time))}}</td>
                    <td>{{$schedule->teacher->name}}</td>
                    <td>{{$schedule->subject->name}}</td>
                    <td>
                      <form action="{{ route('schedule.destroy', $schedule->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('schedule.edit', $schedule->id) }}" class="btn rounded-pill btn-warning btn-sm">Edit</a>
                        
                        <button type="submit" class="btn rounded-pill btn-danger btn-sm ms-3" onclick="return confirm('Are You Sure to Delete!!');">Delete</button>
                    </form>
                    </td>
                    </tr>
            @endforeach --}}
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#e3e3ec;">
            <div class="modal-body">
              <div class="row mt-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Create Schedule</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{route('schedule.store')}}" method="POST" id="createForm">
                        @csrf
                        <div class="mb-3">
                          <div class="row">
                            <div class="col">
                              <label class="form-label" for="createDay">Days</label>
                              <select name="day" id="createDay" class="form-control inputDay">
                                <option selected>Choose Day.....</option>
                              @foreach ($days as $day)
                                <option value="{{ $day->id }}">{{ $day->name }}</option>
                              @endforeach
                              </select>
                              @error('day')
                              <div class="text-danger small">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col">
                              <label class="form-label" for="createPeriod">Periods</label>
                              <select name="period" id="createPeriod" class="form-control inputPeriod">
                                <option selected>Choose Period.....</option>
                              @foreach ($periods as $period)
                                <option value="{{ $period->id }}">{{date('h:i A', strtotime($period->start_time))}} ~ {{date('h:i A', strtotime($period->end_time))}}</option>
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
                              <label class="form-label" for="createGrade">Grades</label>
                              <select name="grade" id="createGrade" class="form-control inputGrade">
                                <option selected>Choose Grade.....</option>
                              @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                              @endforeach
                              </select>
                              @error('grade')
                              <div class="text-danger small">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col">
                              <label class="form-label" for="createSection">Sections</label>
                              <select name="section" id="createSection" class="form-control inputSection" disabled>
                                <option selected>Choose Section.....</option>
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
                              <label class="form-label" for="createTeacher">Teachers</label>
                              <select name="teacher" id="createTeacher" class="form-control inputTeacher" disabled>
                                <option selected>Choose Teacher.....</option>
                              
                              </select>
                              @error('teacher')
                              <div class="text-danger small">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col">
                              <label class="form-label" for="createSubject">Subjects</label>
                              <select name="subject" id="createSubject" class="form-control inputSubject" disabled>
                                <option selected>Choose Subject.....</option>
                              </select>
                              @error('subject')
                              <div class="text-danger small">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          
                        </div>
                        <div class="mb-3">
                          <div class="d-flex justify-content-center">
                            <div class="col-6">
                              <div class="row">
                                <label for="academicYear">Academic Year</label>
                                <input type="text" class="form-control" name="academicYear" id="academicYear" value="{{date('Y')}}" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                        <button type="submit" class="btn rounded-pill btn-success mb-5">Save</button>
                      </form>
                    </div>
                  </div>
            </div>
            </div>
        </div>
    </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#e3e3ec;">
            <div class="modal-body">
              <div class="row mt-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Update Schedule</h5>
                    </div>
                    <div class="card-body">
                      <form method="POST" id="editForm">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <div class="row">
                            <div class="col">
                              <label class="form-label" for="editDay">Days</label>
                              <select name="day" id="editDay" class="form-control inputDay">
                              @foreach ($days as $day)
                                <option value="{{ $day->id }}">{{ $day->name }}</option>
                              @endforeach
                              </select>
                              @error('day')
                              <div class="text-danger small">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col">
                              <label class="form-label" for="editPeriod">Periods</label>
                              <select name="period" id="editPeriod" class="form-control inputPeriod">
                              @foreach ($periods as $period)
                                <option value="{{ $period->id }}">{{date('h:i A', strtotime($period->start_time))}} ~ {{date('h:i A', strtotime($period->end_time))}}</option>
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
                              <label class="form-label" for="editGrade">Grades</label>
                              <select name="grade" id="editGrade" class="form-control inputGrade">
                              @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}" >{{ $grade->name }}</option>
                              @endforeach
                              </select>
                              @error('grade')
                              <div class="text-danger small">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col">
                              <label class="form-label" for="editSection">Sections</label>
                              <select name="section" id="editSection" class="form-control inputSection" disabled>
                                
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
                              <label class="form-label" for="editTeacher">Teachers</label>
                              <select name="teacher" id="editTeacher" class="form-control inputTeacher" disabled>
                              
                              </select>
                              @error('teacher')
                              <div class="text-danger small">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col">
                              <label class="form-label" for="editSubject">Subjects</label>
                              <select name="subject" id="editSubject" class="form-control inputSubject" disabled>
                               
                              </select>
                              @error('subject')
                              <div class="text-danger small">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          
                        </div>
                        <div class="mb-3">
                          <div class="d-flex justify-content-center">
                            <div class="col-6">
                              <div class="row">
                                <label for="academicYear">Academic Year</label>
                                <input type="text" class="form-control" name="academicYear" id="academicYear" value="{{date('Y')}}" readonly>
                              </div>
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
                            <form id="deleteForm" method="post">
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
</div>
  @section('script')
  <script>
    $(document).ready(function(){
      
      $('.btnprint').hide();
      // create model
      $(document).on('click', '.create',  function(e){
        e.preventDefault();
        var day_id = $(this).data('day');
        var period_id = $(this).data('period');
        $(`#createForm .inputDay option[value="${day_id}"]`).prop('selected', true);
        $(`#createForm .inputPeriod option[value="${period_id}"]`).prop('selected', true);
        $('#createModal').modal('show');
      });

      // edit model
      $(document).on('click', '.edit', function(e){
        e.preventDefault();
        
        
        var edit_day_id = $(this).data('editday');
        var edit_period_id = $(this).data('editperiod');
        var edit_grade_id = $(this).data('editgrade');
        var edit_schedule_id = $(this).data('editschedule');
        var edit_teacher_id = $(this).data('editteacherid');
        var edit_teacher_name = $(this).data('editteachername');
        var edit_section_id = $(this).data('editsectionid');
        var edit_section_name = $(this).data('editsectionname');
        var edit_subject_id = $(this).data('editsubjectid');
        var edit_subject_name = $(this).data('editsubjectname');
        $(`#editForm .inputDay option[value="${edit_day_id}"]`).prop('selected', true);
        $(`#editForm .inputPeriod option[value="${edit_period_id}"]`).prop('selected', true);
        $(`#editForm .inputGrade option[value="${edit_grade_id}"]`).prop('selected', true);
        $(".inputTeacher option").remove();
        $(".inputSection option").remove();
        $(".inputSubject option").remove();
        $('#editForm .inputTeacher').append($('<option>').val(edit_teacher_id).text(edit_teacher_name));
        $('#editForm .inputSection').append($('<option>').val(edit_section_id).text(edit_section_name));
        $('#editForm .inputSubject').append($('<option>').val(edit_subject_id).text(edit_subject_name));
        var url = "{{route('schedule.update', ':id')}}";
        url = url.replace(':id', edit_schedule_id);
        $('#editForm').attr('action', url);
        var deleteUrl = "{{ route('schedule.destroy', ':deleteId') }}";
        deleteUrl = deleteUrl.replace(':deleteId', edit_schedule_id);
        $('#deleteForm').attr('action', deleteUrl);
        $('#editModal').modal('show');
      });

      // ajax
      // table and list
      $('.select-section').on('change', function(){
            let id = $(this).val();
            $.get("{{route('getsectionschedules')}}", {section_id:id}, function(resp){
              // for print
              $('.btnprint').show();
              var printUrl = "{{route('gradeprint', ':id')}}";
              printUrl = printUrl.replace(':id', resp.section.id);
              $('.print-route').attr('href', printUrl);

              // for schedule table
              $(".select_section_schedule_table").remove('child');
              // for schedule list
              $(".section_schedule_list").remove('child');
              
              let header = `${resp.grade.name} (Section-${resp.section.name})`;
              let schedule_row = '';

              // for table
              schedule_row += `
              <div class="container px-0" id="table">
                <!-- Responsive Table -->
                <div class="card">
                  <div class="row">
                      <div class="col">
                          <h5 class="card-header">${header}</h5>
                      </div>
                      <div class="col">
                          <a href="{{route('schedule.index')}}" class="btn rounded-pill btn-primary float-end" style="margin:1rem;">Back</a>
                      </div>
                  </div>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="text-nowrap table-active text-center">
                          <th>Time</th>
                          <th colspan="5">Days</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr class="text-center table-primary">
                            <th></th>
                      `;
                      $.each(resp.days, function(index, day){ 
                       schedule_row += `<td>${day.name}</td>`;
                      })
                      schedule_row += `</tr>`;

              $.each(resp.periods, function(index, period){
                schedule_row += `
                <tr class="text-center">
                `;
                const [start_hours, start_minutes, start_seconds] = period.start_time.split(':');
                  if (start_hours>12){
                      var start_hour = start_hours - 12;
                      var start_amPm = "PM";
                  } else {
                      var start_hour = start_hours; 
                      var start_amPm = "AM";
                  }
                  var start_time = start_hour + ":" + start_minutes + " " + start_amPm; 

                  const [end_hours, end_minutes, end_seconds] = period.end_time.split(':');
                  if (end_hours>12){
                      var end_hour = end_hours - 12;
                      var end_amPm = "PM";
                  } else {
                      var end_hour = end_hours; 
                      var end_amPm = "AM";
                  }
                  var end_time = end_hour + ":" + end_minutes + " " + end_amPm; 
                 if (period.start_time == '12:00:00'){
                                
                                    schedule_row += `
                              <td class="table-danger">${start_time}~${end_time}</td>
                              <td colspan="6" class="table-danger">Lunch Time</td>
                  `;
                 }else{
                  schedule_row += `
                  <td class="table-active">${start_time}~${end_time}</td>
                  `;
                  $.each(resp.days, function(index, day){
                    let count = 0;
                    $.each(resp.schedules, function(index, schedule){
                      if(schedule.day_id == day.id && schedule.period_id == period.id){
                        var teacher_name = '';
                        var section_name = '';
                        var subject_name = '';
                        $.each(resp.teachers, function(index, teacher){
                          if(schedule.teacher_id == teacher.id){
                            teacher_name = teacher.name;
                          }
                        })
                        
                        $.each(resp.subjects, function(index, subject){
                          if(schedule.subject_id == subject.id){
                            subject_name = subject.name;
                          }
                        })
                        schedule_row += `
                                          <td>
                                            <a href="" class="edit" data-editday="${day.id}" data-editperiod="${period.id}" data-editgrade="${resp.grade.id}" data-editschedule="${schedule.id}"  data-editteacherid="${schedule.teacher_id}" data-editteachername="${teacher_name}"  data-editsectionid="${schedule.section_id}" data-editsectionname="${resp.section.name}"  data-editsubjectid="${schedule.subject_id}" data-editsubjectname="${subject_name}" >
                                              <div>
                                              `;
                                                $.each(resp.subjects, function(index, subject){      
                                                  if(subject.id == schedule.subject_id){
                                                    schedule_row += `<p>${subject.name}</p>`;
                                                  }
                                                })
                                                $.each(resp.teachers, function(index, teacher){      
                                                  if(teacher.id == schedule.teacher_id){
                                                    schedule_row += `<small>${teacher.name}</small>`;
                                                  }
                                                })
                                                
                                              schedule_row += `</div>
                                            </a>
                                          </td> `;
                                          count = 1;
                      }
                    })
                    if(count == 0){
                      schedule_row += `
                      <td>
                          <a href="" class="create btn btn-xl p-5" data-day="${day.id}" data-period="${period.id}"></a>
                        </td>
                      `;
                    }
                  })
                }
                
                schedule_row += `</tr>`;
                
              })
              schedule_row += `
            </tbody>
        </table>
      </div>
    </div>
  </div>
              `;
$('.select_section_schedule_table').html(schedule_row);

// list start
var schedule_list_row = '';
            $.each(resp.schedules, function(index, schedule){
              
              schedule_list_row += `
                                  <tr>
                                    <td>${index+1}</td>
              `;
              $.each(resp.days, function(index, day){
                if(schedule.day_id == day.id){
                  schedule_list_row += `
                                    <td>${day.name}</td>
                  `;
                }
              })
              $.each(resp.periods, function(index, period){
                if(schedule.period_id == period.id){
                  const [start_hours, start_minutes, start_seconds] = period.start_time.split(':');
                  if (start_hours>12){
                      var start_hour = start_hours - 12;
                      var start_amPm = "PM";
                  } else {
                      var start_hour = start_hours; 
                      var start_amPm = "AM";
                  }
                  var start_time = start_hour + ":" + start_minutes + " " + start_amPm; 

                  const [end_hours, end_minutes, end_seconds] = period.end_time.split(':');
                  if (end_hours>12){
                      var end_hour = end_hours - 12;
                      var end_amPm = "PM";
                  } else {
                      var end_hour = end_hours; 
                      var end_amPm = "AM";
                  }
                  var end_time = end_hour + ":" + end_minutes + " " + end_amPm; 
                  schedule_list_row += `
                  <td>${start_time} ~ ${end_time}</td>
                  `;
                }
              })
              $.each(resp.teachers, function(index, teacher){
                if(schedule.teacher_id == teacher.id){
                  schedule_list_row += `
                  <td>${teacher.name}</td>
                  `;
                }
              })
              $.each(resp.subjects, function(index, subject){
                if(schedule.subject_id == subject.id){
                  schedule_list_row += `
                  <td>${subject.name}</td>
                  `;
                }
              })
              var updateUrl = `
                    <td>
                      <form action="{{ route('schedule.destroy', ':scheduleId') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('schedule.edit', ':scheduleId') }}" class="btn rounded-pill btn-warning btn-sm">Edit</a>
                        
                        <button type="submit" class="btn rounded-pill btn-danger btn-sm ms-3" onclick="return confirm('Are You Sure to Delete!!');">Delete</button>
                    </form>
                    </td>
                  </tr>
              
              `;
              
              updateUrl =  updateUrl.replace(':scheduleId', schedule.id);
              updateUrl =  updateUrl.replace(':scheduleId', schedule.id);
              schedule_list_row += updateUrl;
            })
            $('.section_schedule_list').html(schedule_list_row);
      
            })
      })

      // find teacher and section with grade
      $('.inputGrade').on('change', function(){
              let id = $(this).val();
              $.get("{{route('getteacherandsection')}}",{grade_id:id},function (resp) { 
                //console.log(resp.teachers)
                
                //console.log(resp.teachers)
                if(resp.teachers.length > 0){
                  $('.inputTeacher').prop('disabled',false);
                  $(".inputTeacher option").remove();
                  $(".inputSubject option").remove();
                  $('.inputTeacher').append(`<option selected>Choose Teacher.....</option>`);
                  $('.inputSubject').append(`<option selected>Choose Subject.....</option>`);
                  $.each(resp.teachers, function(index, teacher){
                    $('.inputTeacher').append($('<option>').val(teacher.id).text(teacher.name));
                  })
                }else{
                  $(".inputTeacher option").remove();
                  $(".inputSubject option").remove();
                  $('.inputTeacher').append(`<option selected>Choose Teacher.....</option>`);
                  $('.inputSubject').append(`<option selected>Choose Subject.....</option>`);
                }
                if(resp.sections.length > 0){
                  $('.inputSection').prop('disabled',false);
                  $(".inputSection option").remove();
                  $.each(resp.sections, function(index, section){
                    $('.inputSection').append($('<option>').val(section.id).text(section.name));
                  })
                }else{
                  $(".inputSection option").remove();
                }
              })
            })

            // find subject with teacher
            $('.inputTeacher').on('change', function(){
              let id = $(this).val();
              $.get("{{route('getteacherandsubject')}}", {teacher_id:id}, function(resp){
                if(resp.subjects.length > 0){
                  $('.inputSubject').prop('disabled',false);
                  //console.log(resp.subjects);
                  $(".inputSubject option").remove();
                  $.each(resp.subjects, function(index, subject){
                    $('.inputSubject').append($('<option>').val(subject.id).text(subject.name));
                  })
                }else{
                  $(".inputSubject option").remove();
                  $('.inputSubject').append(`<option selected>Choose Subject.....</option>`);
              }
            })
          })

          
      $('.btnprint').printPage();
    })
  </script>
@endsection
@endsection