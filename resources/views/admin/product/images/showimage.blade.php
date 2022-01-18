@extends('include.master')
@section('contents')

<div class="row">
    <div class="h1 col">
        <a href="/product-option/product"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
    <div class="text-right col">
    
        {{-- <form action="/product-option/product/image/{{$data->id}}/edit" method="POST">
            @csrf @method("GET")
            <button class="btn btn-dark btn-lg">ADD</button>
        </form> --}}

        {{-- <a href="/product-option/product/image/create" class="btn btn-warning btn-lg">ADD <i class="fas fa-camera"></i></a>
     --}}
    </div>
</div>

@if (session('success'))
<div class="alert alert-dismissible container" style="background-color: #B2FFAE">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong class="h4"> {{ session('success') }}</strong>
  </div>
   
@endif

    <div class="continer">
    
        <div class="text-center">
           <span class="h3"> Product Name - </span>
           <span class="h1 text-dark font-weight-bold">{{$data->name}}</span>
        </div>
        <div class="row">

            @foreach ($images as $image)
                <div class="col-3 py-3">
                    <div class="border py-3 text-center" style="background-color: #B1B1B1">
                        <img src="{{asset("product_images/$image->image")}}" class="rounded" alt="sdf" width="200px" height="200px">
                    <br> <br>    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#exampleModal{{$image->id}}">
                        Delete
                    </button>
               
                
    
{{-- DELETE PRODUCTS MODEL CONFIRMATION--}}
<div class="modal fade" id="exampleModal{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Product Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body h2">
          Are You Really Want to delete Image 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
          <form action="/product-option/product/image/{{$image->id}}" method="POST">
            @csrf
            @method("DELETE")
              <input type="submit" value="Delete" name="deleted" class="btn btn-danger">
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- END MODEL --}}
                    </div>
                </div>
          @endforeach
            
        </div>
    </div>


    <div class=" m-auto bg-dark px-5 py-3 text-center">
        <div class="h1">
            Add Image to Product
        </div>
        <div class="">
            <form action="/product-option/product/image/{{$data->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label>Choose Image </label> <br>
                    <input type="file" name="image[]" multiple>
                </div>
                
                <div class="form-group text-center">
                    <input type="submit" name="addimage" class="btn btn-secondary">
                </div>
            </form>
        </div>
    </div>
@endsection


