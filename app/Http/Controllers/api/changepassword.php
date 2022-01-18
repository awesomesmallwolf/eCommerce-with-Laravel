<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class changepassword extends Controller
{
    function change(Request $request)
    {
        $new=$request->newpass;
        $old=$request->oldpass;
        $id=$request->userid;

        $data=User::all()->where('id',$id)->first();
            if (Hash::check($old,$data->password))
            {
                $data=User::where('id',$id)->update([
                    'password'=>Hash::make($new)
                ]);
                if($data)
                {
                    return response()->json(["err"=>0,"message"=>"Password Change Successfully"]);
                }
            }
            else
            {
                return response()->json(["err"=>1,"message"=>"Old password Not Matched"]);
            }



        return response()->json(["done"=>$request->all()]);
    }
}
