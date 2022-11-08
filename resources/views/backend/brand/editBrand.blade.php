@extends('admin.admin_master')
@section('admin')


		<!-- BEGIN #content -->

            <div class="col-12">
                <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Add Brands</h5>
                  <form method="post" action="{{ route('brand.update', $brand->id)  }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $brand->id}}">
                    <input type="hidden" name="old_image" value="{{ $brand->brandImage}}">
                    <div class="row mb-3">
                    <label for="brandName" class="col-md-4 col-lg-3 col-form-label">Brand Name</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="brandName" type="text" class="form-control" id="brandName" value="{{   $brand->brandName}}"required>
                        @error('brandName')
                        <span class="text-danger">{{  $message }}</span>
                        @enderror
                    </div>
                    </div>

                    <div class="row mb-3">
                    <label for="brandImage" class="col-md-4 col-lg-3 col-form-label">Brand Image</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="brandImage" type="file" class="form-control" id="brandImage" required>
                        @error('brandImage')
                        <span class="text-danger">{{  $message }}</span>
                        @enderror
                    </div>
                    </div>

                    <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Update Brand" ></button>
                    </div>
                    </form>
                </div>
              </div>
            </div>



            



@endsection