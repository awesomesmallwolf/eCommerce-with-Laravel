@extends('include.master')

@section('contents')
<div class="text-secondary ml-4 h1">
       <a href="/category"><i class="fas fa-arrow-circle-left"></i></a>
</div>   

<div class=" col-6 mx-auto bg-white" style="border-radius: 10px ; padding:30px ; margin-top:-50px">
   
    <div class="display-4 text-center">
        EDIT Category
    </div>
    <form action="/category/{{$data->id}}" method="POST" class="row"> @csrf
           @method("PUT")
        <div class="form-group col-12">
            <label>Title</label>
            @error('title')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input type="text" name="title" value="{{$data->title}}" class="form-control" placeholder="TITLE">
        </div>
        
        
        <div class="form-group col-12">
            <label>Description</label>
            @error('description')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <textarea name="description" cols="30" rows="5" placeholder="TITLE" class="form-control">{{$data->description}}</textarea>
        </div>


        



        <div class="form-group text-center">
            <input type="submit" class="btn btn-success m-auto" value="EDIT Category">
        </div>
    </form>
</div>
@endsection