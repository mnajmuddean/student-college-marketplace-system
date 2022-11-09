@extends('admin.admin_master')
@section('admin')


		<!-- BEGIN #content -->

                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                      <div class="card-body">
                        <h5 class="card-title">All Category</h5>

                        <table class="table table-borderless datatable">
                          <thead>
                            <tr>
                              <th scope="col">Category Icon</th>
                              <th scope="col">Category Name</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>

                          @foreach($category as $item)
                            <tr>
                              <td><span><i class="{{ $item->categoryImage }}"></i></span></td>
                              <td>{{  $item->categoryName}}</td>
                              <td>
                                <a href="{{ route('category.edit', $item->id ) }}" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> </a>
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
                  <h5 class="card-title">Add Category</h5>
                  <form method="post" action="{{ route('category.store')  }}">
                    @csrf

                    <div class="row mb-3">
                    <label for="categoryName" class="col-md-4 col-lg-3 col-form-label">Category Name</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="categoryName" type="text" class="form-control" id="categoryName" required>
                        @error('categoryName')
                        <span class="text-danger">{{  $message }}</span>
                        @enderror
                    </div>
                    </div>

                    <div class="row mb-3">
                    <label for="categoryImage" class="col-md-4 col-lg-3 col-form-label">Category Icon</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="categoryImage" type="text" class="form-control" id="categoryImage" required>
                        @error('categoryImage')
                        <span class="text-danger">{{  $message }}</span>
                        @enderror
                    </div>
                    </div>

                    <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Add Category" ></button>
                    </div>
                    </form>
                </div>
              </div>
            </div>



            



@endsection