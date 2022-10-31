@extends('frontend.main_master')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


      <div class="row align-items-center">
        <div class="col-md-12 ">

        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="{{ (!empty($user->profile_photo_path))? url('upload/userImages/'.$user->profile_photo_path):url('upload/no_image.png') }}" alt="Profile" class="rounded-circle" style="height:10% ; width: 10%">
              
              <div class="card-body pt-3 mt-20">
                  <h5 class="card-title text-center">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label ">Name : </div>
                    <div class="col-lg-8 col-md-8">{{ Auth::user()->name }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Matric No : </div>
                    <div class="col-lg-8 col-md-8">{{ Auth::user()->matricNo }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Email : </div>
                    <div class="col-lg-8 col-md-8">{{ Auth::user()->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Country : </div>
                    <div class="col-lg-8 col-md-8">USA</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Address : </div>
                    <div class="col-lg-8 col-md-8">A108 Adam Street, New York, NY 535022</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Phone : </div>
                    <div class="col-lg-8 col-md-8">(436) 486-3538 x29071</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Email : </div>
                    <div class="col-lg-8 col-md-8">k.anderson@example.com</div>
                  </div>

                  <ul class="list-group list-group-flush align-items-center mt-20">
                    <a href="{{ route('dashboard')}}" class="btn btn-primary btn-sm btn-block" style="width:50%">Home</a>
                    <a href="{{ route('user.profile')}}" class="btn btn-primary btn-sm btn-block" style="width:50%">Update Profile</a>
                    <a href="{{ route('user.changePassword')}}" class="btn btn-primary btn-sm btn-block" style="width:50%">Change Password</a>
                    <a href="{{ route('user.logout')}}" class="btn btn-danger btn-sm btn-block" style="width:50%">Logout</a>
                  <ul>
              </div>
              
            </div>

          </div>

          <div class="row align-items-center">
        <div class="col-md-12 ">

        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          <div class="card-body pt-3 mt-20" >
                  <!-- Profile Edit Form -->
                  <form class="card-body pt-3 mt-20" method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="{{ (!empty($user->profile_photo_path))? url('upload/userImages/'.$user->profile_photo_path):url('upload/no_image.png') }}"  style="height:60% ; width: 40%" alt="Profile">
                        <div class="pt-2">
                          <input class="form-control" type="file" id="image" name="profile_photo_path">
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Matric No</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="matricNo" type="text" class="form-control" id="matricNo" value="{{ $user->matricNo }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="{{ $user->email }}">
                      </div>
                    </div>

                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>
                        </div>
                        </div>
                        </div>
                        </div>

        

        </div>
      </div>

  </main><!-- End #main -->







@endsection