@extends('include.master')

@section('contents')
<div class="text-secondary ml-4 h1">
       <a href="/cms"><i class="fas fa-arrow-circle-left"></i></a>
</div>   

<div class=" col-6 mx-auto bg-white" style="border-radius: 10px ; padding:30px ; margin-top:-50px ; "> <!--box-shadow: -10px 10px 50px-->
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}} <a href="/cms" class="text-dark">Check</a>
    </div>
    @endif
    <div class="display-4 text-center">
        ADD CMS
    </div>
    <form action="/cms" method="POST" class="row" enctype="multipart/form-data"> @csrf
           
        <div class="form-group col-12">
            <label>Name</label>
            @error('name')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input  type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="CSM Name" >
        </div>
        
        
        <div class="form-group col-12">
            <label>Description</label>
            @error('description')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <textarea name="description"  class="form-control" placeholder="Caption or Description"  cols="30" rows="5">{{old('description')}}</textarea>
         
        </div>
       
       
        <div class="form-group col-12">
            <label>CMS Image</label>
            @error('image')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
    
            <input type="file" name="image" value="{{old('image')}}" class="form-control">

        </div>

        <div class="form-group text-center">
            <input type="submit" class="btn btn-success m-auto" value="Add CMS">
        </div>
    </form>
</div>
@endsection