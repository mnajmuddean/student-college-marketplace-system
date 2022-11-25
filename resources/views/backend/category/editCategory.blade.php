@extends('admin.admin_master')
@section('admin')


		<!-- BEGIN #content -->

            <div class="col-12">
                <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Edit Category</h5>
                  <form method="post" action="{{ route('category.update',$category->categoryID)  }}">
                    @csrf

                    <input type="hidden" name="id" value="{{    $category->categoryID}}">

                    <div class="row mb-3">
                    <label for="categoryName" class="col-md-4 col-lg-3 col-form-label">Category Name</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="categoryName" type="text" class="form-control" id="categoryName" value="{{$category->categoryName}}" required>
                        @error('categoryName')
                        <span class="text-danger">{{  $message }}</span>
                        @enderror
                    </div>
                    </div>

                    <div class="row mb-3">
                    <label for="categoryImage" class="col-md-4 col-lg-3 col-form-label">Category Icon</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="categoryImage" type="text" class="form-control" id="categoryImage" value="{{$category->categoryImage}}" required>
                        @error('categoryImage')
                        <span class="text-danger">{{  $message }}</span>
                        @enderror
                    </div>
                    </div>

                    <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Update Category" ></button>
                    </div>
                    </form>
                </div>
              </div>
            </div>



            



@endsection