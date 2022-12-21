<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\SellersProducts;
use App\Models\MultipleImage;
use Carbon\Carbon;
use Image;
use Auth;

class ProductController extends Controller
{

    public function AddProduct(){

            
            $categories = Category::latest()->get();
            return view('student.product.addProduct',compact('categories'));
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

       
        
        SellersProducts::insert([    
            
            'productID' => $productID,
            'userID' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.product');
   
    }

    public function ManageProduct(){
        $id = Auth::user()->id;

        $products = Product::select('productName', 'products.productID','productPrice', 'productThumbnail','products.categoryID','categories.categoryName','productCode','productQty','productDescription','productStatus') 
        ->where('users.id',$id)                  
        ->join('sellers_products', 'products.productID', '=', 'sellers_products.productID')
        ->join('users', 'users.id', '=', 'sellers_products.userID')
        ->join('categories', 'categories.categoryID', '=', 'products.categoryID')
        ->get();


        return view('student.product.viewProduct',compact('products'));
    }

    public function EditProduct($productID){
        $multiple_images = MultipleImage::where('productID',$productID)->get();
        $categories = Category::latest()->get();
        $products = Product::findOrFail($productID);
        
        return view('student.product.editProduct', compact('categories','products','multiple_images'));

    }

    public function UpdateProduct(Request $request, $productID){
        
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

    public function DeleteProduct($productID){
        $product = Product::findOrFail($productID);
        unlink($product->productThumbnail);
        Product::findOrFail($productID)->delete();

        $images = MultipleImage::where('productID',$productID)->get();
        foreach($images as $img){
            unlink($img->imageName);
            MultipleImage::where('productID',$productID)->delete();
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

    public function UpdateThumbnailImage(Request $request, $productID){
        
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

    public function InactiveProduct($productID){
        Product::findOrFail($productID)->update(['productStatus' => 0]);

        return redirect()->back();

    }

    public function ActiveProduct($productID){
        Product::findOrFail($productID)->update(['productStatus' => 1]);

        return redirect()->back();
    }

    public function allStudent(){
        $users = User::select('name', 'email', 'matricNo','phoneNo','studCourse','roomNo','profile_photo_path')->get();

        return view ('admin.allStudent',compact('users'));
    }

    public function allProduct(){
        $products = Product::latest()->get();

        return view ('admin.allProduct',compact('products'));
    }
    //
}
