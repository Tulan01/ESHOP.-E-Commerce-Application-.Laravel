<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class OrderController extends Controller
{
   public function manageorder () {

       $data=DB::table('orders')
               ->join('customers','orders.cus_id','customers.cus_id')
               ->select('orders.*','customers.cus_name','customers.cus_mobile')
               ->get();

          return view('admin.manageorde',compact('data'));

   }
   public function ABC (Request $request){

       	 $result=DB::table('products')
     	         ->where('product_name','like','%'.$request->search.'%')
     	         ->first();

        $data=DB::table('products')
               ->where('product_name','like','%'.$request->search.'%')
               ->get();

     
          if($result){ 

           return view('pages.home_content',compact('data'));

          }else{
            Session::put('new','COULD NOT FOUND ANY RESULT');
            return view('pages.home_content',compact('data'));
          }
          
              
          }
      
       public function orderdetails ($id) {
        
         $data=DB::table('orders')
               ->join('order_details','orders.order_id','order_details.order_id')
               ->join('customers','orders.cus_id','customers.cus_id')
               ->join('shippings','orders.ship_id','shippings.ship_id')
               ->select('orders.*','customers.cus_name','customers.cus_mobile','shippings.ship_first_name','shippings.ship_last_name','shippings.ship_address','shippings.ship_mobile','shippings.ship_city','order_details.product_name','order_details.product_price','order_details.product_sales_quantity')
               ->where('orders.order_id',$id)
               ->get();


               
       
       return view('admin.detalsorder',compact('data'));

   }

   
   
    public function xyzor($id){

    $data=DB::table('orders')
              ->where('order_id',$id)
              ->update(['order_status'=>0]);
            //  Session::put('noti','Catagory Status Change Active to inactive Successfully !!');

            return redirect()->route('manageorder');


   }
   
    public function xyz($id){
 

  

        $data=DB::table('orders') 
              ->where('order_id',$id)
              ->update(['order_status'=>1]);
            // Session::put('noti','Catagory Status Change Inactive to Active Successfully !!');
            return redirect()->route('manageorder');


   }

  


    
}
