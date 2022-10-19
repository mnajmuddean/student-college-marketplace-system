@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="pagetitle">
      <h1>Change Password</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Change Password</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

        <div class="col-xl-12">

        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column ">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Edit Profile</h5>

                    <form method="post" action="{{ route('update.change.password')  }}" >
                    @csrf

                    <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="oldpassword" type="password" class="form-control" id="current_password" required>
                    </div>
                    </div>

                    <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="password" required>
                    </div>
                    </div>

                    <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" required>
                    </div>
                    </div>

                    <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Change Password" ></button>
                    </div>
                    </form>
                    <!-- End Profile Edit Form -->



            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
