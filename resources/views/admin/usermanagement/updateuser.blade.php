@extends('include.master')

@section('contents')
<div class="text-secondary ml-4 h1">
       <a href="/user"><i class="fas fa-arrow-circle-left"></i></a>
</div>   

<div class=" col-6 mx-auto bg-white" style="border-radius: 10px ; padding:30px ; margin-top:-50px">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}} <a href="/user" class="text-dark">SHOW</a>
    </div>
    @endif
    <div class="display-4 text-center">
        EDIT USER
    </div>
    <form action="/user/{{$data->id}}" method="POST" class="row"> @csrf
        @method("PUT")

        
        <div class="form-group col-12">
            <label>Email (You Can't Edit Mail)</label>
            @error('email')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input type="text" name="email" value="{{$data->email}}" class="form-control" placeholder="Email" disabled>
        </div>


        <div class="form-group col-6">
            <label>First Name</label>
            @error('firstname')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input type="text" name="firstname" class="form-control" placeholder="First Name" value="{{$data->firstname}}">
        </div>


        <div class="form-group col-6">
            <label>Last Name</label>
            @error('lastname')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="{{$data->lastname}}">
        </div>


      

  <div class="form-group col-12">
            <label>Role</label>
            @error('role')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <select name="role" class="form-control">
                <option value="">Select </option>
                @foreach ($role as $item)
                   <option value="{{$item->id}}" <?php if($item->id===$data->role_id) echo 'selected="selected"';?>>
                             {{$item->role_name}}
                    </option>
                @endforeach
            </select>
        </div>
       




        <div class="form-group text-center">
            <input type="submit" class="btn btn-success m-auto" value="Edit Details">
        </div>
    </form>
</div>
@endsection