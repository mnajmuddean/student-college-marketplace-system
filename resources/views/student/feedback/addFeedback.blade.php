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

    <div class="contact-main-page mt-60 mb-40 mb-md-40 mb-sm-40 mb-xs-40">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                            <div class="contact-page-side-content">
                                <h3 class="contact-page-title">Product Details</h3>

                                @foreach ($orderProduct as $orderProduct)

                                <div class="single-contact-block">
                                <img src="{{ asset($orderProduct->product->productThumbnail)}}" style="width:150px; height:150px">
                                </div>

                              

                                <div class="single-contact-block">
                                    <h4>Product Name</h4>
                                    <p>{{ $orderProduct->product->productName}}</p>
                                </div>

                                <div class="single-contact-block">
                                    <h4>Product Description</h4>
                                    <p>{{ $orderProduct->product->productDescription}}</p>
                                </div>

                                <div class="single-contact-block">
                                    <h4>Product Quantity</h4>
                                    <p>{{ $orderProduct->qty}}</p>
                                </div>

                                <div class="single-contact-block">
                                    <h4>Price</h4>
                                    <p>RM {{ $orderProduct->qty* $orderProduct->price }}</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                            <div class="contact-form-content pt-sm-55 pt-xs-55">
                                <h3 class="contact-page-title">Add Feedback</h3>
                                <div class="contact-form">
                                <form method="post" action="{{ route('createFeedback')}}">
                                            @csrf

                                            <input type="hidden" name="productID" value="{{ $orderProduct->product->productID }}">

                                        <div class="form-group mb-30">
                                            <label>Feedback Message</label>
                                            <textarea name="feedbackMessage"  placeholder="Enter Your Feedback"></textarea>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-upper">Submit</button>
                                    </form>
                                </div>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
  </main>





@endsection