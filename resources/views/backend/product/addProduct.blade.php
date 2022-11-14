@extends('admin.admin_master')
@section('admin')

<div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Products</h5>

              <!-- General Form Elements -->
              <form>
                <div class="col-12">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Choose Brand</label>
                                    <div class="col-sm-10">
                                        <select name="brandID" class="form-select" aria-label="Default select example">
                                        <option selected>Select Brand</option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" > {{  $brand->brandName}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                        
                             </div>

                             <div class="col-md-6">
                                <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Choose Category</label>
                                    <div class="col-sm-10">
                                        <select name="categoryID" class="form-select" aria-label="Default select example">
                                        <option selected>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" > {{  $category->categoryName}}</option>
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
                  <label for="productTag" class="col-sm-2 col-form-label">Product Tag</label>
                  <div class="col-sm-10">
                    <input type="text" name="productTag" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="productPrice" class="col-sm-2 col-form-label">Product Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="productPrice" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="productDiscountPrice" class="col-sm-2 col-form-label">Product Discount Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="productDiscountPrice" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="productDescription" class="col-sm-2 col-form-label">Product Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px"></textarea>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Product Thumbnail</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>

                <div class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Product Status</legend>
                  <div class="col-sm-10">

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1">
                        Example checkbox
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                      <label class="form-check-label" for="gridCheck2">
                        Example checkbox 2
                      </label>
                    </div>

                  </div>
                </div>
                

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Add Product" ></button>
                    </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        



            



@endsection