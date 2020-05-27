<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\facades\Redirect;
use Session;
session_start();
class AdminController extends Controller
{
    public function showlogin (){

    	return view ('admin.admin_login');
    }

    

    public function dologin (Request $request) {
    	$admin_email=$request->admin_email;
    	$admin_password=md5($request->admin_password);

    	$result=DB::table('tbl_admin')
    	       ->where('admin_email',$admin_email)
    	       ->where('admin_password',$admin_password)
    	       ->first(); 


    	       if($result){
    	       	Session::put('admin_name',$result->admin_name);
    	       	Session::put('admin_id',$result->admin_id);

    	       	return redirect()->route('dashboard');
    	       }else{
    	       		Session::put('massage','Email Or Password Invalid');
    	       		return Redirect()->back();
    	       }

    }
}
