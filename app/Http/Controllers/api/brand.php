<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\brand as ModelsBrand;
use App\Models\product;
use App\Models\product_image;
use Illuminate\Http\Request;

class brand extends Controller
{
    public function getbrand($id)
    {
        
      
        $data= product::where('brand_id',$id)->get();
        
        $list=array();  
        
        foreach($data as $pro){
            $temp=$pro->id;  
            $images=product_image::where('product_id',$temp)->get();
            array_push($list,$images);            
        }
        
        return response()->json(['brandproducts' => $data,"images"=>$list]);
    }
    public function allbrand()
    {
        $data=ModelsBrand::all();
        return response()->json(['allbrand' => $data]);
        // return $data;
    }
}
