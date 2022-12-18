<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function checkoutStore(Request $request){
        if($request->payment_method == 'stripe'){
            return view('student.payment.stripe');
        }elseif($request->payment_method == 'cash'){
            return view('student.payment.cash');
        }
    }
    //
}
