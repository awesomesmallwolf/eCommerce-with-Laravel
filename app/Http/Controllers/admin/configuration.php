<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\configurationmanage;
use Illuminate\Http\Request;

class configuration extends Controller
{

    public function index()
    {
        $data = configurationmanage::all();
        return view("admin.configuration.showconfig", compact('data'));
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
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'notifyemail' => 'required|unique:configurationmanages|regex:/^[a-zA-Z0-9_+&*-]+(?:\\.[a-zA-Z0-9_+&*-]+)*@(?:[a-zA-Z0-9-]+\\.)+[a-zA-Z]{2,7}$/'
        ], [
            'unique' => 'You have Enter a same MailID can not Updated',
            'required' => 'Email is required',
            'regex' => 'Enter a Valid MAil-ID'
        ]);
        $data = configurationmanage::where("id", $id)->update([
            'notifyemail' => $request->notifyemail
        ]);
        if ($data) {
            return redirect('configuration')->with("success", "Your Notification mail id is updated Now you will get notification on $request->notifyemail");
        }
    }

    public function destroy($id)
    {
        //
    }
}
