<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\cmsdata;
use Illuminate\Http\Request;

class cmsinfo extends Controller
{
    
    
    
    public function index()
    {
        $data=cmsdata::all();
        return view('admin.cms.showcms',compact('data'));
    }

  
    public function create()
    {
        return view('admin.cms.addcms');
    }

    // // if($valid)
    // // {
    // //     $name =  rand().$req->image->getClientOriginalName();
    // //     // return $name;
    // //     $req->image->move(public_path().'/priyanshu/', $name); 

    // //     $dd=User::where('id',$id)->first();

       
    // //       unlink($dd->image);
            

    // //     $data=User::where('id',$id)->update([
    // //         'image'=>'priyanshu/'.$name
    // //     ]);

    
    public function store(Request $request)
    {
    
        $valid=$request->validate([
            'name'=>'required|min:3|max:20',
            'description'=>'required|min:10 ',
            'image'=>'required|mimes:jpg,png,jpeg,gif'
        ]);
        if($valid)
        {
            $name =  rand().$request->image->getClientOriginalName();
            if($request->image->move(public_path().'/cmsimages/', $name))
            {
                $data=new cmsdata();
                $data->name=$request->name;
                $data->description=$request->description;
                $data->image=$name;
                if($data->save())
                {
                    return back()->with('success',"CMS is Added ");
                }                
            }            
        }
    }

    
    // public function show($id)
    // {
    //     //
    // }
 
    public function edit($id)
    {
        $data=cmsdata::where("id",$id)->first();
        return view('admin.cms.editcms',compact('data'));
    }

   
    public function update(Request $request, $id)
    { 
        $valid=$request->validate([
            'name'=>'required|min:3|max:20',
            'description'=>'required|min:10',
            'image'=>'mimes:jpg,png,jpeg,gif'
        ]);
        if($valid)
        {

            if ($request->hasFile('image')) 
                {
                    //Unlink image
                    $dd=cmsdata::where('id',$id)->first();
                    unlink("cmsimages/".$dd->image);
                    //Update image
                    $name =  rand().$request->image->getClientOriginalName();
                    if($request->image->move(public_path().'/cmsimages/', $name))
                    {
                        cmsdata::where("id",$id)->update([
                            'name'=> $request->name,
                            'description'=> $request->description, 
                            'image'=>$name
                        ]);
                    }
                }
            else
                {
                    cmsdata::where("id",$id)->update([
                        'name'=> $request->name,
                        'description'=> $request->description
                    ]);
                }

                return redirect('cms')->with("success","CMS Edited");
        }

    }

     
    public function destroy($id)
    {
        $dd=cmsdata::where('id',$id)->first();
        unlink("cmsimages/".$dd->image);
        cmsdata::where("id",$id)->delete();
        return redirect('cms')->with("success","CMS Deleted");
    }

}
