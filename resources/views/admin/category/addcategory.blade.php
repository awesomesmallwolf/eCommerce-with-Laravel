@extends('include.master')

@section('contents')
<div class="text-secondary ml-4 h1">
       <a href="/category"><i class="fas fa-arrow-circle-left"></i></a>
</div>   

<div class=" col-6 mx-auto bg-white" style="border-radius: 10px ; padding:30px ; margin-top:-50px">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}} <a href="/category" class="text-dark">SHOW</a>
    </div>
    @endif
    <div class="display-4 text-center">
        ADD Category
    </div>
    <form action="/category" method="POST" class="row"> @csrf
           
        <div class="form-group col-12">
            <label>Title</label>
            @error('title')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input type="text" name="title" value="" class="form-control" placeholder="TITLE" >
        </div>
        
        
        <div class="form-group col-12">
            <label>Description</label>
            @error('description')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <textarea name="description" cols="30" rows="5" placeholder="Description" class="form-control"></textarea>
        </div>


        



        <div class="form-group text-center">
            <input type="submit" class="btn btn-success m-auto" value="Add Category">
        </div>
    </form>
</div>
@endsection