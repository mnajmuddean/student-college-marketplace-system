@extends('student.main_master')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <div class="col-xl-4 mb-20">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="{{ (!empty($user->profile_photo_path))? url('upload/userImages/'.$user->profile_photo_path):url('upload/no_image.png') }}" alt="Profile" class="rounded-circle" style="height:20% ; width: 20%">
            <h5 class="mt-20">{{ Auth::user()->name }}</h5>
            <h5>{{ Auth::user()->matricNo }}</h5>
            <div class="btn-group mt-20" role="group" aria-label="Basic example">
              <a href="{{ route('dashboard')}}"  type="button" class="btn btn-primary">My Profile</a>
              <a href="{{ route('student.profile')}}"  type="button" class="btn btn-primary">Add Product</a>
              <a href="{{ route('student.profile')}}"  type="button" class="btn btn-primary">Update Profile</a>
              <a href="{{ route('student.changePassword')}}" type="button" class="btn btn-primary">Change Password</a>
              <a href="{{ route('student.logout')}}" type="button" class="btn btn-danger">Logout</a>
            </div>  
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label ">Name: </div>
                    <div class="col-lg-8 col-md-8">{{ Auth::user()->name }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Email: </div>
                    <div class="col-lg-8 col-md-8">{{ Auth::user()->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Matric No: </div>
                    <div class="col-lg-8 col-md-8">{{ Auth::user()->matricNo }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Phone No: </div>
                    <div class="col-lg-8 col-md-8">{{ Auth::user()->phoneNo }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Student Course: </div>
                    <div class="col-lg-8 col-md-8">{{ Auth::user()->studCourse }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Room No: </div>
                    <div class="col-lg-8 col-md-8">{{ Auth::user()->roomNo }}</div>
                  </div>

                </div>
              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>


      <!-- <div class="row align-items-center">
        <div class="col-md-12 ">

        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              
              
              <div class="card-body pt-3 mt-20">
                  <h5 class="card-title text-center">Profile Details</h5>

                  

                  <ul class="list-group list-group-flush align-items-center mt-20">
                    <a </a>
                    <a </a>
                    <a </a>
                    <a </a>
                  <ul>
              </div>
              
            </div>

          </div>

          

        

        </div>
      </div> -->

  </main><!-- End #main -->







@endsection