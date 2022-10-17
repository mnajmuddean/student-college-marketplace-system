<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{

    public function Index(){
        return view('admin.adminlogin');
    } //end method

    public function Dashboard(){
        return view ('admin.index');
    } //end method

    public function Login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => 
        $request->password], $request->remember)) {
        return redirect()->intended(route('admin.dashboard')->with('error','Admin Login Successfully!'));
        }else{
            return back()->with('error','Invalid Email or Passowrd');
        }

        // if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password'] ])){

        //     return redirect()->route('admin.dashboard')->with('error','Admin Login Successfully');
        //      }
        // else{
        //     return back()->with('error','Invalid Email or Passowrd');
        // }
  
    }   //end method
}
