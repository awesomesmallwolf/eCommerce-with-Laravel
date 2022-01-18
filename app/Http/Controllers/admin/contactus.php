<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\contactus as ModelsContactus;
use Illuminate\Http\Request;

class contactus extends Controller
{
    public function index()
    {
        $data=ModelsContactus::all();
        return view('admin.contact.showcontact',compact('data'));
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
        ModelsContactus::where('id',$id)->delete();
        return back()->with("success","Your Message is deleted");
    }
}
