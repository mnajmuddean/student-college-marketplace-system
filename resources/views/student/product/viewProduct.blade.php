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
                    <div class="card recent-sales overflow-auto">

                      <div class="card-body">
                        <h5 class="card-title">All Products</h5>

                        <table class="table table-borderless datatable">
                          <thead>
                            <tr>
                              <th scope="col">Product Image</th>
                              <th scope="col">Product Category</th>
                              <th scope="col">Product Name</th>
                              <th scope="col">Product Code</th>
                              <th scope="col">Product Quantity</th>
                              <th scope="col">Product Price</th>
                              <th scope="col">Product Description</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>

                          @foreach($products as $item)
                            <tr>
                              <td> <img src="{{ asset($item->productThumbnail) }}" style="width:60 px; height:60px"></td>
                              <td> {{ $item->categoryName }}  </td>
                              <td>{{  $item->productName}}</td>
                              <td>{{  $item->productCode}}</td>
                              <td>{{  $item->productQty}}</td>
                              <td>{{  $item->productPrice}}</td>
                              <td>{{  $item->productDescription}}</td>
                              <td>
                                @if(  $item->productStatus == 1)
                                <span class="badge bg-success">Active</span>

                                @else
                                <span class="badge bg-danger">Inactive</span>
                                @endif
                              </td>
                              <td>
                                <a href="{{ route('product.edit', $item->productID ) }}" class="btn btn-primary" title="Product Status"><i class="bi bi-eye-fill"></i> </a>
                                <a href="{{ route('product.edit', $item->productID ) }}" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> </a>
                                
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$item->productID}}"><i class="bi bi-trash-fill"></i></button>

<!-- Modal -->      
                                @foreach($products as $item)
                                <div class="modal fade" id="{{$item->productID}}" tabindex="-1" aria-labelledby="#{{$item->productID}}" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                      <h5 class="modal-title">Delete Product ?</h5> 
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body text-center">
                                                                        <img src="{{ asset('/backend/img/deletegif.gif')}}" alt="" style="width:50%; height:50%"> 
                                                                        <h5 class="modal-title">Are you sure you want to delete this product ? You won't be able to revert this action !</h5>
                                                                        </div>
                                                                        <div class="modal-footer align-item-center">
                                                                          <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                                                          <a type="button" class="btn btn-primary" href="{{ route('product.delete' , $item->productID)}}">Yes, delete it!</a>
                                                                        </div>
                                    </div>
                                  </div>
                                </div>
                                @endforeach
                                
                                @if(  $item->productStatus == 1)
                                <a href="{{ route('product.inactive', $item->productID ) }}" class="btn btn-danger" title="Inactive Now"><i class="bi bi-file-arrow-down"></i> </a>

                                @else
                                <a href="{{ route('product.active', $item->productID ) }}" class="btn btn-success" title="Active Now"><i class="bi bi-file-arrow-up"></i> </a>
                               
                                @endif
                                  
                              </td>
                            </tr>
                            @endforeach

                          </tbody>
                        </table>
                            
                      </div>

                    </div>
                    
                  </div>
</div>
</div>

        
      </div>
  </main>





@endsection