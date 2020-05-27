<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index')->name('home');


//Admin concroller

Route::get('/adminlogin','AdminController@showlogin')->name('adminlogin');
Route::get('/dashboard','SuperAdminController@home')->name('dashboard');
Route::post('/dologin','AdminController@dologin')->name('dologin');
Route::get('/logout','SuperAdminController@logout')->name('logout');

//  catagorycontroller 

 Route::get('/addcatagory','CatagoryController@addcatagory')->name('addcatagory');
 Route::get('/allcatagory','CatagoryController@allcatagory')->name('allcatagory');
 Route::post('/storecatagory','CatagoryController@storecatagory')->name('storecatagory');
 Route::get('/inactive{id}', 'CatagoryController@inactive');
 Route::get('/active{id}', 'CatagoryController@active');
 Route::get('/editcatagory{id}', 'CatagoryController@editcatagory');
 Route::post('/updatecatagory{id}', 'CatagoryController@updatecatagory');
 Route::get('/deletecatagory{id}', 'CatagoryController@deletecatagory');

// brands controller
 Route::get('/addbrand','BrandController@addbrand')->name('addbrand');
 Route::post('/storebrand','BrandController@storebrand')->name('storebrand');
 Route::get('/allbrand','BrandController@allbrand')->name('allbrand');

 Route::get('/brandinactive{id}','BrandController@brandinactive');
 Route::get('/brandactive{id}','BrandController@brandactive');


 Route::get('/editbrand{id}', 'BrandController@editbrand');
 Route::post('/updatebrand{id}', 'BrandController@updatebrand');
 Route::get('/deletebrand{id}', 'BrandController@deletebrand');


 //addproduct controller

Route::get('/addproduct','ProductController@addproduct')->name('addproduct');
Route::get('/allproduct','ProductController@allproduct')->name('allproduct');
Route::post('/storeproduct','ProductController@storeproduct')->name('storeproduct');
Route::get('/productinactive{id}','ProductController@productinactive');
Route::get('/productactive{id}','ProductController@productactive');
Route::get('/editproduct{id}','ProductController@editproduct');
Route::post('/updateeproduct{id}','ProductController@updateeproduct');
Route::get('/deleteproduct{id}','ProductController@deleteproduct');


//slider

Route::get('/addslider','SliderController@addslider')->name('addslider');
Route::get('/allslider','SliderController@allslider')->name('allslider');
Route::post('/storeslider','SliderController@storeslider')->name('storeslider');
Route::get('/sliderinactive{id}','SliderController@sliderinactive');
Route::get('/slideractive{id}','SliderController@slideractive');
Route::get('/deleteslider{id}','SliderController@deleteslider');

//home

Route::get('/abc{id}','HomeController@abc');
Route::get('/cba{id}','HomeController@cba');
Route::get('/details_view{id}','HomeController@details_view');



//Cart

Route::post('/addtocard','CartController@addtocard')->name('addtocard');

Route::get('/showcart','CartController@showcart')->name('showcart');

Route::get('/deletecartitem{id}','CartController@deletecartitem')->name('deletecartitem');
   
Route::get('/reduceitem{id}','CartController@reduceitem')->name('reduceitem');
Route::get('/increaseitem{id}','CartController@increaseitem')->name('increaseitem');


//checkout
Route::get('/userlogin','CheckoutController@userlogin')->name('userlogin');
Route::post('/usersignup','CheckoutController@usersignup')->name('usersignup');
Route::get('/chechout','CheckoutController@chechout')->name('chechout');

Route::post('/douserlogin','CheckoutController@douserlogin')->name('douserlogin');
Route::get('/userlogout','CheckoutController@userlogout')->name('userlogout');




///others 
Route::get('/flash','CheckoutController@flash')->name('flash');

//shipping

Route::post('/saveship','ShippingController@saveship')->name('saveship');
Route::get('/payment','ShippingController@payment')->name('payment');
Route::post('/payit','ShippingController@payit')->name('payit');

//Ordercontroller

Route::get('/manageorder','OrderController@manageorder')->name('manageorder');

Route::get('/search','OrderController@ABC')->name('search');
Route::get('/orderdetails{id}','OrderController@orderdetails')->name('orderdetails');



Route::get('/xyzor{id}','OrderController@xyzor')->name('xyzor');
Route::get('/xyz{id}','OrderController@xyz')->name('xyz');





