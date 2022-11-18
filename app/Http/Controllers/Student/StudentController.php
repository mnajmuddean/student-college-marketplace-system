<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    public function index(){
        return view('student.index');
    }


    public function StudentLogout(){
        Auth::logout();

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
    //
}