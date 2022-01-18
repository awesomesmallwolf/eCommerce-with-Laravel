@extends('include.master')
@section('contents')

    <div class="h1 ml-5">
        <a href="/product-option/product"><i class="fas fa-arrow-circle-left"></i></a>
    </div>

    <div class="mx-auto px-5 border border-secondary col-8 bg-white"
        style="box-shadow: -10px -10px 10px rgb(110, 110, 110); border-radius:10px ; margin-top: -30px">
        <div class="py-3 display-4 text-center font-weight-bold" style="color: rgb(68, 68, 68)">
            EDIT PRODUCT
        </div>
        <div class="">
            <form action="/product-option/product/{{$data->id}}" method="POST"> @csrf 
                @method("PUT")
                <div class="form-group">
                    <label>Product Name</label>
                    @error('name')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                    <input type="text" name="name" class="form-control" value="{{$data->name}}">
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label>Product Price</label>
                        @error('price')
                            <div class="text-danger font-weight-bold">{{ $message }}</div>
                        @enderror
                        <input type="number" name="price" class="form-control"  value="{{$data->price}}">
                    </div>

                    <div class="col">
                        <label>Product Brand</label>
                        @error('brand_id')
                            <div class="text-danger font-weight-bold">{{ $message }}</div>
                        @enderror
                        <select name="brand_id" class="form-control">
                            <option value="">Choose Brand</option>
                            @foreach ($brand as $item)
                                <option value="{{ $item->id }}" 
                                    <?php if($item->id == $data->brand_id) echo "SELECTED"; ?> 
                                >{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col ">
                        <label>Product Category</label>
                        @error('cate_id')
                            <div class="text-danger font-weight-bold">{{ $message }}</div>
                        @enderror
                        <select name="cate_id" class="form-control">
                            <option value="">Choose Category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}"
                                    <?php if($item->id == $data->cate_id) echo "SELECTED"; ?>
                                >{{ $item->title }}</option>
                            @endforeach
                        </select>

                        <div class="form-group text-center mt-3">
                            <input type="submit" value="EDIT Product" class="btn btn-success">
                        </div>
                    </div>
                    <div class="col">
                        <label>Description</label>
                        @error('description')
                            <div class="text-danger font-weight-bold">{{ $message }}</div>
                        @enderror
                        <textarea name="description" rows="5" class="form-control">{{$data->description}}</textarea>
                    </div>
                   
                </div>

        </div>

        
        </form>
    </div>
    </div>
@endsection
