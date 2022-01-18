<?php

use App\Http\Controllers\api\product;

use App\Http\Controllers\api\banner;
use App\Http\Controllers\api\brand;
use App\Http\Controllers\api\category;
use App\Http\Controllers\api\changepassword;
use App\Http\Controllers\api\checkout;
use App\Http\Controllers\api\cmsdetails;
use App\Http\Controllers\api\contactus;
use App\Http\Controllers\api\coupon;
use App\Http\Controllers\api\getproductimage;
use App\Http\Controllers\api\myorder;
use App\Http\Controllers\api\wishlist;
use App\Http\Controllers\JWTController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refresh']);
    Route::post('/profile', [JWTController::class, 'profile']);
});

Route::get('/banner',[banner::class,'index']);
Route::post('/contact',[contactus::class,'store']);


Route::get('/categoryproducts/{id}',[category::class,'getcategory']);

// Brand
Route::get('/brandproductbyid/{id}',[brand::class,'getbrand']);

Route::get('/allbrand',[brand::class,'allbrand']);

//Product category
Route::get('/allproduct',[product::class,'getproduct']);

Route::get('/allcategory',[category::class,'allcategory']);

Route::get('/productimage/{id}',[getproductimage::class,'getproductimage']);

Route::get('productdetail/{id}',[product::class,'productdetail']);

Route::post('/changepass',[changepassword::class,'change']);

Route::post("/checkcoupon",[coupon::class,'getallcoupon']);

Route::post("updatecoupon",[coupon::class,'updatecoupon']);


//Checkout API

Route::post("/order",[checkout::class,'placedorder']);

Route::post("/product_address",[checkout::class,'product_address']);

Route::post("/product_orders",[checkout::class,'product_orders']);


//Wishlist
Route::post("/wishlist",[wishlist::class,'addwishlist']);

Route::get("showwishlist",[wishlist::class,'showwishlist']);

Route::get("deletewishlist/{id}",[wishlist::class,'deletewishlist']);

//CMS 

Route::get("getcms",[cmsdetails::class,'getallcms']);

Route::get("getcmsbyid/{id}",[cmsdetails::class,"getcmsbyid"]);



// My order 

Route::get("myorder/{id}",[myorder::class,'getorderinfo']);



















































































































