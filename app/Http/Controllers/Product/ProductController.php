<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultipleImage;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{

    public function AddProduct(){
            $categories = Category::latest()->get();
            return view('backend.product.addProduct',compact('categories'));
    }

    public function StoreProduct(Request $request){

        $image = $request->file('productThumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/productImages/Thumbnail/'.$name_gen);
        $save_url = 'upload/productImages/Thumbnail/'.$name_gen;
        
        $productID = Product::insertGetId([
            'categoryID' => $request->categoryID,
            'productName' => $request->productName,
            'productCode' => $request->productCode,
            'productQty' => $request->productQty,
            'productPrice' => $request->productPrice,
            'productDescription' => $request->productDescription,
            'productThumbnail' => $save_url,
            'productStatus' =>  1,
            'created_at' =>  Carbon::now(),
        ]);

        $images = $request->file('multi_img');
        foreach ($images as $img){
            $make_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/productImages/multiImage/'.$name_gen);
            $uploadPath = 'upload/productImages/multiImage/'.$make_name;

            MultipleImage::insert([

                'productID' => $productID,
                'imageName' => $uploadPath,
                'created_at' =>  Carbon::now(),

            ]);
        }

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
   
    }

    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.viewProduct',compact('products'));
    }

    public function EditProduct($id){

        $multiImgs = MultipleImage::where('productID',$id)->get();

        $categories = Category::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.editProduct', compact('categories','products','multiImgs'));

    }

    public function UpdateProduct(Request $request){
        $productID = $request->id;
        Product::findOrFail($productID)->update([
            'categoryID' => $request->categoryID,
            'productName' => $request->productName,
            'productCode' => $request->productCode,
            'productQty' => $request->productQty,
            'productPrice' => $request->productPrice,
            'productDescription' => $request->productDescription,
            'productStatus' =>  1,
            'created_at' =>  Carbon::now(),
        ]);

        return redirect()->route('manage.product');

    }


    //
}
