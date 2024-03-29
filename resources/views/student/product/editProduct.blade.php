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
              <a href="{{ route('student.pendingorder')}}" type="button" class="btn btn-primary  mt-5">Customer's Order</a>
              <a href="{{ route('student.changePassword')}}" type="button" class="btn btn-primary  mt-5">Change Password</a>
              <a href="{{ route('student.logout')}}" type="button" class="btn btn-danger  mt-5">Logout</a>



            </div>  
            </div>
          </div>

        </div>

        
</div>

<div class="card mt-30">
            <div class="card-body">
              <h5 class="card-title">Edit Products</h5>

              <!-- General Form Elements -->
              <form method="post" action="{{ route('product.update', $products->productID) }}">
		 	          @csrf

                
                      <input type="hidden" name="productID" value="{{  $products->productID}}">
                
                      <div class="col-12">

                        <div class="row">

                             <div class="col-md-12">
                                <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Choose Category</label>
                                    <div class="col-sm-10">
                                        <select name="categoryID" class="form-select" aria-label="Default select example">
                                        <option selected>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->categoryID }}" {{ $category->categoryID == $products->categoryID ? 'selected' : ''}} > {{  $category->categoryName}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                        
                             </div>
                            

                </div>

             
                <div class="row mb-3">
                  <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="productName" class="form-control" value="{{    $products->productName}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="productCode" class="col-sm-2 col-form-label">Product Code</label>
                  <div class="col-sm-10">
                    <input type="text" name="productCode" class="form-control" value="{{    $products->productCode}}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="productQty" class="col-sm-2 col-form-label">Product Quantity</label>
                  <div class="col-sm-10">
                    <input type="text" name="productQty" class="form-control" value="{{    $products->productQty}}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="productPrice" class="col-sm-2 col-form-label">Product Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="productPrice" class="form-control" value="{{    $products->productPrice}}">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="productDescription" class="col-sm-2 col-form-label">Product Description</label>
                  <div class="col-sm-10">
                    <input type="text" name="productDescription" class="form-control" value="{{    $products->productDescription}}">
                  </div>
                </div>
                
                

                <div class="card-footer text-center">
                    <input type="submit" class="btn btn-primary " value="Update Product" ></button>
                    </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>



          <!-- Multiple Image Update Area -->

          


          <!-- End Multiple Image Update Area -->

        </div>

        <div class="row mt-20">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Update Product Thumbnail Image</h5>
                    <form method="post" action="{{  route('imagethumbnail.update',  $products->productID )}}" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="productID" value="{{  $products->productID}}">
                      <input type="hidden" name="old_img" value="{{ $products->productThumbnail }}">
                      <div class="row row-sm">
                        <div class="col">

                        <div class="card">
                            <img src="{{  asset( $products->productThumbnail )}}"  style="width: 280px ; height: 130px;">
                            <div class="card-body">
                            <p class="card-text">
                              <div class="form-group">
                                <label class="form-control-label mb-2">Change Image</label>
                                <input class="form-control" type="file" name="productThumbnail">
                          </div>
                            </p>

                            <a href="" class="btn btn-sm btn-danger sm-20" id="delete" title="Delete Data"><i class="sm-5 bi bi-trash-fill"></i> </a> 
                          </div>
                        </div>
                        </div>

                  </div>
                  <div class="card-footer text-center">
                    <input type="submit" class="btn btn-primary" value="Update Image" ></button>
                    </div>
            </form>
            </div>

            </div>
        </div>

        <div class="row mt-20">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Update Product Multiple Image</h5>
                    <form method="post" action="{{  route('multiimage.update')}}" enctype="multipart/form-data">
                      @csrf
                    <div class="row row-sm">

                        @foreach(   $multiple_images as $img)
                        
                        <div class="col">

                        <div class="card">
                            <img src="{{  asset( $img->imageName )}}"  style="width: 280px ; height: 130px;">
                            <div class="card-body">
                              
                              
                            <p class="card-text">
                              <div class="form-group">
                                <label class="form-control-label mb-2">Change Image</label>
                                <input class="form-control" type="file" name="multi_img[ {{ $img ->id }} ]">
                          </div>
                            </p>
                            <a href="{{ route('multiimage.delete' , $img->id)}}" class="btn btn-sm btn-danger sm-20" id="delete" title="Delete Data"><i class="sm-5 bi bi-trash-fill"></i> </a>
                          </div>
                        </div>


                        
                        </div>

                        @endforeach
                  </div>
                  <div class="card-footer text-center">
                    <input type="submit" class="btn btn-primary" value="Update Image" ></button>
                    </div>
             </form>
            </div>

            </div>
            </div>

        
      </div>
  </main>





@endsection