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
            <img src="{{ (!empty(Auth::user()->profile_photo_path))? url('upload/userImages/'.Auth::user()->profile_photo_path):url('upload/no_image.png') }}" alt="Profile" class="rounded-circle" style="height:20% ; width: 20%">
            <h5 class="mt-20">{{ Auth::user()->name }}</h5>
            <h5>{{ Auth::user()->matricNo }}</h5>
            <div class="btn-group-vertical mt-20" role="group" aria-label="Basic example">
          
            <a href="{{ route('dashboard')}}"  type="button" class="btn btn-primary mt-5">My Profile</a>
              <a href="{{ route('add.product')}}"  type="button" class="btn btn-primary mt-5">Add Product</a>
              <a href="{{ route('manage.product')}}"  type="button" class="btn btn-primary mt-5">View Product</a>
              <a href="{{ route('student.profile')}}"  type="button" class="btn btn-primary mt-5">Update Profile</a>
              <a href="{{ route('student.orders')}}"  type="button" class="btn btn-primary mt-5">My Orders</a>
              <a href="{{ route('student.pendingorder')}}" type="button" class="btn btn-danger  mt-5">Pending Order</a>
              <a href="{{ route('student.changePassword')}}" type="button" class="btn btn-primary  mt-5">Change Password</a>
              <a href="{{ route('student.logout')}}" type="button" class="btn btn-danger  mt-5">Logout</a>



            </div>  
            </div>
          </div>

        </div>

        <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Products</h5>

              <!-- General Form Elements -->
              <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data" >
		 	          @csrf
                <div class="col-12">

                        <div class="row">
                             <div class="col-md-12">
                                <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Choose Category</label>
                                    <div class="col-sm-10">
                                        <select name="categoryID" class="form-select" aria-label="Default select example">
                                        <option selected>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->categoryID }}" > {{  $category->categoryName}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                        
                             </div>
                            

                </div>

             
                <div class="row mb-3">
                  <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="productName" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="productCode" class="col-sm-2 col-form-label">Product Code</label>
                  <div class="col-sm-10">
                    <input type="text" name="productCode" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="productQty" class="col-sm-2 col-form-label">Product Quantity</label>
                  <div class="col-sm-10">
                    <input type="text" name="productQty" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="productPrice" class="col-sm-2 col-form-label">Product Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="productPrice" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="productDescription" class="col-sm-2 col-form-label">Product Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="productDescription"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Product Thumbnail</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file"  name="productThumbnail">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Multiple Images</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="multi_img[]" multiple="" >
                  
                  <div class="row" id="preview_img"></div>
                  </div>
                </div>
                

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Add Product" ></button>
                    </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
</div>

        
      </div>
  </main>





@endsection