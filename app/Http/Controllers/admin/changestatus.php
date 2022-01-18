<?php
// IN this we change all status 
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;

class changestatus extends Controller
{
    function userstatuschange($id)
    {
        $user=User::where("id",$id)->first();
        User::where("id",$id)->update([
            'status'=> ! $user->status
        ]);
        return back();
    }
    function productsatuschange($id)
    {
        $product=Product::where("id",$id)->first();
        Product::where("id",$id)->update([
            'status'=> ! $product->status
        ]);
        return back();
    }
}
