@extends('admin.admin_master')
@section('admin')


		<!-- BEGIN #content -->

            <div class="col-12">
                <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Edit Sub Category</h5>
                  <form method="post" action="{{ route('subcategory.store')  }}">
                    @csrf

                    <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Select Category</label>
                    <div class="col-md-8 col-lg-9">
                        <select class="form-select" aria-label="Default select example" name="categoryID">
                        <option selected="" disabled="">Choose Category</option>
                       @foreach($categories as $category)
                        <option value="{{   $category->id   }}" {{  $category->id == $subcategory->categoryID ? 'selected' : '' }} >{{    $category->categoryName}}</option>
                    @endforeach    
                    </select>
                    </div>
                    </div>

                    <div class="row mb-3">
                    <label for="subcategoryName" class="col-md-4 col-lg-3 col-form-label">Sub Category Name</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="subcategoryName" type="text" class="form-control" id="subcategoryName" value="{{   $subcategory->subcategoryName}}"required>
                        @error('subcategoryName')
                        <span class="text-danger">{{  $message }}</span>
                        @enderror
                    </div>
                    </div>

                    

                    <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Update Sub Category" ></button>
                    </div>
                    </form>
                </div>
              </div>
            </div>



            



@endsection