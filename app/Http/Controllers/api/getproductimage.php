<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class getproductimage extends Controller
{
    function getproductimage($id)
    {
        $data=DB::table('product_images')->where('product_id',$id)->get();
        // $data=product_image::all()->where('product_id',$id);
        return response()->json(['imageproducts' => $data]);
    }
}
