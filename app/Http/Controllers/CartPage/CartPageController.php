<?php

namespace App\Http\Controllers\CartPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{

    public function cart(){
        return view('student.cart.cartView');
    }

    public function getcart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));
    }

    public function cartRemove($rowId){
        Cart::remove($rowId);
    	return response()->json(['success' => 'Product Remove from Cart']);
    }

    public function CartIncrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        return response()->json(['success' => 'Successfully Add Product Quantity']);

    }

    public function CartDecrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        
        return response()->json('Decrement');
        
        }
    //
}
