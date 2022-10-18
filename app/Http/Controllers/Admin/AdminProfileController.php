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
}
