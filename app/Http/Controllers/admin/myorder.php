<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\product_order;
use Illuminate\Http\Request;

class myorder extends Controller
{
    public function showorder()
    {
        $final=[];
        $data=order::all();
     
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
     
        return view('admin.order.showorder',compact('final'));
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
