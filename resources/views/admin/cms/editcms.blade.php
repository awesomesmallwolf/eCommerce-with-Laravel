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
        EDIT CMS Information
    </div>
    <form action="/cms/{{$data->id}}" method="POST" class="row" enctype="multipart/form-data"> @csrf
           @method("PUT")
        <div class="form-group col-12">
            <label>Name</label>
            @error('name')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input type="text" value="{{$data->name}}" name="name" value="" class="form-control" placeholder="CMS NAME" >
        </div>
        
        
        <div class="form-group col-12">
            <label>Description</label>
            @error('description')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <textarea name="description"  cols="30" rows="5"  placeholder="Caption or Description" class="form-control"> {{$data->description}} </textarea>
           
        </div>
       
       
        <div class="form-group col-12">
            <label> Image (changes is optional)</label>
            @error('image')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
    
            <div class="row">
                <div class="col">
                    <input type="file" name="image" class="form-control">
                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-success m-auto" value="Edit CMS">
                    </div>
                </div>
                <div class="col">
                    <img src="{{asset('cmsimages'.'/'.$data->image)}}" alt="Edit CMS" width="250" height="150" style="border-radius: 20px">
                </div>
            </div>

        </div>

       
    </form>
</div>
@endsection