@extends('student.main_master')
@section('content')

@section('title')
 Stripe Payment Page
@endsection

<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Stripe</li>
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
                        
                                <div class="payment-method">
                                <h5 class="panel-title mt-20">Select Payment Method : </h5>
                                    <div class="payment-accordion">
                                        <div id="accordion">
                                          <div class="card">
                                            <div class="card-header" id="#payment-1">
                                            <input type="radio" name="payment_method" value="stripe" style="width:5%">
                                              <h5 class="panel-title">
                                              
                                                <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Online Banking
                                                </a>
                                                <br>
                                                <img src="{{ asset('/logo/stripe.png')}}" style="width:80px; ">
                                              </h5>
                                            </div>
                                          </div>
                                          
                                          <div class="card">
                                            <div class="card-header" id="#payment-2">
                                            <input type="radio" name="payment_method" value="stripe" style="width:5%">
                                              <h5 class="panel-title">
                                              
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Cash
                                                </a>
                                                <br>
                                                <img src="{{ asset('/logo/cash-payment.png')}}" style="width:80px; ">
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
                </div>
            </div>

@endsection