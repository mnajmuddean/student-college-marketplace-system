@extends('admin.admin_master')
@section('admin')


		<!-- BEGIN #content -->

                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                      <div class="card-body">
                        <h5 class="card-title">All Brands</h5>

                        <table class="table table-borderless datatable">
                          <thead>
                            <tr>
                              <th scope="col">Brand Name</th>
                              <th scope="col">Brand Image</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>

                          @foreach($brands as $item)
                            <tr>
                              <td>{{  $item->brandName}}</td>
                              <td><img src="{{ asset($item->brandImage)}}" style="width: 70px; height: 70px;"></td>
                              <td>
                                <a href="{{ route('brand.edit', $item->id ) }}" class="btn btn-primary">Edit</a>
                                <a href="" id="delete" class="btn btn-danger" >Delete</a>
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
                  <h5 class="card-title">Add Brands</h5>
                  <form method="post" action="{{ route('brand.store')  }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                    <label for="brandName" class="col-md-4 col-lg-3 col-form-label">Brand Name</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="brandName" type="text" class="form-control" id="brandName" required>
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
                    <input type="submit" class="btn btn-primary" value="Add Brand" ></button>
                    </div>
                    </form>
                </div>
              </div>
            </div>



            



@endsection