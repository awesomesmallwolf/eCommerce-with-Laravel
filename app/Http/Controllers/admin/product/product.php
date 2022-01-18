<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\category;
use App\Models\product as ModelsProduct;
use App\Models\product_attribute;
use App\Models\product_image;
use Illuminate\Http\Request;

class product extends Controller
{

    public function index()
    {
        $data = ModelsProduct::all();
        $brand = brand::all();
        $category = category::all();
        return view('admin.product.products.showproduct', compact('data', 'brand', 'category'));
    }


    public function create()
    {
        $brand = brand::all();
        $category = category::all();
        return view('admin.product.products.addproduct', compact('brand', 'category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'price' => 'required|numeric|min:1|not_in:0',
            'brand_id' => 'required',
            'cate_id' => 'required',
            'description' => 'required|min:5',
            'image' => 'required',
            'image.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data = new ModelsProduct();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->brand_id = $request->brand_id;
        $data->cate_id = $request->cate_id;
        $data->description = $request->description;
        $data->save();
        // PRODUCT TABLE COMPLETE

        // IMAGE UPLOAD
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $fileupload = new product_image();
                $name = "Img" . rand(5, 1500) . time() . '.' . $file->extension();
                $file->move(public_path('product_images'), $name);
                $fileupload->image = $name;
                $fileupload->product_id = $data->id;
                $fileupload->save();
            }
        }

        //Image IPLOAD finished

        // ATTRIBUTE UPLOADS

        $attr = new product_attribute();
        $attr->color = $request->color;
        $attr->weight = $request->weight;
        $attr->size = $request->size;
        $attr->product_id = $data->id;
        $attr->save();
        return redirect('product-option/product')->with("success", "Your Product is Added Successfully");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $data = ModelsProduct::where("id",$id)->first();
        $brand = brand::all();
        $category = category::all();
        return view('admin.product.products.editproduct', compact('data', 'brand', 'category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2',
            'price' => 'required|numeric|min:1|not_in:0',
            'brand_id' => 'required',
            'cate_id' => 'required',
            'description' => 'required|min:5',
        ]);

        ModelsProduct::where("id",$id)->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'brand_id'=>$request->brand_id,
            'cate_id'=>$request->cate_id,
        ]);

        return redirect("/product-option/product")->with("success", "Your Product is UPDATED");
    }

    public function destroy($id)
    {
        $imgs = product_image::all()->where("product_id", $id);

        foreach ($imgs as  $i) {
            unlink(public_path('/product_images/') . $i->image);
        }
        ModelsProduct::where("id", $id)->delete();
        return back()->with("success", "Your Product is Deleted");
    }
}
