<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Order;
use App\Models\OrderProduct;
use Auth;
use Carbon\Carbon;

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

    public function pendingOrder(){
        $orders = Order::select('orderStatus','invoice_no','payment_method','amount', 'orderTime', 'op.qty','op.price')
                    ->join('order_products as op', 'orders.id', '=', 'op.orderID')
                    ->join('sellers_products as sp', 'op.productID', '=', 'sp.productID')
                    ->join('products as p', 'sp.productID', '=', 'p.productID')
                    ->where('orderStatus', 'Pending')
                    ->get();
        
        return view('student.order.readOrder',compact('orders'));
    }
    //
}
