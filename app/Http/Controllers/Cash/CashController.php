<?php

namespace App\Http\Controllers\Cash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class CashController extends Controller
{
    public function cashOrder(Request $request){

        $total_amount = round(Cart::total());

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
            'payment_method' => 'Cash On Delivery',
            'payment_type' => 'Cash On Delivery',
            'currency' => 'RM',
            'amount' => $total_amount,
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
