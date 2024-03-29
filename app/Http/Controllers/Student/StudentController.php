<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultipleImage;
use App\Models\Feedbacks;
use Illuminate\Support\Facades\Hash;
use Gloudemans\Shoppingcart\Facades\Cart;

class StudentController extends Controller
{

    public function index(){

        $categories = Category::orderBy('categoryName','ASC')->get();
        $products = Product::orderBy('productName','ASC')->get();

        
        return view('student.index',compact('categories','products'));
    }


    public function StudentLogout(){
        Auth::logout();

        Cart::destroy();
        return redirect()->route('login');
    }

    public function StudentProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('student.profile.userProfile',compact('user'));
    }

    public function StudentEditProfile(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->matricNo = $request->matricNo;
        $data->phoneNo = $request->phoneNo;
        $data->studCourse = $request->studCourse;
        $data->roomNo = $request->roomNo;

        if($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/userImages/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/userImages'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(

            'message' => 'Student Profile Successfully Update',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }

    public function StudentChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('student.profile.userChangePassword', compact('user'));
    }

    public function StudentUpdatePassword(Request $request){
        $validateData = $request->validate([
            
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]); 
        
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('student.logout');
        }else{
            return redirect()->back();
        }
    }

    public function productDetails($id){

        $products = Product::select('productName', 'productPrice', 'productThumbnail','productDescription','users.name','users.matricNo','users.profile_photo_path') 
                                    ->where('products.productID',$id)                  
                                    ->join('sellers_products', 'products.productID', '=', 'sellers_products.productID')
                                    ->join('users', 'users.id', '=', 'sellers_products.userID')
                                    ->get();
                                //    echo json_encode($products);

        $multiImage = MultipleImage::where('productID',$id)->get();


        $feedback = Feedbacks::select('feedbackMessage','feedbackTime','users.name','users.profile_photo_path')
                                    ->where('feedbacks.productID',$id)
                                    ->join('users', 'users.id', '=', 'feedbacks.userID')
                                    ->get();

        
       
        return view('student.product.productDetails',compact('products','multiImage','feedback'));
    }

    public function CategoryWiseProduct($categoryID){
        $categories = Category::findOrFail($categoryID);
        $products = Product::where('categoryID',$categoryID)->get();
        return view('student.category.categoryView',compact('categories','products'));
    }

    public function ProductViewAjax($id){
        $product = Product::with('category')->findOrFail($id);


        return response()->json(array(
            'product' => $product,
        ));
    }

    public function ProductSearch(Request $request){
		$item = $request->search;
		// echo "$item";
        
		$products = Product::where('productName','LIKE',"%$item%")->get();
        $category = Category::orderBy('categoryName','ASC')->get();
		return view('student.product.search',compact('products','category'));
    //
}
}