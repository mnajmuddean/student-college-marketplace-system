<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Wishlist;
use Carbon\Carbon;

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
            'options' => [
                'image' => $product->productThumbnail,
                
            ],
            
            
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

    public function addWishlist(Request $request, $productID){
    	if (Auth::check()) {

            $exists = Wishlist::where('userID',Auth::id())->where('productID',$productID)->first();

            if(!$exists){
                Wishlist::insert([
                    'userID' => Auth::id(), 
                    'productID' => $productID, 
                    'created_at' => Carbon::now(), 
                ]);
               return response()->json(['success' => 'Product Added in Your Wishlist']);
            }else{
                return response()->json(['error' => 'This Product Is Already In Your Wishlist']);
            }
            
            
           

        }else{

            return response()->json(['error' => 'Please Login Into Your Account First']);

        }

    } 

    }
    //

