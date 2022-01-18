<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\coupon;
use Illuminate\Http\Request;

class couponcontrol extends Controller
{
    public function index()
    {
        $data = Coupon::all();
        return view("admin.coupon.showcoupon", compact('data'));
    }

    public function create()
    {
        return view("admin.coupon.couponcreate");
    }


    public function store(Request $request)
    {
        $valid = $request->validate(
            [
                'coupon_code' => 'required|min:4|unique:coupons|max:16|regex:/^(?=.*[a-zA-Z])(?=.*[0-9])[A-Za-z0-9]+$/',
                'quantity' => 'required',
                'coupon_value' => 'required'
            ],
            [
                'regex' => "Coupon Code must contain Apha numeric String With Symbol"
            ]
        );
        $data = new coupon();
        $data->coupon_code = $request->coupon_code;
        $data->quantity = $request->quantity;
        $data->total_quantity = $request->quantity;
        $data->coupon_value = $request->coupon_value;
        if ($data->save()) {
            return back()->with("success", "The Coupon Code is Generated ");
        }
    }


    //--------------- This is Change the Status of coupon
    public function show($id)
    {
        $data = coupon::where("id", $id)->first();
        Coupon::where("id", $id)->update([
            'status' => (!$data->status)
        ]);

        return redirect('coupon');
    }


    public function edit($id)
    {
        return "THIS IS EDIT VUUTON ID" . $id;
        // $data=coupon::all()->where("id",$id)->first();

        // return view("admin.coupon.editcoupon");
    }

    // newvaluecoupon"
    // currentcoupon" 
    // totalcoupon" 
    public function update(Request $request, $id)
    {
        
        if( ($request->newvaluecoupon < 0 ) && (($request->currentcoupon + $request->newvaluecoupon) < 0))
        {
      
            return back()->with("error","Your quantity not updated may be you quantity less than zero after change ");
        }
        $data=coupon::where("id",$id)->update([
            'total_quantity'=>$request->totalcoupon + $request->newvaluecoupon,
            'quantity'=>$request->currentcoupon+$request->newvaluecoupon
        ]);
        return redirect('coupon')->with("success","Your Coupon Quantity is Updated");
    }


    public function destroy($id)
    {
        $data = Coupon::where('id', $id)->delete();
        return redirect('coupon');
    }
}
