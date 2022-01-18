@extends('include.master')
@section('contents')

<div class="container">
   <div class="row">
    
     
     <table class="table " border="2">
         <thead>
            <tr class="bg-success text-center">
                 <th>
                    Order Information
                 </th>
                 <th>Image</th>
                 <th>Product Price</th>
                 <th>Quantity</th>
                 <th>Total </th>
            </tr>
         </thead>
         <tbody>
            @foreach ($final as $item)
            @php
                $count=count($item->productinfo)
            @endphp
             <tr class="bg-dark ">
                 <td rowspan="{{$count+1}}" class="py-5"><div><span>Order-Id - </span> <span>{{$item->pro_order_id}}</span></div>
                   <div> <span>TotalAmount - </span> <span>{{$item->amount}}</span></div>
                  <div>  <span>Payment Mode - </span> <span>{{$item->payment_mode}}</span></div>
                   <div>
                    <span>Payment Status - </span> 
                    @if ($item->payment_status==0)
                    <span class="text-warning">Pending</span>
                    @else
                        <span class="text-success">Success</span>
                    @endif

                   </div>
                   <div>
                    <span>Coupon Used -     </span> 
                    @if ($item->coupon)
                    <span class="text-warning">Nill</span>
                    @else
                        <span class="text-success">{{$item->coupon_used}}</span>
                    @endif

                   </div>
                </td>
            </tr>
                
                @foreach ($item->productinfo as $new)
                 <tr class="bg-warning">
                  
                    <td> <img src="product_images/{{$new->image}}" alt="" style="width: 50px ; height:50px"> </td>
                    <td> {{$new->product_price}} </td>
                    <td> {{$new->quantity}} </td>
                    <td> &#8377; {{$new->total_price}} </td>
                
                 </tr>
                @endforeach
                 

             @endforeach
         </tbody>
     </table>
    
     
   </div>
</div>
@endsection