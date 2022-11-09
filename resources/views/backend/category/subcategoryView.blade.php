@extends('admin.admin_master')
@section('admin')


		<!-- BEGIN #content -->

                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                      <div class="card-body">
                        <h5 class="card-title">All Sub Category</h5>

                        <table class="table table-borderless datatable">
                          <thead>
                            <tr>
                              <th scope="col">Category</th>  
                              <th scope="col">Category Name</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>

                          @foreach($subcategory as $item)
                            <tr>
                              <td>{{  $item->categoryID}}</td>
                              <td>{{  $item->subcategoryName}}</td>
                              <td>
                                <a href="{{ route('subcategory.edit', $item->id ) }}" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> </a>
                                <a href="" id="delete" class="btn btn-danger"><i class="bi bi-trash-fill"></i> </a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                            
                      </div>

                    </div>
                    
                  </div>

            <div class="col-12">
                <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Add Sub Category</h5>
                  <form method="post" action="{{ route('subcategory.store')  }}">
                    @csrf

                    <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Select Category</label>
                    <div class="col-md-8 col-lg-9">
                        <select class="form-select" aria-label="Default select example" name="categoryID">
                        <option selected="" disabled="">Choose Category</option>
                       @foreach($categories as $category)
                        <option value="{{   $category->id   }}">{{    $category->categoryName}}</option>
                    @endforeach    
                    </select>
                    </div>
                    </div>

                    <div class="row mb-3">
                    <label for="subcategoryName" class="col-md-4 col-lg-3 col-form-label">Sub Category Name</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="subcategoryName" type="text" class="form-control" id="subcategoryName" required>
                        @error('subcategoryName')
                        <span class="text-danger">{{  $message }}</span>
                        @enderror
                    </div>
                    </div>

                    

                    <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Add Sub Category" ></button>
                    </div>
                    </form>
                </div>
              </div>
            </div>



            



@endsection