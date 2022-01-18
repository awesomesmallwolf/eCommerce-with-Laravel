<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\product_attribute;
use Illuminate\Http\Request;

class product_attr extends Controller
{
    public function index()
    {
        //
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
        
        $data=product::where('id',$id)->first();
        $attr=product_attribute::where("product_id",$id)->first();
        return view("admin.product.attribute.showatt",compact("data",'attr'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        product_attribute::where("id",$id)->update([
            'size'=>$request->size,
            'weight'=>$request->weight,
            'color'=>$request->color
        ])  ;      
       
        return back()->with("success","Attribute UPDATED successfully");
    }

   
}
