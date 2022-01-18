@extends('include.master')

@section('contents')
<div class="text-secondary ml-4 h1">
       <a href="/banner"><i class="fas fa-arrow-circle-left"></i></a>
</div>   

<div class=" col-6 mx-auto bg-white" style="border-radius: 10px ; padding:30px ; margin-top:-50px ; "> <!--box-shadow: -10px 10px 50px-->
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}} <a href="/banner" class="text-dark">Check</a>
    </div>
    @endif
    <div class="display-4 text-center">
        ADD Banner Details
    </div>
    <form action="/banner" method="POST" class="row" enctype="multipart/form-data"> @csrf
           
        <div class="form-group col-12">
            <label>Heading</label>
            @error('heading')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input type="text" name="heading" value="" class="form-control" placeholder="Banner Heading" >
        </div>
        
        
        <div class="form-group col-12">
            <label>Caption</label>
            @error('caption')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input name="caption"  placeholder="Banner Caption or Description" class="form-control">
        </div>
       
       
        <div class="form-group col-12">
            <label>Banner Image</label>
            @error('image')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
    
            <input type="file" name="image" class="form-control">

        </div>

        <div class="form-group text-center">
            <input type="submit" class="btn btn-success m-auto" value="Add Banner">
        </div>
    </form>
</div>
@endsection