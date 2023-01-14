@extends('schoolTemplate.layout')
@section('title', 'Create User')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>My Profile Setting</h1>
        </div>
        <div class="d-flex justify-content-center">
          <div class="col-8">
            <div class="row mt-5">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Change Data</h5>
                  <small class="text-muted float-end">{{ $user->name }}</small>
                </div>
                <div class="card-body">
                  <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <div class="row">
                        <div class="col">
                          <label class="form-label" for="basic-icon-default-profile">Profile Image</label>
                          <img width="50" height="50" class="ms-3" src="{{asset('school/profile/user/'.$user->id.'/'.$user->profile)}}" alt="">
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
                    <div class="row">
                      <button type="submit" class="btn rounded-pill btn-success my-4">Save</button>
                      
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    
    
    @section('script')
    $(document).ready(function(){
      $(document).on('click', '.passButton', function(){
        var password = $('#password').val();
        alert(password);
        var confirm_password = $('#password-confirm').val();
        if(password != confirm_password){
          $('#message').html('The two passwords must match!');
        }else{
          $('#passForm').submit();
        }
      })
    })
        
    @endsection
@endsection