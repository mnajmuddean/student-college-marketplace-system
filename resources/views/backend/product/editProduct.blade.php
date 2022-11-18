@extends('admin.admin_master')
@section('admin')

<div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Products</h5>

              <!-- General Form Elements -->
              <form method="post" action="{{ route('product.update') }}">
		 	          @csrf
                      <input type="hidden" name="id" value="{{  $products->id}}">
                <div class="col-12">

                        <div class="row">

                             <div class="col-md-12">
                                <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Choose Category</label>
                                    <div class="col-sm-10">
                                        <select name="categoryID" class="form-select" aria-label="Default select example">
                                        <option selected>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $products->categoryID ? 'selected' : ''}} > {{  $category->categoryName}}</option>
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
                
                

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Update Product" ></button>
                    </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>



          <!-- Multiple Image Update Area -->

          


          <!-- End Multiple Image Update Area -->

        </div>

        <div class="row">
            <div class="card">
                <div class="card-header">Multiple Image</div> 
                <div class="card-body">
                    <h5 class="card-title"> Update Product Multiple Image</h5>
                    <form method="" action="" enctype="multipart/form-data">

                    <div class="row row-sm">

                        @foreach(   $multiImgs as $img)
                        
                        <div class="col-md-3">

                        <div class="card">
                            <img src="{{    asset($img->imageName)  }}" class="card-img-top" style="width: 280px ; height: 130px;">
                            <div class="card-body">
                            <h5 class="card-title">Card with an image on top</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>


                        
                        </div>

                        @endforeach

                  </div>
            </form>
            </div>
            <div class="card-footer"> Footer</div>

            </div>
            </div>


@endsection