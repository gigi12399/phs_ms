@extends('schoolTemplate.layout')
@section('title', 'Update Teacher')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Update Teacher</h1>
        </div>
        <div class="col">
            <a href="{{ route('teacher.index')}}" class="btn rounded-pill btn-primary float-end">Back</a>
        </div>
        <div class="d-flex justify-content-center">
          <div class="col-8">
            <div class="row mt-5">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Insert Data</h5>
                  <small class="text-muted float-end">Teacher</small>
                </div>
                <div class="card-body">
                  <form action="{{route('teacher.update', $teacher->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                              value="{{ $teacher->name }}"
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
                              value="{{ $teacher->address }}"
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
                          <label class="form-label" for="basic-icon-default-email">Email</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input
                              name = "email"
                              type="email"
                              value="{{ $teacher->email }}"
                              id="basic-icon-default-email"
                              class="form-control"
                              placeholder="john.doe@gmail.com"
                            />
                          </div>
                          @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                          <div class="form-text">You can use letters, numbers & periods</div>
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
                              value="{{ $teacher->phone }}"
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
                          <label class="form-label" for="basic-icon-default-nrc">NRC</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-card"></i></span>
                            <input
                              name = "nrc"
                              type="text"
                              value="{{ $teacher->nrc }}"
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
                          <label class="form-label" for="basic-icon-default-salary">Salary</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"
                              ><i class="bx bx-money"></i
                            ></span>
                            <input
                              name = "salary"
                              type="number"
                              value="{{ $teacher->salary }}"
                              id="basic-icon-default-salary"
                              class="form-control"
                              placeholder="4xxxxx"
                            />
                          </div>
                          @error('salary')
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
                            <span class="input-group-text mt-2"><i class="bx bx-cake"></i></span>
                            <input
                              name = "birthday"
                              type="date"
                              value="{{ $teacher->birthday }}"
                              id="basic-icon-default-birthday"
                              class="form-control mt-2"
                            />
                          </div>
                          @error('birthday')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col">
                          <label class="form-label" for="basic-icon-default-profile">Profile Image</label>
                          <img width="50" height="40" src="{{asset('school/profile/teacher/'.$teacher->id.'/'.$teacher->profile)}}" class="ms-3">
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
                                @if ($teacher->gender == 1)
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
                                @if ($teacher->gender == 0)
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
                          <label class="form-label" for="degree">Degree</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"
                              ><i class="bx bx-certification"></i
                            ></span>
                            <input
                              name="degree"
                              type="text"
                              id="degree"
                              class="form-control"
                              placeholder="Enter Your Degree.."
                              value="{{$teacher->degree}}"
                            />
                          </div>
                          @error('degree')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="row">
                        <div class="col">
                          <label class="form-label" for="grade">Grades</label>
                          <select name="grade[]" id="grade" class="form-control" multiple>
                          @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}"
                              @foreach ($teacher->grades as $g)
                                  @if ($g->id == $grade->id)
                                      {{'selected'}}
                                  @endif
                              @endforeach
                              >{{ $grade->name }}</option>
                          @endforeach
                          </select>
                          @error('grade')
                          <div class="text-danger small">{{ $message }}</div>
                      @enderror
                        </div>
                        <div class="col">
                          <label class="form-label" for="basic-icon-default-description">Description</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"
                              ><i class="bx bx-comment"></i
                            ></span>
                            <textarea
                              name = "description"
                              id="basic-icon-default-description"
                              class="form-control"
                              placeholder="Write here...."
                            >{{ $teacher->description }}</textarea>
                          </div>
                          @error('description')
                              <div class="text-danger small">{{ $message }}</div>
                          @enderror
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