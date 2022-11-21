<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function CategoryView(){

        $category = Category::latest()->get();
        return view('backend.category.categoryView', compact('category'));
    }

    public function AddCategory(Request $request){
        $request->validate([
            'categoryName'=> 'required',
            'categoryImage'=> 'required',
        ]);

        Category::insert([
            'categoryName' => $request->categoryName,
            'categoryImage' => $request->categoryImage,
        ]);

        $notification = array(

            'message' => 'Category Successfully Added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function EditCategory($id){
        $category = Category::findOrFail($id);
        return view('backend.category.editCategory', compact('category'));
    }

    public function UpdateCategory(Request $request){
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'categoryName' => $request->categoryName,
            'categoryImage' => $request->categoryImage,
        ]);

        $notification = array(

            'message' => 'Category Successfully Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);
    }

    
    public function DeleteCategory($id){
        Category::findOrFail($id)->delete();

        return redirect()->back();

    }
    //
}
