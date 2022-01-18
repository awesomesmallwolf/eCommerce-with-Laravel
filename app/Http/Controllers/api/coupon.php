<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\coupon as ModelsCoupon;
use Illuminate\Http\Request;
use Mockery\Undefined;

class coupon extends Controller
{
    function getallcoupon(Request $request)
    {
        $name=$request->coupanid;
        $data=ModelsCoupon::all();
        foreach($data as $cou)
        {
            if($cou->coupon_code == $name)
            {
                if($cou->status==1 && $cou->quantity>0)
                {
                    return  response()->json(['error' => "",'price'=>$cou->coupon_value]);
                    
                }
                else
                {
                    return response()->json(['error'=>"Coupon Expired"]);
                }
            }
        }
        return response()->json(['error' => "Enter a valid Coupon code"]);
    }

    function  updatecoupon(Request $request)
    {
        $name=$request->coupanid;
        $data = ModelsCoupon::all();
        $id=0;
        $quantity=0;
        foreach($data as $cou)
        {
            if($cou->coupon_code == $name)
            {
                $id=$cou->id;
                $quantity=$cou->quantity;
            }
        }
              
        ModelsCoupon::where("id",$id)->update([
                'quantity'=>$quantity-1
        ]);

        
    }




}
