<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\banner as ModelsBanner;
use Illuminate\Http\Request;

class banner extends Controller
{
   
    public function index()
    {
        $data=ModelsBanner::all();
        return response()->json(['bannerdata' => $data]);
        // return $data;
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
