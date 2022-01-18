@extends('include.master')

@section('contents')

<div class=" col-6 mt-5 mx-auto ">
 
    <div class="display-4 text-center mb-3 ">
        Edit Coupon 
    </div>
    <form action="/coupon" method="post" class="row"> @csrf

        <div class="form-group col-12">
            <label>Enter Coupon Code</label>
            @error('coupon_code')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <input type="text" name="coupon_code" class="form-control" placeholder="Coupon Code must contain minimum 12 and maximum 16 character">
        </div>



        <div class="form-group col-6">
            <label>Enter Number of Quantity</label>
            @error('quantity')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
            <select name="quantity" class="form-control">
                <option value="">Select </option>
                @for ($i = 1; $i < 101; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
        </div>


        <div class="form-group col-6">
            <label>Coupon Value</label>
            @error('quantity')
            <div class="text-danger font-weight-bold">{{$message}}</div>
            @enderror
           <input type="text" class="form-control" placeholder="Price Value" name="coupon_value">
        </div>




        <div class="form-group text-center">
            <input type="submit" class="btn btn-success m-auto" value="Create Coupon">
        </div>
    </form>
</div>
@endsection