

@extends('include.master')
@section('contents')

<div class="h1 ml-5">
    <a href="/product-option/product"><i class="fas fa-arrow-circle-left"></i></a>
</div>

    <div class="mx-auto px-5 border border-secondary col-8 bg-white"
        style="box-shadow: -10px -10px 10px rgb(110, 110, 110); border-radius:10px ; margin-top: -30px">
        <div class="py-3 display-4 text-center font-weight-bold" style="color: rgb(68, 68, 68)">
            ADD PRODUCT
        </div>
        <div class="">
            <form action="/product-option/product" method="POST" enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label>Product Name</label>
                    @error('name')
                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label>Product Price</label>
                        @error('price')
                            <div class="text-danger font-weight-bold">{{ $message }}</div>
                        @enderror
                        <input type="number" name="price" class="form-control">
                    </div>

                    <div class="col">
                        <label>Product Brand</label>
                        @error('brand_id')
                            <div class="text-danger font-weight-bold">{{ $message }}</div>
                        @enderror
                        <select name="brand_id" class="form-control">
                            <option value="">Choose Brand</option>
                            @foreach ($brand as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col">
                        <label>Product Category</label>
                        @error('cate_id')
                            <div class="text-danger font-weight-bold">{{ $message }}</div>
                        @enderror
                        <select name="cate_id" class="form-control">
                            <option value="">Choose Category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label>Product Images(Single or multiple)</label>
                        @error('image')
                            <div class="text-danger font-weight-bold">{{ $message }}</div>
                        @enderror
                        <input type="file" name="image[]" class="form-control" multiple>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label>Description</label>
                        @error('description')
                            <div class="text-danger font-weight-bold">{{ $message }}</div>
                        @enderror
                        <textarea name="description" rows="9" class="form-control"> </textarea>
                    </div>
                    <div class="col">
                        <label class="">(Optional)</label>
                        <div class="border p-2">
                            <div class="form-group">
                                <label>Color</label>
                                <input type="color"  name="color" id="colors" >
                            </div>
                            <div class="form-group">
                                <label>Weight</label>
                                <input type="number" name="weight" value="0" class="form-control" step="any">
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <input type="number" name="size" value="0" class="form-control">
                            </div>
                        </div>

                    </div>

                </div>
        </div>

        <div class="form-group text-center">
            <input type="submit" value="Add Product" class="btn btn-success">
        </div>
        </form>
    </div>
    </div>
@endsection

