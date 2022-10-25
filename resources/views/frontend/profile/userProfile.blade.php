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
              <img src="{{ (!empty($editData->profile_photo_path))? url('upload/adminImages/'.$editData->profile_photo_path):url('upload/no_image.png') }}" alt="Profile" class="rounded-circle" style="height:10% ; width: 10%">
              <h5 class="text-center mt-10">{{ Auth::user()->name }}</h5>
              <h5 class="text-center mt-10">Web Designer</h5>
              <ul class="list-group list-group-flush align-items-center mt-20">
                <a href="" class="btn btn-primary btn-sm btn-block" style="width:50%">Home</a>
                <a href="{{ route('user.profile')}}" class="btn btn-primary btn-sm btn-block" style="width:50%">Update Profile</a>
                <a href="#" class="btn btn-primary btn-sm btn-block" style="width:50%">Change Password</a>
                <a href="{{ route('user.logout')}}" class="btn btn-danger btn-sm btn-block" style="width:50%">Logout</a>
              <ul>

              <div class="card-body pt-3 mt-20">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job</div>
                    <div class="col-lg-9 col-md-8">Web Designer</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">USA</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                  </div>

                



            </div>

            
          </div>

        </div>

        

        </div>
      </div>

  </main><!-- End #main -->







@endsection