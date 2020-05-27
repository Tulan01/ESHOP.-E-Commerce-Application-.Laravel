<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\facades\Redurect;
use Session;
session_start();
class SuperAdminController extends Controller
{

  public function home (){
  	
  	    $this->AuthCheck();

    	return view ('admin.admin_dashboard');

   
    }


    public function logout (){

    	Session::flush();
    	return redirect()->route('adminlogin');
    }

    public function AuthCheck () {

     $admin_id=Session::get('admin_id');

     if($admin_id){
     	return;
     }else{
     	return redirect()->route('adminlogin')->send();
     }


    }

}
