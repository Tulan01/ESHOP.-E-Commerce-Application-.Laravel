<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Cart;
Use Session;
use Illuminate\Support\facades\Redirect;


class CartController extends Controller
{
    public function addtocard (Request $request){
      $this->UserAuthCheck();

    $data=DB::table('products')
          ->where('product_id',$request->product_id)
        
         ->first();

      $value=array();

    $value['id']=$data->product_id;
    $value['name']=$data->product_name;
    $value['quantity']=$request->number;
    $value['price']=$data->product_price;
    $value['weight']=110;
    $value['attributes']['image']=$data->product_image;

     Cart::add($value);

     return redirect()->route('showcart');

    }

    public function showcart () {
      
        $this->UserAuthCheck();
      $data=DB::table('tbl_catagory')
                 ->where('cat_pub_st',1)
                  ->get();

      return view('pages.add_to_cart',compact('data'));
    }

   
   public function deletecartitem ($id) {
     // echo $id;
         Cart::remove($id);
         return redirect()->route('showcart');
   }
   
   public function reduceitem ($id) {
     // echo $id;
         Cart::update($id, array(
           'quantity' => -1, 
           ));
         return redirect()->route('showcart');
   }
     public function increaseitem ($id) {
     // echo $id;
         Cart::update($id, array(
           'quantity' => 1, 
           ));
         return redirect()->route('showcart');
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
