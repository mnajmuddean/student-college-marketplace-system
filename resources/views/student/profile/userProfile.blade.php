@extends('student.main_master')
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
                  <form class="card-body pt-3 mt-20" method="post" action="{{ route('student.profile.edit') }}" enctype="multipart/form-data">
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
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="{{ $user->email }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Matric Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="matricNo" type="text" class="form-control" id="matricNo" value="{{ $user->matricNo }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phoneNo" type="text" class="form-control" id="phoneNo" value="{{ $user->phoneNo }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Student Course</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="studCourse" type="text" class="form-control" id="studCourse" value="{{ $user->studCourse }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Room Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="roomNo" type="text" class="form-control" id="roomNo" value="{{ $user->roomNo }}">
                      </div>
                    </div>

                    

                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
  </main><!-- End #main -->

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

  


        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <div class="card-body pt-3 mt-20" >

                  <form class="card-body pt-3 mt-20" method="post" action="{{ route('student.profile.edit') }}" enctype="multipart/form-data">
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
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="{{ $user->email }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Matric Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="matricNo" type="text" class="form-control" id="matricNo" value="{{ $user->matricNo }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phoneNo" type="text" class="form-control" id="phoneNo" value="{{ $user->phoneNo }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Student Course</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="studCourse" type="text" class="form-control" id="studCourse" value="{{ $user->studCourse }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Room Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="roomNo" type="text" class="form-control" id="roomNo" value="{{ $user->roomNo }}">
                      </div>
                    </div>

                    

                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                  </form>

                </div>
               </div>
          </div>
       </div> -->







@endsection