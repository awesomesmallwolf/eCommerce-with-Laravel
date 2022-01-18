@extends('include.master')

@section('contents')
<div class="text-secondary ml-4 h1">
       <a href="/product-option/brand"><i class="fas fa-arrow-circle-left"></i></a>
</div>   

<div class=" col-6 mx-auto bg-white" style="border-radius: 100px ; padding:30px ; margin-top:-50px">
    @if (session('success'))
    <div class="alert alert-dismissible container" style="background-color: #B2FFAE">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong class="h6"> {{ session('success') }}</strong>
      </div>
    @endif
    <div class="display-4 text-center">
        ADD Brand
    </div>
    <form action="/product-option/brand" method="POST" class="row"> @csrf
           
        <div class="form-group col-12">
            <label>Name</label>
            @error('name')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input type="text" name="name" value="" class="form-control" placeholder="Name" >
        </div>
        
        
        <div class="form-group col-12">
            <label>Description</label>
            @error('description')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <textarea name="description" cols="30" rows="5" placeholder="Description" class="form-control"></textarea>
        </div>


        



        <div class="form-group text-center m-auto" >
            <input type="submit" class="btn btn-success m-auto" value="Add Brand">
        </div>
    </form>
</div>
@endsection