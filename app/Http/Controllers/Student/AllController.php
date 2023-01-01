<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class AllController extends Controller
{

    public function studentOrders(){
        $orders = Order::where('userID',Auth::id())->orderBy('id','DESC')->get();
        return view('student.order.orderView',compact('orders'));
    }

    public function orderDetails($orderID){
        $order = Order::where('id',$orderID)->where('userID',Auth::id())->first();
        $orderProduct = OrderProduct::with('product')->where('orderID',$orderID)->orderBy('orderProductID','DESC')->get();
        return view ('student.order.orderDetails',compact('order','orderProduct'));
    }
    //
}
