<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\facades\Redirect;
use Session;
session_start();
class BrandController extends Controller
{

   public function AuthCheck () {

     $admin_id=Session::get('admin_id');

     if($admin_id){
      return;
     }else{
      return redirect()->route('adminlogin')->send();
     }


    }









    public function addbrand (){

       $this->AuthCheck();
    	return view ('brand.addbrand');
    }

    public function storebrand (Request $request){
      
       $this->AuthCheck();

       $data=array();
       $data['brand_name']=$request->brand_name;
       $data['brand_description']=$request->brand_description;
       $data['brand_status']=$request->brand_status;
       $result=DB::table('brands')->insert($data);
       Session::put('massage','Brand Inserted Successfully !');

       return redirect()->route('addbrand');
       
   }
    public function allbrand (){

       $this->AuthCheck();

      $data=DB::table('brands')->get();

         return view ('brand.allbrand',compact('data'));
   }

    public function brandinactive($id){       
       $this->AuthCheck();

         $data=DB::table('brands')
              ->where('brand_id',$id)
              ->update(['brand_status'=>0]);
              Session::put('noti','Brand Status Change Active to inactive Successfully !!');

            return redirect()->route('allbrand');
    
   }
   
    public function brandactive($id){

       $this->AuthCheck();

     $data=DB::table('brands')
              ->where('brand_id',$id)
              ->update(['brand_status'=>1]);
              Session::put('noti','Brand Status Change Inactive to Active Successfully !!');

            return redirect()->route('allbrand');
    
   }

    public function editbrand ($id){

       $this->AuthCheck();

    $data=DB::table('brands')->where('brand_id',$id)->first();

      return view ('brand.editbrand',compact('data'));
    
   }
   public function  updatebrand (Request $request,$id){
   
       $this->AuthCheck();
      $data=array();
      $data['brand_name']=$request->brand_name;
      $data['brand_description']=$request->brand_description;
      $data['brand_status']=$request->brand_status;

      DB::table('brands')->where('brand_id',$id)->update($data);
   Session::put('noti','Successfully Catagory Details Updated  !!');
            return redirect()->route('allbrand');

    
   }
   public function deletebrand ($id){
    
       $this->AuthCheck();

    $data=DB::table('brands')->where('brand_id',$id)->delete();
    Session::put('noti','Successfully Deleted !!');

       return redirect()->route('allbrand');
   }

}
