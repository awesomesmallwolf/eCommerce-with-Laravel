<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\product_order;
use Illuminate\Http\Request;

class myorder extends Controller
{
    function getorderinfo($id)
    {
        $final=[];
        $data=order::where('user_id',$id)->get();
     
     

            foreach ($data as $pro) { 
                $data=$pro;
                $proinfo = product_order::where('order_id',$pro->id)->get();
                $data['productinfo']=$proinfo;
                array_push($final,$data);
                // $final=array("orderinfo"=>$data);
                // $proinfo = product_order::where('order_id',$pro->id)->get();
                // $temp=array("productinfo"=>$proinfo);
               
                // array_push($final,$temp);
            }
     
         return response()->json([
             "myorder"=>$final,
         ]);
    }
}
