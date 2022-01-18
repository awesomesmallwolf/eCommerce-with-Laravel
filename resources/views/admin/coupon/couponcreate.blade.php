@extends('include.master')

@section('contents')
    <div class="text-secondary ml-4 h1">
        <a href="/coupon"><i class="fas fa-arrow-circle-left"></i></a>
    </div>

    <div class=" col-6 mt-5 mx-auto ">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }} <a href="/coupon" class="text-dark">SHOW</a>
            </div>
        @endif
        <div class="display-4 text-center mb-3">
            Create Coupon
        </div>
        <form action="/coupon" method="post" class="row"> @csrf

            <div class="form-group col-12">
                <label>Enter Coupon Code</label>
                @error('coupon_code')
                    <div class="text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <input type="text" name="coupon_code" class="form-control"
                    placeholder="Coupon Code must contain minimum 4 and maximum 16 character">
            </div>



            <div class="form-group col-6">
                <label>Enter Number of Quantity</label>
                @error('quantity')
                    <div class="text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <input type="number" name="quantity" class="form-control" id="">
            </div>


            <div class="form-group col-6">
                <label>Coupon Value</label>
                @error('quantity')
                    <div class="text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <input type="text" class="form-control" placeholder="Price Value" name="coupon_value">
            </div>




            <div class="form-group text-center">
                <input type="submit" class="btn btn-success m-auto" value="Create Coupon">
            </div>
        </form>
    </div>
@endsection
