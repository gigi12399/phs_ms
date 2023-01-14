@extends('schoolTemplate.layout')
@section('title', 'Create Student')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Create New Student</h1>
        </div>
        <div class="col">
            <a href="{{ route('student.index')}}" class="btn rounded-pill btn-primary float-end">Back</a>
        </div>
        <div class="d-flex justify-content-center">
          <div class="col-8">
            <div class="row mt-5">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Insert Data</h5>
                  <small class="text-muted float-end">Student</small>
                </div>
                <div class="card-body">
                  <div class="row">
                    <label class="form-label" for="">Student</label>
                          <div class="input-group">
                            <div class="input-group-text">
                              <input
                                name="student"
                                class="form-check-input mt-0 me-3 new"
                                type="radio"
                                value="new"
                                id="new"
                              />
                              <label for="male">New</label>
                            </div>
                            <div class="input-group-text">
                              <input
                                name="student"
                                class="form-check-input mt-0 me-3 old"
                                type="radio"
                                value="old"
                                id="old"
                              />
                              <label for="female">Old</label>
                            </div>
                          </div>
                  </div>

                  {{-- new form container --}}
                  <div class="new-form-container mt-3">
                    <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                        <div class="row">
                          <div class="col">
                            <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                              ></span>
                              <input
                                name = "name"
                                type="text"
                                value="{{ old('name') }}"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                placeholder="John Doe"
                                aria-label="John Doe"
                                aria-describedby="basic-icon-default-fullname2"
                              />
                            </div>
                            
                            @error('name')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col">
                            <label class="form-label" for="basic-icon-default-address">Address</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-buildings"></i
                              ></span>
                              <input
                                name = "address"
                                type="text"
                                value="{{ old('address') }}"
                                id="basic-icon-default-address"
                                class="form-control"
                                placeholder="No.2, Alone...."
                              />
                              
                            </div>
                            @error('address')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                      </div>
                      
                      <div class="mb-3">
                        <div class="row">
                          <div class="col">
                            <label class="form-label" for="basic-icon-default-nrc">NRC</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="bx bx-card"></i></span>
                              <input
                                name = "nrc"
                                type="text"
                                value="{{ old('nrc') }}"
                                id="basic-icon-default-nrc"
                                class="form-control"
                                placeholder="5/aln(N)895322"
                              />
                              <span id="basic-icon-default-email2" class="input-group-text"></span>
                            </div>
                            @error('nrc')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col">
                            <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-mobile"></i
                              ></span>
                              <input
                                name = "phone"
                                type="text"
                                value="{{ old('phone') }}"
                                id="basic-icon-default-phone"
                                class="form-control phone-mask"
                                placeholder="658 799 8941"
                                aria-label="658 799 8941"
                                aria-describedby="basic-icon-default-phone2"
                              />
                            </div>
                            @error('phone')
                          <div class="text-danger small">{{ $message }}</div>
                          @enderror
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <div class="row">
                          <div class="col">
                            <label class="form-label" for="basic-icon-default-birthday">Birthday</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="bx bx-cake"></i></span>
                              <input
                                name = "birthday"
                                type="date"
                                value="{{ old('birthday') }}"
                                id="basic-icon-default-birthday"
                                class="form-control"
                              />
                            </div>
                            @error('birthday')
                          <div class="text-danger small">{{ $message }}</div>
                          @enderror
                          </div>
                          <div class="col">
                            <label class="form-label" for="basic-icon-default-profile">Profile Image</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-photo-album"></i
                              ></span>
                              <input
                                name="profile"
                                type="file"
                                id="basic-icon-default-profile"
                                class="form-control"
                              />
                            </div>
                            @error('profile')
                          <div class="text-danger small">{{ $message }}</div>
                          @enderror
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <div class="row">
                          <div class="col">
                            <label class="form-label" for="section">Grades & Sections</label>
                            <select name="grade_section" id="section" class="form-control">
                            @foreach ($sections as $section)
                              <option value="{{ $section->id }}">{{$section->grade->name}} ({{ $section->name }})</option>
                            @endforeach
                            </select>
                            @error('grade_section')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col">
                            <label class="form-label" for="academic_year">Academic Years</label>
                            <select name="academic_year" id="academic_year" class="form-control">
                              <option value="">Choose academic year</option>
                            @foreach ($academic_years as $year)
                              <option value="{{ $year->id }}">{{$year->year_one}} ~ {{ $year->year_two }}</option>
                            @endforeach
                            </select>
                            @error('academic_year')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <div class="row">
                          <div class="col">
                            <label class="form-label" for="">Gender</label>
                            <div class="input-group">
                              <div class="input-group-text">
                                <input
                                  name="gender"
                                  class="form-check-input mt-0 me-3"
                                  type="radio"
                                  value="male"
                                  id="male"
                                  aria-label="Radio button for following text input"
                                  checked
                                />
                                <label for="male">Male</label>
                              </div>
                              <div class="input-group-text">
                                <input
                                  name="gender"
                                  class="form-check-input mt-0 me-3"
                                  type="radio"
                                  value="female"
                                  id="female"
                                  aria-label="Radio button for following text input"
                                />
                                <label for="female">Female</label>
                              </div>
                            </div>
                            @error('gender')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col">
                            <label class="form-label" for="basic-icon-default-email">Email</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-message2" class="input-group-text"
                                ><i class="bx bx-envelope"></i
                              ></span>
                              <input
                                name = "email"
                                type="email"
                                id="basic-icon-default-email"
                                class="form-control"
                                placeholder="Write Email here...."
                                value="{{ old('email') }}"
                              />
                            </div>
                            @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <div class="row">
                          <div class="d-flex justify-content-center">
                            <div class="col-8">
                              <div class="row">
                                <label class="form-label" for="basic-icon-default-description">Info</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-message2" class="input-group-text"
                                ><i class="bx bx-comment"></i
                              ></span>
                              <textarea
                                name = "info"
                                id="basic-icon-default-description"
                                class="form-control"
                                placeholder="Write here...."
                              >{{ old('info') }}</textarea>
                            </div>
                            @error('info')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <button type="submit" class="btn rounded-pill btn-success my-4">Save</button>
                        
                      </div>
                    </form>
                  </div>
                  
                  {{-- old form container --}}
                  <div class="old-form-container mt-3">
                    <form action="{{route('getoldStudentstore')}}" method="POST">
                      @csrf

                      <h4 class="text-center">Choose Old Student</h4>
                    <div class="mt-3">
                      <div class="row">
                        <div class="col">
                          <label class="form-label" for="student_section">Student's Old Grades & Sections</label>
                            <select name="grade_section" id="student_section" class="form-control">
                              <option value="">Choose Grade & Section</option>
                            @foreach ($sections as $section)
                              <option value="{{ $section->id }}">{{$section->grade->name}} ({{ $section->name }})</option>
                            @endforeach
                            </select>
                            
                        </div>
                        <div class="col">
                            <label class="form-label" for="old_std_birthday">Student's birthday</label>
                            <input type="date" class="form-control" name="old_std_birthday" id="old_std_birthday" disabled>
                            
                        </div>
                      </div> 
                    </div>
                    <div class="old_student_form mt-5">
                      <h4 class="text-center">Insert Old Student's Data</h4>
                    </div>
                    <div class="row">
                      <div class="d-flex justify-content-center">
                        <div class="col-6">
                          <div class="row">
                            <label class="form-label" for="student">Students</label>
                            <select name="old_student" id="student" class="form-control" disabled>
                              <option value="">Choose Students</option>
                            </select>
                            @error('old_student')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mt-3">
                      <div class="row">
                        <div class="col">
                          <label class="form-label" for="academic_year">Academic Years</label>
                            <select name="old_std_academic_year" id="academic_year" class="form-control">
                              <option value="">Choose academic year</option>
                            @foreach ($academic_years as $year)
                              <option value="{{ $year->id }}">{{$year->year_one}} ~ {{ $year->year_two }}</option>
                            @endforeach
                            </select>
                            @error('old_std_academic_year')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                          <label class="form-label" for="section">Grades & Sections</label>
                            <select name="old_std_grade_section" id="section" class="form-control">
                            @foreach ($sections as $section)
                              <option value="{{ $section->id }}">{{$section->grade->name}} ({{ $section->name }})</option>
                            @endforeach
                            </select>
                            @error('old_std_grade_section')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                    </div>
                    <div class="mt-3">
                      <div class="row">
                        <button type="submit" class="btn rounded-pill btn-success my-4">Save</button>
                      </div>
                    </div>
                  </form>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
