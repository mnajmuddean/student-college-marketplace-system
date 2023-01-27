<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function completeOrder($orderID){

        Order::findOrFail($orderID)->update(['orderStatus' => 'Completed']);
  
        $notification = array(
              'message' => 'Order Status Successfully Updated',
              'alert-type' => 'success'
          );
  
          return redirect()->route('student.pendingorder')->with($notification);
  
  
      }
}
