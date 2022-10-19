<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $adminData = Admin::find(1);
        return view ('admin.admin-profile',compact('adminData'));
    }

    public function AdminProfileEdit(){
        $editData = Admin::find(1);
        return view ('admin.admin-editProfile',compact('editData'));
    }

    public function AdminProfileStore(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/adminImages'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/adminImages'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(

            'message' => 'Admin Profile Successfully Update',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    } //end method
}
