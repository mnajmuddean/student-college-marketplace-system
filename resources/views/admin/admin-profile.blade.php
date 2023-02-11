@extends('admin.admin_master')
@section('admin')


<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{ (!empty($adminData->profile_photo_path))? url('upload/adminImages/'.$adminData->profile_photo_path):url('upload/no_image.png') }}" alt="Profile" class="rounded-circle">
              <h2>{{    $adminData->name    }} </h2>
              

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title text-center">About</h5>
                  <p class="small fst-italic">The admin is from College Representative Committee (JPK) of UiTM Jasin. </p>

                  <h5 class="card-title text-center">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{    $adminData->name    }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{    $adminData->email}}</div>
                  </div>
                  

                </div>

                <a  href="{{ route('admin.profile.edit') }}" class="btn btn-primary rounded-pill">Edit Profile</a>

            </div>
          </div>

        </div>
      </div>
    </section>
    @endsection
