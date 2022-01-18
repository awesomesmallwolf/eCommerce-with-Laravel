<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\cmsdata;
use Illuminate\Http\Request;

class cmsdetails extends Controller
{
  public function getallcms()
    {
        $data=cmsdata::all();
        return response()->json([
            'cmsinfo'=>$data
        ]);
         
    }

  public  function getcmsbyid($id)
    {
        $data=cmsdata::where("id",$id)->first();
       
        return response()->json([
            'cmsdata'=>$data
        ]);
         
    }
}
