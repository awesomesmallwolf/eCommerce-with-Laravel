<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\contactus as ModelsContactus;
use Illuminate\Http\Request;

class contactus extends Controller
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
        $data=new ModelsContactus();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->contact=$request->contact;
        $data->message=$request->message;
        if($data->save())
        {
            return response()->json(['message' => 'We will Connect with you soon Thankyou!']);
        }
        return response()->json(['message' => 'Some Error is there']);
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
