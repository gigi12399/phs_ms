@extends('schoolTemplate.layout')
@section('title', 'Update Student')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Update Student</h1>
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
                  <form action="{{route('student.update', $student->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="std_his_id" value="{{$student->student_histories[count($student->student_histories)-1]->id}}">
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
                              value="{{ $student->name }}"
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
                              value="{{$student->address }}"
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
                              value="{{ $student->nrc }}"
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
                              value="{{ $student->phone }}"
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
                        <div class="col mt-3">
                          <label class="form-label" for="basic-icon-default-birthday">Birthday</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-cake"></i></span>
                            <input
                              name = "birthday"
                              type="date"
                              value="{{ $student->birthday }}"
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
                          <img width="50" height="50" class="ms-3" src="{{asset('school/profile/student/'.$student->id.'/'.$student->profile)}}" alt="">
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
                            <option value="{{ $section->id }}" @if ($student->student_histories[count($student->student_histories) - 1]->section_id == $section->id)
                                {{'selected'}}
                            @endif>{{$section->grade->name}} ({{ $section->name }})</option>
                          @endforeach
                          </select>
                          @error('grade_section')
                          <div class="text-danger small">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col">
                          <label class="form-label" for="academic_year">Academic Years</label>
                            <select name="academic_year" id="academic_year" class="form-control" disabled>
                              
                            @foreach ($academic_years as $year)
                              <option value="{{ $year->id }}"@if ($student->student_histories[count($student->student_histories) - 1]->academic_year_id == $year->id)
                                  {{'selected'}}
                              @endif >{{$year->year_one}} ~ {{ $year->year_two }}</option>
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
                                @if ($student->gender == 1)
                                    {{'checked'}}
                                @endif
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
                                @if ($student->gender == 0)
                                    {{'checked'}}
                                @endif
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
                              value="{{$student->email}}"
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
                            >{{ $student->info }}</textarea>
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
                      
                      <button type="submit" class="btn rounded-pill btn-success my-4">Update</button>
                      
                      
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection