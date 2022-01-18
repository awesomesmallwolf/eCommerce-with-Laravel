<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class categorys extends Controller
{
    
    public function index()
    {
        $data=category::all();
        return view("admin.category.showcategory",compact('data'));
    }

    
    public function create()
    {
        return view("admin.category.addcategory");
    }

    
    public function store(Request $request)
    {
        $valid=$request->validate([
            'title'=>'required|max:50|unique:categories',
            'description'=>'required|min:10'
        ]);
        if($valid)
        {
            $data=new category();
            $data->title=$request->title;
            $data->description=$request->description;
            if($data->save())
            {
                return back()->with("success","YOUR Category is added");
            }
        }
        
    }

   
    public function show($id)
    {
        
        
    }

  
    public function edit($id)
    {
        $data=category::where("id",$id)->first();
        return view("admin.category.editcategory",compact('data'));
    }

   
    public function update(Request $request, $id)
    {
        $valid=$request->validate([
            'title'=>'required|min:3|max:50',
            'description'=>'required|min:10'
        ]);
        if($valid)
        {
            $data=category::where("id",$id)->update([
                'description'=>$request->description,
                'title'=>$request->title
            ]);
           return redirect('/category')->with("success","Category updated");
        }
    }

    
    public function destroy($id)
    {
        category::where("id",$id)->delete();
        return redirect('/category')->with("success","Category DELETED");
    }
}
