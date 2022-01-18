<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class usermanagement extends Controller
{

    public function index()
    {
        $data = User::all();
        $role=role::all();
        return view('admin.usermanagement.showuser', compact('data','role'));
    }


    public function create()
    {
        $role = Role::all();

        return view('admin.usermanagement.adduser', compact('role'));
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'firstname' => 'required|min:3|max:45',
            'lastname' => 'required|min:3|max:45',
            'email' => 'required|unique:users|regex:/^[a-zA-Z0-9_+&*-]+(?:\\.[a-zA-Z0-9_+&*-]+)*@(?:[a-zA-Z0-9-]+\\.)+[a-zA-Z]{2,7}$/',
            'password' => 'required|regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()])(?=\\S+$).{8,20}$/',
            'confirmpassword' => 'required|same:password',
            'role' => 'required',
        ]);
        if ($validate) {
            $data = new User();
            $data->firstname = $request->firstname;
            $data->lastname = $request->lastname;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->confirmpassword = Hash::make($request->confirmpassword);
            $data->role_id = $request->role;
            $data->status = 1;
            if ($data->save()) {
                return back()->with("success", "User Created Successfull");
            }
        }
        return back()->with("success","User Creaed Successfully");
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = User::where("id", $id)->first();
        $role = Role::all();
        return view('admin.usermanagement.updateuser', compact('data', 'role'));
    }


    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'firstname' => 'required|min:3|max:45',
            'lastname' => 'required|min:3|max:45',
            'role' => 'required',
        ]);
        if ($validate) {
            $data = User::where("id", $id)->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'role_id' => $request->role
            ]);
        }
        return redirect('/user')->with("success", "User Updated Successfull");
    }


    public function destroy($id)
    {
        $data = User::where("id", $id)->delete();
        return redirect('/user')->with("success", "User Deleted Successfull");;
    }
}
