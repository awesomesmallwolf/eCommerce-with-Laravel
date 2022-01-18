<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\category as ModelsCategory;
use App\Models\product;
use App\Models\product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class category extends Controller
{
    public function getcategory($id)
    {
        $data=DB::table('products')->where('cate_id',$id)->get();
        
        $list=array();  
        
        foreach($data as $pro){
            $temp=$pro->id;  
            $images=product_image::where('product_id',$temp)->get();
            array_push($list,$images);            
        }
        
        return response()->json(['categoryproducts' => $data,"images"=>$list]);
        // return $data;
    }

    function allcategory()
    {
        $data=ModelsCategory::all();
       

        return response()->json(['allcategory' => $data]);
    }
}
