@extends('schoolTemplate.printlayout')
@section('title', 'OverAll Schedule')
@section('content')
    {{-- Schedule Table --}}
  <div class="container" id="table">
    <!-- Responsive Table -->
    <div class="card mt-5">
      <div class="row">
        <h1>Schedule Lists</h1>
    </div>
      </div>
      <div class="text-nowrap">
        <table class="table-padding table table-bordered">
          <thead>
            <tr class="text-center">
              <td rowspan="2" class="table-active"><small>No</small></td>
              <td rowspan="2" class="table-primary"><small>Teacher <br> Name</small></td>
              @foreach ($days as $day)
                  <td colspan="7" class="table-active"><small>{{$day->name}}</small></td>
              @endforeach
              </tr>
              @foreach ($days as $day)
                @for ($i = 1; $i <= 7; $i++)
                <td class="table-active text-center"><small>{{$i}}</small></td>
                @endfor
              @endforeach
              
            </tr>
          </thead>
          <tbody>
            @foreach ($teachers as $key=>$teacher)
              <tr class="text-center">
                <td class="table-active"><small>{{$key+1}}</small></td>
                <td class="table-primary"><small>{{$teacher->name}}</small></td>
                @foreach ($days as $day)
                  @foreach ($periods as $period)
                    @if ($period->id != 5)
                      @php
                          $count = 0;
                      @endphp
                      @foreach ($schedules as $schedule)
                            @if ($schedule->teacher_id == $teacher->id && $schedule->day_id == $day->id && $schedule->period_id == $period->id)
                                <td>
                                  <a id="edit" data-editday="{{$day->id}}" data-editperiod="{{$period->id}}" data-editgrade="{{$schedule->section->grade->id}}" data-editschedule="{{$schedule->id}}"  data-editteacherid="{{$schedule->teacher_id}}" data-editteachername="{{$schedule->teacher->name}}"  data-editsectionid="{{$schedule->section_id}}" data-editsectionname="{{$schedule->section->name}}" data-editsubjectid="{{$schedule->subject_id}}" data-editsubjectname="{{$schedule->subject->name}}">
                                    <small>
                                      {{Str::limit($schedule->section->grade->name, 1, Str::remove('Grade-', $schedule->section->grade->name))}} <br> ({{$schedule->section->name}})
                                    </small> <br>
                                    <small>
                                      @if ($schedule->subject->name == "Myanmar" || $schedule->subject->name == "Mathematics" || $schedule->subject->name == "Physics")
                                        {{Str::limit($schedule->subject->name, 4, '')}}</small>
                                      @else
                                      {{Str::limit($schedule->subject->name, 3, '')}}</small>
                                      @endif
                                  </a>
                                </td>
                                @php
                                    $count = 1;
                                @endphp
                            @endif
                      @endforeach
                      @if ($count == 0)
                          
                          <td>
                            <a id="create" data-day="{{$day->id}}" data-period="{{$period->id}}" class="btn btn-xl p-2"></a>
                          </td>
                      @endif
                    @endif
                    
                  @endforeach
                @endforeach
              </tr>
            @endforeach
            
          </tbody>
          {{-- <thead>
            <tr class="text-nowrap table-active text-center">
              <th>Time</th>
              <th>Grades</th>
              <th>Sections</th>
              <th colspan="5">Days</th>
            </tr>
          </thead>
          <tbody>
              <tr class="text-center table-primary">
                <td></td>
                <td></td>
                <td></td>
                @foreach ($days as $day)
                <td>{{$day->name}}</td>
                @endforeach
              </tr>
              @foreach ($periods as $period)
              <tr>
                
                @if (date('h:i A', strtotime($period->start_time)) == '12:00 PM')
                <td class="table-danger">{{date('h:i A', strtotime($period->start_time))}} ~ {{date('h:i A', strtotime($period->end_time))}}</td>
                    <td colspan="7" class="text-center table-danger">Lunch Time</td>
              </tr>
                @else
                <td rowspan="{{count($sections)}}" class="table-active">{{date('h:i A', strtotime($period->start_time))}} ~ {{date('h:i A', strtotime($period->end_time))}}</td>
                @foreach ($grades as $grade)
                <td rowspan="{{count($grade->sections)}}" class="table-primary">{{$grade->name}}</td>
                  @foreach ($sections as $section)
                      @if ($section->grade->id == $grade->id)
                          <td class="table-active">{{$section->name}}</td>
                          @foreach ($days as $day)
                          @php
                              $count = 0;
                          @endphp
                              @foreach ($schedules as $schedule)
                                  @if ($schedule->day->id == $day->id && $schedule->period->id == $period->id && $schedule->section_id == $section->id)
                                      <td class="text-center">
                                        <a href="{{route('schedule.edit', $schedule->id)}}">
                                          <div>
                                            <p>{{$schedule->subject->name}}</p>
                                            <small>Teacher {{$schedule->teacher->name}}</small>
                                          </div>
                                        </a>
                                      </td>
                                      @php
                                          $count = 1;
                                      @endphp
                                  @endif
                              @endforeach
                              @if ($count == 0)
                                  <td></td>
                              @endif
                          @endforeach
              </tr>
                      @endif
                  @endforeach
                @endforeach
                @endif
                
              @endforeach
          </tbody> --}}
          
        </table>
      </div>
    </div>
  </div>
@endsection



  
  
