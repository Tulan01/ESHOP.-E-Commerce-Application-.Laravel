<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class SliderController extends Controller
{
  public function addslider () {

  	return view ('slider.addslider');
  }
  
  public function storeslider (Request $request) {
  	$data=array();
  	  $data['slider_status']=$request->slider_status;
  	  $image=$request->file('slider_image');

  	    if($image){
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext; 
        $upload_path='product/image/';
        $image_url=$upload_path.$image_full_name; 
        $success=$image->move($upload_path,$image_full_name);
        $data['slider_image']=$image_url;

        DB::table('sliders')->insert($data);
        Session::put('massage','successfully inserted !!');
        
        return redirect()->route('addslider');
  	    }

  }
    public function   allslider () {
     $data=DB::table('sliders')->get();

  	return view ('slider.allslider',compact('data'));
  }
  
  public function sliderinactive($id){
        

        $data=DB::table('sliders')->where('slider_id',$id)
                                   ->update(['slider_status'=>0]);

        Session::put('noti','Slider Status Change Active to inactive Successfully !!');
               return redirect() ->route('allslider');

    }
  public function slideractive($id){
        

        $data=DB::table('sliders')->where('slider_id',$id)
                                   ->update(['slider_status'=>1]);

        Session::put('noti','Slider Status Change Inactive to Active Successfully !!');
               return redirect() ->route('allslider');

    }
    public function deleteslider ($id){
         
      $data=DB::table('sliders')
             ->where('slider_id',$id)
             ->delete();

       Session::put('noti','Successfully Information Deleted  !!');
       return Redirect()->route('allslider');
   }


}
