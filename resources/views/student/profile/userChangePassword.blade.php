@extends('student.main_master')
@section('content')
<!-- @php
$user = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp -->

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

    <div class="row">
        <div class="col-xl-4">

        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="{{ (!empty($user->profile_photo_path))? url('upload/userImages/'.$user->profile_photo_path):url('upload/no_image.png') }}" alt="Profile" class="rounded-circle" style="height:20% ; width: 20%">
            <h5 class="mt-20">{{ Auth::user()->name }}</h5>
            <h5>{{ Auth::user()->matricNo }}</h5>
            <div class="btn-group-vertical mt-20" role="group" aria-label="Basic example">
          
            <a href="{{ route('dashboard')}}"  type="button" class="btn btn-primary mt-5">My Profile</a>
              <a href="{{ route('add.product')}}"  type="button" class="btn btn-primary mt-5">Add Product</a>
              <a href="{{ route('manage.product')}}"  type="button" class="btn btn-primary mt-5">View Product</a>
              <a href="{{ route('student.profile')}}"  type="button" class="btn btn-primary mt-5">Update Profile</a>
              <a href="{{ route('student.orders')}}"  type="button" class="btn btn-primary mt-5">My Orders</a>
              <a href="{{ route('student.pendingorder')}}" type="button" class="btn btn-primary  mt-5">Customer's Order</a>
              <a href="{{ route('student.changePassword')}}" type="button" class="btn btn-primary  mt-5">Change Password</a>
              <a href="{{ route('student.logout')}}" type="button" class="btn btn-danger  mt-5">Logout</a>



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

                  <!-- Profile Edit Form -->
                  <form class="card-body pt-3 mt-20" method="post" action="{{ route('student.updatePassword')}}" >
                    @csrf

                    <div class="row mb-3">
                      <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="oldpassword" type="password" class="form-control" id="current_password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                      </div>
                    </div>

                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-danger">Change Password</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>


      <!-- <div class="row align-items-center">
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
                    <div class="col-lg-4 col-md-4 label">Email : </div>
                    <div class="col-lg-8 col-md-8">{{ Auth::user()->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Matric No : </div>
                    <div class="col-lg-8 col-md-8">{{ Auth::user()->matricNo }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Phone No : </div>
                    <div class="col-lg-8 col-md-8">{{ Auth::user()->phoneNo }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Student Course : </div>
                    <div class="col-lg-8 col-md-8">{{ Auth::user()->studCourse }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Room No : </div>
                    <div class="col-lg-8 col-md-8">{{ Auth::user()->roomNo }}</div>
                  </div>

                  <ul class="list-group list-group-flush align-items-center mt-20">
                    <a href="{{ route('dashboard')}}" class="btn btn-primary btn-sm btn-block" style="width:50%">Home</a>
                    <a href="{{ route('student.profile')}}" class="btn btn-primary btn-sm btn-block" style="width:50%">Update Profile</a>
                    <a href="{{ route('student.changePassword')}}" class="btn btn-primary btn-sm btn-block" style="width:50%">Change Password</a>
                    <a href="{{ route('student.logout')}}" class="btn btn-danger btn-sm btn-block" style="width:50%">Logout</a>
                  <ul>
              </div>
              
            </div>

          </div>

          <div class="row align-items-center">
        <div class="col-md-12 ">

        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          <div class="card-body pt-3 mt-20" >

                  

                </div>
                        </div>
                        </div>
                        </div>
                        </div>

        

        </div>
      </div> -->

  </main><!-- End #main -->







@endsection