<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function AddToCart(Request $request, $productID){
        $product= Product::findOrFail($productID);

        Cart::add([
            'id' => $productID,
            'name' => $request->productName,
            'qty' => $request->quantity,
            'price' => $product->productPrice,
            'weight' => 1, 
            'image' => $product->productThumbnail,
            
        ]);

        return response()->json(['success' => 'Add To Cart Successfully']);
    }

    public function MiniCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));
    }

    public function RemoveMiniCart($rowId){
    	Cart::remove($rowId);
    	return response()->json(['success' => 'Product Remove from Cart']);

    }
    //
}
