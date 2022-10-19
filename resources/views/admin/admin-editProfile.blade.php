@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard')  }}">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
          <li class="breadcrumb-item active">Edit Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

        <div class="col-xl-12">

        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column ">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Edit Profile</h5>

                  <form method="post" action="{{ route('admin.profile.store')  }}" enctype="multipart/form-data" >
                    @csrf

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img id="showImage"  src="{{ (!empty($editData->profile_photo_path))? url('upload/adminImages/'.$editData->profile_photo_path):url('upload/no_image.png') }}" alt="Profile Image">
                        <div class="row mb-3">
                        <label class="col-md-4 col-lg-3 col-form-label"></label>
                        <div class="col-sm-10">
                          <input class="form-control" type="file" id="image" name="profile_photo_path">
                        </div>
                      </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="name" value="{{    $editData->name    }}">
                      </div>
                    </div>

                    
                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="{{    $editData->email    }}">
                      </div>
                    </div>
                  
                   
                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" value="Update"></input>
                    </div>
                  </form><!-- End Profile Edit Form -->



            </div>
          </div>
        </div>
      </div>

    <script type="text/javascript">

      $(document).ready(function(){
        $('#image').change(function(e){
          var reader = new FileReader();
          reader.onload = function (e){
            $('#showImage').attr('src',e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
        });
      });

      </script>

    </section>

@endsection
