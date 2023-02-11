@extends('admin.admin_master')
@section('admin')

@php
            use App\Models\Product;
            use App\Models\Category;
            use App\Models\User;
            use App\Models\Order;
            use App\Models\Admin;

            $products = Product::latest()->get();
           $categories = Category::latest()->get();
           $users = User::latest()->get();

           $user_count = User::count();
           $products_count = Product::count();
           $admin_count = Admin::count();
           $total_amount = Order::sum('amount');

            @endphp
<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                 
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total Sales </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>RM {{$total_amount }}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Registered Products</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-basket"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $products_count}} Products</h6>

                    </div>
                  </div>
                </div>

                

              </div>
            </div>
            <!-- End Revenue Card -->

            

            <!-- Customers Card -->
            <div class="col-xxl-3 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                  
                </div>
               

                <div class="card-body">
                  
                  <h5 class="card-title">Registered Students </h5>
                  

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $user_count }} Students</h6>

                      

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-xl-12">

              <div class="card info-card admin-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>
               

                <div class="card-body">
                  
                  <h5 class="card-title">Registered Admin</h5>
                  

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-workspace"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $admin_count }} Admin</h6>

                      

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->


            <!-- Recent Sales -->
           
          
            <div class="col-12">
              <div class="card top-selling overflow-auto">

               

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
                              <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                      <tr>
                      <td> <img src="{{ asset($item->productThumbnail) }}" style="width:60 px; height:60px"></td>
                              <td> {{ $item['category']['categoryName'] }}  </td>
                              <td>{{  $item->productName}}</td>
                              <td>{{  $item->productCode}}</td>
                              <td>{{  $item->productQty}}</td>
                              <td>{{  $item->productPrice}}</td>
                              <td>{{  $item->productDescription}}</td>
                              <td><a href="{{ route('product.delete' , $item->productID)}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i> </a></td>
                              <td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Registered Students</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Matric Number</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Student Course</th>
                        <th scope="col">Room Number</th>

                      </tr>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                      <tr>
                      <td> <img src="/upload/userImages/{{ $user->profile_photo_path }}" style="width:60 px; height:60px"></td>
                              <td>{{  $user->name}}</td>
                              <td>{{  $user->email}}</td>
                              <td>{{  $user->matricNo}}</td>
                              <td>{{  $user->phoneNo}}</td>
                              <td>{{  $user->studCourse}}</td>
                              <td>{{  $user->roomNo}}</td>
                              <td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

        

      </div>
    </section>
    @endsection
