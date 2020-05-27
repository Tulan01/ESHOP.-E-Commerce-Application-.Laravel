<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
class CatagoryController extends Controller
{

         
   public function AuthCheck () {

     $admin_id=Session::get('admin_id');

     if($admin_id){
      return;
     }else{
      return redirect()->route('adminlogin')->send();
     }


    }





   public function addcatagory () {
      $this->AuthCheck();
   	 return view ('catagory.addcatagory');
   }

   public function allcatagory (){
        $this->AuthCheck();
      $data=DB::table('tbl_catagory')->get();

         return view ('catagory.allcatagory',compact('data'));
   }
     public function storecatagory (Request $request){

       $data=array();
       $data['catagory_name']=$request->catagory_name;
       $data['catagory_description']=$request->catagory_description;
       $data['cat_pub_st']=$request->catagory_status;
       $result=DB::table('tbl_catagory')->insert($data);
       Session::put('massage','Catagory Inserted Successfully !');

       return redirect()->route('addcatagory');
       
   }
   public function inactive($id){
      $this->AuthCheck();
    $data=DB::table('tbl_catagory')
              ->where('catagory_id',$id)
              ->update(['cat_pub_st'=>0]);
              Session::put('noti','Catagory Status Change Active to inactive Successfully !!');

            return redirect()->route('allcatagory');


   }
   
    public function active($id){
  $this->AuthCheck(); 
    $data=DB::table('tbl_catagory')
              ->where('catagory_id',$id)
              ->update(['cat_pub_st'=>1]);
             Session::put('noti','Catagory Status Change Inactive to Active Successfully !!');
            return redirect()->route('allcatagory');


   }

   public function editcatagory ($id){
         $this->AuthCheck();
    $data=DB::table('tbl_catagory')->where('catagory_id',$id)->first();

      return view ('catagory.editcatagory',compact('data'));
    
   }
  
    public function  updatecatagory (Request $request,$id){
        $this->AuthCheck();
      $data=array();
      $data['catagory_name']=$request->catagory_name;
      $data['catagory_description']=$request->catagory_description;
      $data['cat_pub_st']=$request->catagory_status;

      DB::table('tbl_catagory')->where('catagory_id',$id)->update($data);
   Session::put('noti','Successfully Catagory Details Updated  !!');
            return redirect()->route('allcatagory');

    
   }
   
    public function deletecatagory ($id){
        $this->AuthCheck();

    $data=DB::table('tbl_catagory')->where('catagory_id',$id)->delete();
    Session::put('noti','Successfully Deleted !!');

       return redirect()->route('allcatagory');
   }
}
