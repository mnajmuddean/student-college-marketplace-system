@extends('student.main_master')
@section('content')

@section('title')
 Stripe Payment Page
@endsection

<style>
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  width: 350px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;}
</style>

<script src="https://js.stripe.com/v3"></script>

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
                            <div class="your-order">
                                <div class="payment-method">
                                <h5 class="panel-title mt-20">Select Payment Method : </h5>
                                <form action="{{    route('stripeOrder')}}" method="post" id="payment-form">
                                                        @csrf
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

                                        <div id="card-element" >
                                        <!-- A Stripe Element will be inserted here. -->
                                        </div>
                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>
                                    <br>
                                    <button class="btn btn-primary">Submit Payment</button>
                                    </form>
                                </div>
</div>
                        </div>
                       
                    </div>
                </div>
            </div>

            <script type="text/javascript">
    // Create a Stripe client.
var stripe = Stripe('pk_test_51MGg35C8TGymyPDT77NjbJLC8AitsI1r2vhm4OChioY93AGLcN6ir5BgnQsoj7iHdUaf5xFk9XGdUKUKWBFXpV0h007PZAVV8Z');
// Create an instance of Elements.
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});
// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});
// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  // Submit the form
  form.submit();
}
</script>        

@endsection