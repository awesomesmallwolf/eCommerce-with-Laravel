@extends('include.master')
@section('contents')

    <div class="row">
        <div class="h1 col">
            <a href="/product-option/product"><i class="fas fa-arrow-circle-left"></i></a>
        </div>
        
    </div>

    @if (session('success'))
        <div class="alert alert-dismissible container" style="background-color: #B2FFAE">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong class="h4"> {{ session('success') }}</strong>
        </div>

    @endif

    <div class="continer">
       <div class="m-auto col-6 text-center h3">
        <div class="text-center bg-dark p-2">
            <span class="h3"> Product Name - </span>
            <span class="h1 text font-weight-bold">{{ $data->name }}</span>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>COLOR</th>
                <td>
                    <span style="background-color: <?php echo $attr->color ?> ; border-radius:5px ;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    </span>
                    
                </td>
            </tr>
            <tr>
                <th> Weight 	(&#13199;)</th>
                <td>{{$attr->weight}}</td>
            </tr>
            <th>Size(inch.)</th>
            <td>{{$attr->size}}</td>
            </tr>
        </table>
       </div>
        
    </div>


    <div class=" m-auto col-6 bg-dark px-5 py-3">
        <div class="h1 text-center" style="background-color: rgb(49, 49, 49) ; border-radius:50px ; color:yellow">
            UPDATE Attributes
        </div>
        <div class="">
            <form action="/product-option/product/attribute/{{$attr->id}}" method="POST"  class="row">
                @csrf
                @method("PUT")
                <div class="form-group col-4">
                    <label>Weight </label> <br>
                    <input type="number" name="weight" class="form-control" value="{{$attr->weight}}">
                </div>
                <div class="form-group col-4">
                    <label>Size </label> <br>
                    <input type="number" name="size" class="form-control" value="{{$attr->size}}">
                </div>
                <div class="form-group col-4">
                    <label>Color </label> <br>
                    <input type="color" name="color" class="form-control" value="{{$attr->color}}">
                </div>

                <div class="form-group text-center col-12">
                    <button type="submit" name="attrupdate" class="m-auto btn-lg btn btn-secondary"> Update Attributes </button>
                </div>
            </form>
        </div>
    </div>
@endsection
