<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\product as ModelsProduct;
use App\Models\product_attribute;
use App\Models\product_image;
use Illuminate\Http\Request;

class product extends Controller
{
    function getproduct()
    {
        $data = ModelsProduct::all();
        $list = array();
        foreach ($data as $pro) {
            $temp = $pro->id;
            $images = product_image::where('product_id', $temp)->get();
            array_push($list, $images);
        }
        return response()->json(['allproduct' => $data, 'images' => $list]);
    }

    function productdetail($id)
    {
        $data = ModelsProduct::where('id',$id)->get();
        $list = [];
        foreach ($data as $pro) {
            $temp = $pro->id;
            $images = product_image::where('product_id', $temp)->get();
            array_push($list, $images);
        }
        $attr=product_attribute::where('product_id',$id)->get();

        $brand=brand::where('id',$data[0]->brand_id)->get();
        return response()->json(['productinfo' => $data[0], 'images' => $list[0], 'attribute'=>$attr[0],'brand'=>$brand[0]->name]);
    }

    


}
