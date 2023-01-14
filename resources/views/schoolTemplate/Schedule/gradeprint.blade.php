@extends('schoolTemplate.printlayout')
@section('title', 'Grade Schedule')
@section('content')
    {{-- Schedule Table --}}
    <div class="container" id="table">
      <!-- Responsive Table -->
      <div class="card mt-5">
        <div class="row">
                <h1 class="card-header">{{$section->grade->name}}({{$section->name}})'s Schedule List</h1>
            
        </div>
        <div class="text-nowrap">
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
                    @foreach ($days as $day)
                    @php
                        $count = 0;
                    @endphp
                        @foreach ($schedules as $schedule)
                            @if ($schedule->day_id == $day->id && $schedule->period_id == $period->id)
                              <td>
                                <a href="{{route('schedule.edit', $schedule->id)}}">
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
                            <td></td>
                        @endif
                    @endforeach
                    @endif
                      
                </tr>
                    @endforeach
                
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection



  
  
