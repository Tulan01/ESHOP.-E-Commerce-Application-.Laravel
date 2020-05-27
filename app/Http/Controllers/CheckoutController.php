<?php

namespace App\Http\Controllers;

use Illuminate\Support\facades\Redirect;
use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
session_start();

class CheckoutController extends Controller
{
    public function userlogin (){
    	return view ('pages.userlogin');
    }
    public function usersignup (Request $request){

    	$data=array();
    	$data['cus_name']=$request->cus_name;
    	$data['cus_email']=$request->cus_email;
    	$data['cus_password']=$request->cus_password;
    	$data['cus_mobile']=$request->cus_mobile;

    	$db=DB::table('customers')
    	     ->insertGetId($data);

    	   Session::put('cus_id',$db);
    	   Session::put('cus_name',$request->cus_name);
         return redirect()->route('home');

    }

    public function chechout (){
          $this->UserAuthCheck();

      $info=Session::get('shipping_id');

        //echo $info;
     // return view('pages.checkout');
   

      if($info){
        return view('pages.payment');
      }else{
    	return view('pages.checkout');
      }
    }

    public function douserlogin (Request $request){
       
      $cus_email=$request->cus_email;
       $cus_password=$request->cus_password;

       $data=DB::table('customers')
             ->where('cus_email',$cus_email)
             ->where('cus_password',$cus_password)
             ->first();


         if($data){

         	Session::put('cus_id',$data->cus_id);
         	Session::put('cus_name',$data->cus_name);
            return redirect()->route('home');
         }else{
            Session::put('massage','Email or password invalid');
             return redirect()->back();

         }
    }

     public function userlogout (){
        Session::put('cus_id',0);
        return redirect()->route('home');
     }



       public function UserAuthCheck () {

              $cus_id=Session::get('cus_id');

          if($cus_id){
               return;
         }else{
             return redirect()->route('userlogin')->send();
            }
        }

        public function flash (){
            Session::flush();
            Cart::clear();
            return redirect()->route('home');
        }
}