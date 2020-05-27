<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
class ProductController extends Controller
{

   


     public function AuthCheck () {

     $admin_id=Session::get('admin_id');

     if($admin_id){
      return;
     }else{
      return redirect()->route('adminlogin')->send();
     }


    }


    public function addproduct (){
           $this->AuthCheck();
      return view ('product.addproduct');


    }
    
     public function storeproduct (Request $request){
           $this->AuthCheck();

      $data=array();
      $data['product_name']=$request->product_name;
      $data['catagory_id']=$request->catagory_id;
      $data['brand_id']=$request->brand_id;
      $data['product_long_description']=$request->product_long_description;
      $data['product_short_description']=$request->product_short_description;
      $data['product_price']=$request->product_price;
      $data['product_size']=$request->product_size;
      $data['product_color']=$request->product_color;
      $data['product_quantity']=$request->product_quantity;
      $data['product_status']=$request->product_status;
      $image=$request->file('product_image');

   

      if($image){
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext; 
        $upload_path='product/image/';
        $image_url=$upload_path.$image_full_name; 
        $success=$image->move($upload_path,$image_full_name);
        $data['product_image']=$image_url;
      //  rturn response()->json($data);
        DB::table('products')->insert($data);
        Session::put('massage','successfully inserted !!');
        
        return redirect()->route('addproduct');

       }

    }
    public function allproduct () {
         $this->AuthCheck();

     
          $data=DB::table('products')
            ->join('tbl_catagory','products.catagory_id','tbl_catagory.catagory_id')
            ->select('products.*','tbl_catagory.catagory_id','tbl_catagory.catagory_name')
            ->get();

         return view ('product.allproduct',compact('data'));

    }

    public function productinactive($id){
           $this->AuthCheck();


        $data=DB::table('products')->where('product_id',$id)
                                   ->update(['product_status'=>0]);

        Session::put('noti','Product Status Change Active to inactive Successfully !!');
               return redirect() ->back();

    }
      public function productactive($id){
             $this->AuthCheck();


      $data=DB::table('products')->where('product_id',$id)
                                   ->update(['product_status'=>1]);

        Session::put('noti','Product Status Change Inactive to Active Successfully !!');
               return redirect() ->back();

    }
    
     public function editproduct ($id){
           $this->AuthCheck();


    $data=DB::table('products')->where('product_id',$id)->first();

      return view ('product.editproduct',compact('data'));
    
   }
   

   public function updateeproduct (Request $request,$id){
         $this->AuthCheck();

    	$data=array();
      $data['product_name']=$request->product_name;
      $data['catagory_id']=$request->catagory_id;
      $data['brand_id']=$request->brand_id;
      $data['product_long_description']=$request->product_long_description;
      $data['product_short_description']=$request->product_short_description;
      $data['product_price']=$request->product_price;
      $data['product_size']=$request->product_size;
      $data['product_color']=$request->product_color;
      $data['product_quantity']=$request->product_quantity;
      $data['product_status']=$request->product_status;
      $image=$request->file('product_image');
      $img=$request->old_image;

      if($image){
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext; 
        $upload_path='product/image/';
        $image_url=$upload_path.$image_full_name; 
        $success=$image->move($upload_path,$image_full_name);
        $data['product_image']=$image_url;
        unlink($img);
      //  rturn response()->json($data);
        DB::table('products')->where('Product_id',$id)->update($data);
        Session::put('noti','Successfully Products Information Details Updated  !!');
        return Redirect()->route('allproduct');

       }
       
       else{
         $data['product_image']=$request->old_image;
         DB::table('products')->where('product_id',$id)->update($data);
        Session::put('noti','Successfully Products Information Details Updated  !!');
        return Redirect()->route('allproduct');
       }



   }

   public function  deleteproduct ($id){
         $this->AuthCheck();

      $data=DB::table('products')
             ->where('product_id',$id)
             ->delete();

       Session::put('noti','Successfully Products Information Deleted  !!');
       return Redirect()->route('allproduct');
   }
}
