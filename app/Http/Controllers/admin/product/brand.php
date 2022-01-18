<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Models\brand as ModelsBrand;
use Illuminate\Http\Request;

class brand extends Controller
{  public function index()
    {
        $data=ModelsBrand::all();
        return view("admin.product.brand.showbrand",compact('data'));
    }

    
    public function create()
    {
        return view("admin.product.brand.addbrand");
    }

    
    public function store(Request $request)
    {
        $valid=$request->validate([
            'name'=>'required|max:50|unique:brands',
            'description'=>'required|min:10'
        ]);
        if($valid)
        {
            $data=new ModelsBrand();
            $data->name=$request->name;
            $data->description=$request->description;
            if($data->save())
            {
                return back()->with("success","YOUR BRAND is added");
            }
        }
        
    }

   
    public function show($id)
    {
        
        
    }

  
    public function edit($id)
    {
        $data=ModelsBrand::where("id",$id)->first();
        return view("admin.product.brand.editbrand",compact('data'));
    }

   
    public function update(Request $request, $id)
    {
        $valid=$request->validate([
            'name'=>'required|min:3|max:50',
            'description'=>'required|min:10'
        ]);
        if($valid)
        {
            $data=ModelsBrand::where("id",$id)->update([
                'description'=>$request->description,
                'name'=>$request->name
            ]);
           return redirect('/product-option/brand')->with("success","Brand updated");
        }
    }

    
    public function destroy($id)
    {
        ModelsBrand::where("id",$id)->delete();
        return redirect('/product-option/brand')->with("success","Brand DELETED");
    }
}
