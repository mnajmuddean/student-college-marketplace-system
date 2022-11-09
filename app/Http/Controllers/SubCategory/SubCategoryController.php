<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;


class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories = Category::orderBy('categoryName','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategoryView', compact('subcategory','categories'));
    }

    public function AddSubCategory(Request $request){
        $request->validate([
            'categoryID'=> 'required',
            'subcategoryName'=> 'required',
        ]);

        SubCategory::insert([
            'categoryID' => $request->categoryID,
            'subcategoryName' => $request->subcategoryName,
        ]);

        $notification = array(

            'message' => 'SubCategory Successfully Added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function EditSubCategory($id){
        $categories = Category::orderBy('categoryName','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategoryEdit', compact('subcategory','categories'));
    }
    //
}
