<?php

namespace App\Http\Controllers\Wishlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Carbon\Carbon;
use Auth;

class WishlistController extends Controller
{

    public function wishlist(){

        return view('student.wishlist.viewWishlist');
    }

    public function getwishlist(){
        $wishlist = Wishlist::with('product')->where('userID',Auth::id())->latest()->get();
        
        return response()->json($wishlist);
        return view('student.wishlist.viewWishlist');
    }

    public function wishlistRemove($wishlistID){
        Wishlist::where('userID',Auth::id())->where('wishlistID', $wishlistID)->delete();
        return response()->json(['success' => 'Product Removed Successfully']);
    }
    //
}
