<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\banner;
use Illuminate\Http\Request;

class bannermanagement extends Controller
{
    
    
    public function index()
    {
        $data=banner::all();
        return view('admin.banner.showbanner',compact('data'));
    }

  
    public function create()
    {
        return view('admin.banner.addbanner');
    }

    // if($valid)
    // {
    //     $name =  rand().$req->image->getClientOriginalName();
    //     // return $name;
    //     $req->image->move(public_path().'/priyanshu/', $name); 

    //     $dd=User::where('id',$id)->first();

       
    //       unlink($dd->image);
            

    //     $data=User::where('id',$id)->update([
    //         'image'=>'priyanshu/'.$name
    //     ]);

    
    public function store(Request $request)
    {
    
        $valid=$request->validate([
            'heading'=>'required|min:3|max:20',
            'caption'=>'required|min:10|max:300',
            'image'=>'required|mimes:jpg,png,jpeg,gif'
        ]);
        if($valid)
        {
            $name =  rand().$request->image->getClientOriginalName();
            if($request->image->move(public_path().'/bannerimages/', $name))
            {
                $data=new banner();
                $data->heading=$request->heading;
                $data->caption=$request->caption;
                $data->image=$name;
                if($data->save())
                {
                    return back()->with('success',"Banner is Added ");
                }                
            }            
        }
    }

    
    public function show($id)
    {
        //
    }
 
    public function edit($id)
    {
        $data=banner::where("id",$id)->first();
        return view('admin.banner.editbanner',compact('data'));
    }

   
    public function update(Request $request, $id)
    {
        $valid=$request->validate([
            'heading'=>'required|min:3|max:20',
            'caption'=>'required|min:10|max:200',
            'image'=>'mimes:jpg,png,jpeg,gif'
        ]);
        if($valid)
        {

            if ($request->hasFile('image')) 
                {
                    //Unlink image
                    $dd=banner::where('id',$id)->first();
                    unlink("bannerimages/".$dd->image);
                    //Update image
                    $name =  rand().$request->image->getClientOriginalName();
                    if($request->image->move(public_path().'/bannerimages/', $name))
                    {
                        banner::where("id",$id)->update([
                            'heading'=> $request->heading,
                            'caption'=> $request->caption,
                            'image'=>$name
                        ]);
                    }
                }
            else
                {
                    banner::where("id",$id)->update([
                        'heading'=> $request->heading,
                        'caption'=> $request->caption
                    ]);
                }

                return redirect('banner')->with("success","Banner Edited");
        }

    }

     
    public function destroy($id)
    {
        $dd=banner::where('id',$id)->first();
        unlink("bannerimages/".$dd->image);
        banner::where("id",$id)->delete();
        return redirect('banner')->with("success","Banner Deleted");
    }
}

