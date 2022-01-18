<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\orderMail;
use App\Mail\OrderMailToAdmin;
use App\Mail\orderMailToUser;
use App\Models\configurationmanage;
use App\Models\order;
use App\Models\order_address;
use App\Models\product_order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class checkout extends Controller
{
    function placedorder(Request $request)
    {
     
        // $userdata=User::where('id',$request->user_id);
        // Mail::to($userdata->email)->send(new UserOrder ($request->all()));
        // Mail::to($userdata->email)->send(new  ($request->all()));
        $data=new order();
        $data->user_id=$request->user_id;
        $data->amount=$request->amount;
        $data->payment_mode=$request->payment_mode;
        $data->pro_order_id=$request->pro_order_id;
        $data->payment_status=$request->payment_status;
        $data->payment_id=$request->payment_id;
        $data->transaction_id=$request->transaction_id;
        $data->coupon_used=$request->coupon_used;
        $data->save();
        $adminmail=configurationmanage::all()[0];
        $userdata=User::where('id',$request->user_id)->first();
        Mail::to($userdata->email)->send(new orderMailToUser ($request->all()));
        Mail::to($adminmail->notifyemail)->send(new OrderMailToAdmin ($request->all()));
       
        return response()->json([
            "order_id"=>$data->id,
        ]);
    }

    function product_address(Request $request)
    {
        $data=new order_address();
        $data->order_id= $request->order_id;
        $data->mobile = $request->mobile  ;
        $data->address = $request->address  ;
        $data->pincode = $request->pincode  ;
        $data->state = $request->state  ;
        $data->save();
    }

    function product_orders(Request $request)
    {
        $data=new product_order();
        $data->order_id = $request->order_id ;
        $data->product_id = $request->product_id ;
        $data->product_price = $request->product_price ;
        $data->quantity = $request->quantity ;
        $data->total_price = $request->total_price ;
        $data->image = $request->image ;
        $data->save();
    }


}
