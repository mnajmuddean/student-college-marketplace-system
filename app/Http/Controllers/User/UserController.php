<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class UserController extends Controller
{

    public function index(){
        return view('frontend.index');
    }


    public function UserLogout(){
        Auth::logout();

        return redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.userProfile',compact('user'));
    }

    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->matricNo = $request->matricNo;

        if($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/userImages'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(

            'message' => 'User Profile Successfully Update',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }
    //
}
