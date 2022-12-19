<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class StripeController extends Controller
{
    public function stripeOrder(Request $request){

        $total_amount = round(Cart::total());

        \Stripe\Stripe::setApiKey('sk_test_51MGg35C8TGymyPDTdrI6eciOT0UJhEMByUacisuafiuP7OuxPLL4KN1Ok5EvNFF0VC1R1Z6XZK0qjvHuFL1w6ivT00iobX9uTc');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => $total_amount*100,
        'currency' => 'myr',
        'description' => 'UiTM Jasin Student College Marketplace System',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);

        // dd($charge);


        $orderID = Order::insertGetId([
            'userID' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'matricNo' => $request->matricNo,
            'phoneNo' => $request->phoneNo,
            'studCourse' => $request->studCourse,
            'roomNo' => $request->roomNo,
            'orderTime' => Carbon::now(),
            'paymentTime' => Carbon::now(),
            'payment_method' => 'Stripe',
            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
            'invoice_no' => 'UJSCMS'.mt_rand(10000000,99999999),
            'orderStatus' => 'Pending',
            'created_at' => Carbon::now(),
        ]);

        $invoice = Order::findOrFail($orderID);

        $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
            'matricNo' => $invoice->matricNo,
            'phoneNo' => $invoice->phoneNo,
            'orderTime' => $invoice->orderTime,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        $carts = Cart::content();
        foreach($carts as $cart){
            OrderProduct::insert([
                'orderID' => $orderID,
                'productID' => $cart->id,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

 

        Cart::destroy();

        $notification = array(
            'message' => 'Your order has been placed !',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);

        

        
    }
    //
}