@section('script')
<script>
  $(document).ready(function(){
  $('.new-form-container').hide();
  $('.old-form-container').hide();
  $('input.new').on('click',function(){
    $('.new-form-container').show();
    $('.old-form-container').hide();
  });
  $('input.old').on('click',function(){
    $('.new-form-container').hide();
    $('.old-form-container').show();
  });


  // find student with grade and birthday
  var section = '';
  var std_birthday = '';
  $('#student_section').on('change', function(){
    section = $(this).val();
     $("#old_std_birthday").prop('disabled', false);
     $.get("{{route('getoldStudent')}}",{"section_id":section,"birthday":std_birthday},function (resp) {
      if(resp.students.length > 0){
        $("#student option").remove();
        $.each(resp.students, function(index, student){
          $('#student').append($('<option>').val(student.id).text(student.name));
        })
      }else{
        $("#student option").remove();
        $('#student').append(`<option selected>There is no student.</option>`);
      }
    });
  });

  $('#old_std_birthday').on('change', function(){
    std_birthday = $(this).val();
    $.get("{{route('getoldStudent')}}",{"section_id":section,"birthday":std_birthday},function (resp) {
      if(resp.students.length > 0){
        $("#student").prop('disabled', false);
        $("#student option").remove();
        $.each(resp.students, function(index, student){
          $('#student').append($('<option>').val(student.id).text(student.name));
        })
      }else{
        $("#student").prop('disabled', false);
        $("#student option").remove();
        $('#student').append(`<option selected>There is no student.</option>`);
      }
    });
  })
})
</script>
@endsection