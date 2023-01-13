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
                        <h5 class="card-title">All Orders</h5>
                        

                        <table class="table table-borderless datatable">
                          <thead>
                            <tr>
                              <th scope="col">Date</th>
                              <th scope="col">Invoice</th>
                              <th scope="col">Amount</th>
                              <th scope="col">Payment</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody>

                          @foreach($orders as $order)
                            <tr>
                              <td>{{    $order->orderTime}}</td>
                              <td>{{    $order->invoice_no}}</td>
                              <td>RM {{    $order->amount}}</td>
                              <td>{{    $order->payment_method}}</td>
                              <td><span class="badge bg-success">{{ $order->orderStatus}}</span></td>
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