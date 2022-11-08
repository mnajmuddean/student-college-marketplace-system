<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function BrandView(){
            $brands = Brand::latest()->get();
            return view('backend.brand.brandView', compact('brands'));
    }

    public function AddBrand(Request $request){
        $request->validate([
            'brandName'=> 'required',
            'brandImage'=> 'required',
        ]);

        $image = $request->file('brandImage');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brandImages/'.$name_gen);
        $save_url = 'upload/brandImages/'.$name_gen;

        Brand::insert([
            'brandName' => $request->brandName,
            'brandImage' => $save_url,
        ]);

        $notification = array(

            'message' => 'Brand Successfully Added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //end method

    public function EditBrand($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.editBrand', compact('brand'));
    }

    public function UpdateBrand(Request $request){
        $brand_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('brandImage')){
            unlink($old_img);
            $image = $request->file('brandImage');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brandImages/'.$name_gen);
            $save_url = 'upload/brandImages/'.$name_gen;
    
            Brand::findOrFail($brand_id)->update([
                'brandName' => $request->brandName,
                'brandImage' => $save_url,
            ]);
    
            $notification = array(
    
                'message' => 'Brand Successfully Updated',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.brand')->with($notification);
        }else{

        }
    }

    
    //
}
