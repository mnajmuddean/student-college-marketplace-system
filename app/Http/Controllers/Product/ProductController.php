<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{

    public function AddProduct(){
            $categories = Category::latest()->get();
            $brands = Brand::latest()->get();
            return view('backend.product.addProduct',compact('categories','brands'));
    }

    
    //
}
