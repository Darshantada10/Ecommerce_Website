@extends('Layouts.Admin.App')

@section('Content')

@if (session('success'))
<p class="text-primary">{{session('success')}}</p>
@endif

<div class="col-md-12">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Profile</h5>
      </div>
      <div class="card-body">

        <form action="{{route('admin.profile.submit')}}" method="POST" enctype="multipart/form-data">
            @csrf

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="name">Name</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="name" class="input-group-text"><i class="bx bx-user"></i></span>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="{{Auth::user()->name}}"/>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="email">Email</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                <input type="mail" id="email" name="email" class="form-control" placeholder="Enter Your Email" value="{{Auth::user()->email}}" />
              </div>
            </div>
          </div>
         
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="password">Password</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Email" />
                </div>
            <div class="form-text">Only Enter if you want to change your password</div>
            </div>
          </div>
          
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="profile_picture">Profile Picture</label>
            <div class="col-sm-10">

              @if (Auth::user()->profile_picture)
                  <img src="{{asset(Auth::user()->profile_picture)}}" alt="profile picture" class="img-thumbnail mb-3" style="max-width: 200px;">
              @endif
              
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-image-alt"></i></span>
                    <input type="file" id="profile_picture" name="profile_picture" class="form-control" placeholder="Enter Your Email" />
                </div>
            <div class="form-text">Only Upload new if you want to change your profile picture</div>
            </div>
          </div>
         
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection