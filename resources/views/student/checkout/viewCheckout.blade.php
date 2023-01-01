@extends('student.main_master')
@section('content')

@section('title')
 Checkout Page
@endsection

<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Checkout</li>
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
                            <form action="{{ route('checkoutStore')}}" method="POST">
                                @csrf
                                <div class="checkbox-form">
                                    <h3>Billing Details</h3>
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Name <span class="required">*</span></label>
                                                <input placeholder="" type="text" value=" {{ Auth::user()->name    }} ">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Email</label>
                                                <input placeholder="" type="text" value=" {{ Auth::user()->email    }} ">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Matric Number</label>
                                                <input placeholder="" type="text" value=" {{ Auth::user()->matricNo    }} ">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Phone Number</label>
                                                <input placeholder="" type="text" value=" {{ Auth::user()->phoneNo    }} ">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Student Course</label>
                                                <input placeholder="" type="text" value=" {{ Auth::user()->studCourse    }} ">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Room Number</label>
                                                <input placeholder="" type="text" value=" {{ Auth::user()->roomNo    }} ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
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
                                            @foreach($carts as $item)
                                            <tr class="cart_item">
                                                <td><img src="{{ $item->options->image}}" alt="" style="width:200px; height:200px;">
                                              <td class="cart-product-name">{{ $item -> name}}<strong class="product-quantity"> × {{    $item->qty}}</strong></td>
                                              <td class="cart-product-total"><span class="amount">{{    $item->price}}</span></td>  
                                            </tr>
                                            @endforeach
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
                                <h5 class="panel-title mt-20">Select Payment Method : </h5>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div id="accordion">
                                          <div class="card">
                                            <div class="card-header" id="#payment-1">
                                            <input type="radio" name="payment_method" value="stripe" style="width:5%">
                                              <h5 class="panel-title">
                                              
                                                <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Stripe
                                                </a>
                                                <br>
                                                <img src="{{ asset('/logo/stripe.png')}}" style="width:50px; ">
                                              </h5>
                                            </div>
                                          </div>
                                          
                                          <div class="card">
                                            <div class="card-header" id="#payment-2">
                                            <input type="radio" name="payment_method" value="cash" style="width:5%">
                                              <h5 class="panel-title">
                                              
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Cash
                                                </a>
                                                <br>
                                                <img src="{{ asset('/logo/cash-payment.png')}}" style="width:50px; ">
                                              </h5>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="order-button-payment">
                                            <input value="Place order" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

@endsection