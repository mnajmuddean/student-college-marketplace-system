@extends('student.main_master')
@section('content')

@section('title')
 Cash On Delivery (COD) Payment Page
@endsection


<script src="https://js.stripe.com/v3"></script>

<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Cash</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Wishlist Area Strat-->
            <div class="checkout-area pt-60 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-total">Total</th>
                                            </tr>
                                        </thead>            
                                        <tbody>
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span> RM <span class="amount" id="cartSubTotal"></span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span> RM <span class="amount" > {{ $cartTotal}}</span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <div class="payment-method">
                                <h5 class="panel-title mt-20">Confirm Your Payment : </h5>
                                <form action="{{    route('cashOrder')}}" method="post" id="payment-form">
                                                        @csrf

                                                        <img src="{{ asset('/logo/cash-payment.png')}}" style="width:50px; ">
                                    <div class="form-row">
                                        <label for="card-element">
                                        <input type="hidden" name="userID" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                        <input type="hidden" name="matricNo" value="{{ Auth::user()->matricNo }}">
                                        <input type="hidden" name="phoneNo" value="{{ Auth::user()->phoneNo }}">
                                        <input type="hidden" name="studCourse" value="{{ Auth::user()->studCourse }}">
                                        <input type="hidden" name="roomNo" value="{{ Auth::user()->roomNo }}">
                                        </label>

                                        

                                   
                                    <br>
                                    <button class="btn btn-primary mt-20">Submit Payment</button>
                                    </form>
                                </div>
</div>
                        </div>
                       
                    </div>
                </div>
            </div>
     

@endsection