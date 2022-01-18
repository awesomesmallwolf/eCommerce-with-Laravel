<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\product_image as ModelsProduct_image;
use Illuminate\Http\Request;

class product_image extends Controller
{
    
    public function index($id=null)
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
        $images=ModelsProduct_image::all()->where("product_id",$id);
        return view("admin.product.images.showimage",compact("data",'images'));
    }

    public function edit($id)
    {
        // return view("admin.product.images.addimage");
    }

  
    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'image'=>'required',
            'image.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $fileupload = new ModelsProduct_image();
                $name = "Img" . rand(5, 1500) . time() . '.' . $file->extension();
                $file->move(public_path('product_images'), $name);
                $fileupload->image = $name;
                $fileupload->product_id = $id;
                $fileupload->save();
            }
        }
        return back()->with("success","Images Added successfully");
    }


    public function destroy($id)
    {        
        $i=ModelsProduct_image::where("id", $id)->first();
            unlink(public_path('/product_images/') . $i->image);

        ModelsProduct_image::where("id", $id)->delete();
        return back()->with("success", "Your Product IMAGE is Deleted");
    }
}
