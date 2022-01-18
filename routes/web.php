<?php
use App\Http\Controllers\admin\configuration;
use App\Http\Controllers\admin\usermanagement;
use App\Http\Controllers\admin\bannermanagement;
use App\Http\Controllers\admin\categorys;
use App\Http\Controllers\admin\changestatus;
use App\Http\Controllers\admin\cmsinfo;
use App\Http\Controllers\admin\contactus;
use App\Http\Controllers\admin\couponcontrol;
use App\Http\Controllers\admin\myorder;
use App\Http\Controllers\admin\product\brand;
use App\Http\Controllers\admin\product\product;
use App\Http\Controllers\admin\product\product_attr;
use App\Http\Controllers\admin\product\product_image;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Our Routes
Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware'=>['checkusers']],function(){



Route::resources([
    'coupon' => couponcontrol::class,
    'user'=>usermanagement::class,
    'category'=>categorys::class,
    'banner'=>bannermanagement::class,
    'configuration'=>configuration::class,
    'contactus'=>contactus::class,
    'product-option/brand'=>brand::class,
    'product-option/product'=>product::class,
    'product-option/product/image'=>product_image::class,
    'product-option/product/attribute'=>product_attr::class,
    'cms'=>cmsinfo::class,
   
]);

Route::view("product-option","admin.product.index");

Route::get('userstatuschange/{id}',[changestatus::class,'userstatuschange']);

Route::get('productsatuschange/{id}',[changestatus::class,'productsatuschange']);

Route::get('myorder',[myorder::class,'showorder']);

});
