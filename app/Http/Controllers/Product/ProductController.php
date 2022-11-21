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
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/productImages/multiImage/'.$make_name);
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

        return redirect()->route('manage.product');
   
    }

    public function ManageProduct(){
        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.product.viewProduct',compact('products','categories'));
    }

    public function EditProduct($id){
        $multiple_images = MultipleImage::where('productID',$id)->get();
        $categories = Category::latest()->get();
        $products = Product::findOrFail($id);
        
        return view('backend.product.editProduct', compact('categories','products','multiple_images'));

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

    public function DeleteProduct($id){
        $product = Product::findOrFail($id);
        unlink($product->productThumbnail);
        Product::findOrFail($id)->delete();

        $images = MultipleImage::where('productID',$id)->get();
        foreach($images as $img){
            unlink($img->imageName);
            MultipleImage::where('productID',$id)->delete();
        }

        return redirect()->back();
    }

    public function UpdateMultiImage(Request $request){

        $imgs = $request->multi_img;

		foreach ($imgs as $id => $img) {
	    $imgDel = MultipleImage::findOrFail($id);
	    unlink($imgDel->imageName);

    	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    	Image::make($img)->resize(917,1000)->save('upload/productImages/multiImage/'.$make_name);
    	$uploadPath = 'upload/productImages/multiImage/'.$make_name;

        MultipleImage::where('id',$id)->update([
            'imageName' => $uploadPath,
            'updated_at' => Carbon::now(),
        ]);

    	
        }
        return redirect()->back();

    }

    public function UpdateThumbnailImage(Request $request){
        $productID = $request->id;
        $old_image = $request->old_img;
        unlink($old_image);

        $image = $request->file('productThumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/productImages/Thumbnail/'.$name_gen);
        $save_url = 'upload/productImages/Thumbnail/'.$name_gen;

        Product::findOrFail($productID)->update([
            'productThumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back();


    }

    public function DeleteMultiImage($id){
        $old_img = MultipleImage::findOrFail($id);
        unlink($old_img->imageName);

        MultipleImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Image Successfully Delete',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function InactiveProduct($id){
        Product::findOrFail($id)->update(['productStatus' => 0]);

        return redirect()->back();

    }

    public function ActiveProduct($id){
        Product::findOrFail($id)->update(['productStatus' => 1]);

        return redirect()->back();
    }
    //
}
