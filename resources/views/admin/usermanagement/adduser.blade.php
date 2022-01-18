@extends('include.master')

@section('contents')
<div class="text-secondary ml-4 h1">
       <a href="/user"><i class="fas fa-arrow-circle-left"></i></a>
</div>   

<div class=" col-6 mx-auto ">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}} <a href="/user" class="text-dark">SHOW</a>
    </div>
    @endif
    <div class="display-4 text-center">
        ADD USER
    </div>
    <form action="/user" method="post" class="row"> @csrf

        
        <div class="form-group col-12">
            <label>Email</label>
            @error('email')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
        </div>


        <div class="form-group col-6">
            <label>First Name</label>
            @error('firstname')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input type="text" name="firstname" class="form-control" placeholder="First Name" value="{{old('firstname')}}">
        </div>


        <div class="form-group col-6">
            <label>Last Name</label>
            @error('lastname')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="{{old('lastname')}}">
        </div>


        <div class="form-group col-12">
            <label>Password</label>
            @error('password')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input type="password" name="password" class="form-control" placeholder="Password (Should Contain a-z A-Z 0-9 one Special Character)" value="{{old('password')}}">
        </div>

        <div class="form-group col-6">
            <label>Confirm Password</label>
            @error('confirmpassword')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" value="{{old('confirmpassword')}}">
        </div>


  <div class="form-group col-6">
            <label>Role</label>
            @error('role')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <select name="role" class="form-control">
                <option value="">Select </option>
                @foreach ($role as $item)
                   <option value="{{$item->id}}"> {{$item->role_name}}</option>
                @endforeach
            </select>
        </div>
       




        <div class="form-group text-center">
            <input type="submit" class="btn btn-success m-auto" value="Add User">
        </div>
    </form>
</div>
@endsection