<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\wishlist as ModelsWishlist;
use Illuminate\Http\Request;

class wishlist extends Controller
{
    function addwishlist(Request $request)
    {
        $flag=0;
        $data1=ModelsWishlist::all();
        foreach($data1 as $item)
        {
           
            if($request->product_id == $item->product_id)
            {
                $flag=1;   
            }
        }
        if($flag)
        {
            return response()->json([
                "error"=>1
            ]);
        }
        else
        {
            $data=new ModelsWishlist();
            $data->product_id=$request->product_id;
            $data->save();
            return response()->json([
                "error"=>0,
            ]);
        }
    }

    function showwishlist()
    {
        $data=ModelsWishlist::all();
        return response()->json([
            "wishdata"=>$data
        ]);
    }

    function deletewishlist($id)
    {
        ModelsWishlist::where('product_id',$id)->delete($id);
    }
}
