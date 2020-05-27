<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Redirect;
use Cart;
use DB;
use Session;


class ShippingController extends Controller
{
    public function saveship (Request $request){
            
      $data=array();
      $data['ship_first_name']=$request->ship_first_name;
      $data['ship_last_name']=$request->ship_last_name;
      $data['ship_email']=$request->ship_email;
      $data['ship_mobile']=$request->ship_mobile;
      $data['ship_address']=$request->ship_address;
      $data['ship_city']=$request->ship_city;

      $shipping_id=DB::table('shippings')->insertgetId($data);

       Session::put('shipping_id',$shipping_id);

       return redirect()->route('payment');

    }

    public function payment (){
           $this->UserAuthCheck();
          return view('pages.payment');
    }
    public function payit (Request $request){
          
          $way=$request->way;

    	$shipping_id=Session::get('shipping_id');
         
      //table insert payment
    	$pdata=array();
        $pdata['payment_method']=$request->way;
        $pdata['payment_status']='pending';

        $pdata_id=DB::table('payments')->insertgetId($pdata);

       //order insert                    // $contents=Cart::getContent();
        $subTotal = Cart::getSubTotal();
        $cus_id=Session::get('cus_id');
        $ship_id=Session::get('shipping_id');
        
        $odata=array();
        $odata['cus_id']=$cus_id;
        $odata['ship_id']=$ship_id;
        $odata['payment_id']=$pdata_id;
        $odata['order_total']=$subTotal;
        $odata['order_status']=0;

        $odata_id=DB::table('orders')->insertgetId($odata);

 //order details insert
        $contents=Cart::getContent();

        $detailsdata=array();

        foreach ($contents as $contents) {
        	$detailsdata['order_id']=$odata_id;
        	$detailsdata['product_id']=$contents->id;
        	$detailsdata['product_name']=$contents->name;
        	$detailsdata['product_price']=$contents->price;
        	$detailsdata['product_sales_quantity']=$contents->quantity;

        	DB::table('order_details')->insert($detailsdata);
        }


        if($way=='handcash'){
        		Cart::clear();
        	return view ('pages.handcash');
        
        } 

    }
    public function UserAuthCheck () {

              $cus_id=Session::get('cus_id');

          if($cus_id){
               return;
         }else{
             return redirect()->route('userlogin')->send();
            }
}
}
