<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{

    public function checkoutStore(Request $request){
        $cartTotal = Cart::total();
        if($request->payment_method == 'stripe'){
            return view('student.payment.stripe',compact('cartTotal'));
        }elseif($request->payment_method == 'cash'){
            return view('student.payment.cash',compact('cartTotal'));
        }
    }
    //
}
