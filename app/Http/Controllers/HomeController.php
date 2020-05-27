<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{







    public function index (){
    	 $data=DB::table('products')
            ->join('tbl_catagory','products.catagory_id','tbl_catagory.catagory_id')
            ->select('products.*','tbl_catagory.catagory_id','tbl_catagory.catagory_name')
            ->where('products.product_status',1)
            ->get();

         

    	return view ('pages.home_content',compact('data'));
    }
    
       public function abc ($id){

    	 $data=DB::table('products')
            ->join('tbl_catagory','products.catagory_id','tbl_catagory.catagory_id')
            ->select('products.*','tbl_catagory.catagory_id','tbl_catagory.catagory_name')
            ->where('products.product_status',1)
            ->where('products.catagory_id',$id)
            ->get();

            return view ('pages.catagorywise',compact('data'));

    	
    }
     public function cba ($id){

         $data=DB::table('products')
            ->join('tbl_catagory','products.catagory_id','tbl_catagory.catagory_id')
            ->select('products.*','tbl_catagory.catagory_id','tbl_catagory.catagory_name')
            ->where('products.product_status',1)
            ->where('products.brand_id',$id)
            ->get();

            return view ('pages.brandwise',compact('data'));

    }
    
     public function details_view ($id){
             $data=DB::table('products')
            ->join('tbl_catagory','products.catagory_id','tbl_catagory.catagory_id')
            ->join('brands','products.brand_id','brands.brand_id')
            ->select('products.*','tbl_catagory.catagory_name','brands.brand_name')
            ->where('products.product_status',1)
            ->where('products.product_id',$id)
            ->first();
           
            return view ('pages.product_details',compact('data'));

    }

}
