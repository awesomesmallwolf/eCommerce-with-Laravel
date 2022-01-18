@extends('include.master')
@section('contents')

    @php
    $i = 0;
    @endphp
       
       @if (session('error'))
       <div class="alert alert-dismissible container" style="background-color: #fc9587">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
           <strong class="h4"> {{ session('error') }}</strong>
         </div>
          
       @endif

    <div class="text-right ">
        <a href="/coupon/create" class="btn btn-warning btn-lg"><i class="fas fa-gift"> </i> &nbsp; Add Coupon</a>
    </div>
    <div class="text-center mt-4">
        <table class="table col-10 m-auto">
            <thead class=" ">
                <tr>
                    <th scope="col">S.no.</th>
                    <th scope="col">Coupon Code</th>
                    <th scope="col">Remaining Quantity</th>
                    <th scope="col">Total Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Coupon Value</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $item->coupon_code }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->total_quantity }}</td>
                            <td>
                                <form action="/coupon/{{ $item->id }}" method="GET">
                                    @if ($item->status)
                                        <button type="submit" class="btn btn-sm font-weight-bold"
                                            style="background-color: #7EFE77">Active</button>
                                    @else
                                        <button type="submit" class="btn btn-sm font-weight-bold"
                                            style="background-color: #EA7171">In-Active</button>
                                    @endif
                                </form>
                            </td>
                            <td>{{ $item->coupon_value }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#exampleModal{{ $item->id }}">
                                    Delete
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are You Really Want to delete Coupan <b> {{ $item->coupon_code }}</b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>

                                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                <form action="coupon/{{ $item->id }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="submit" value="Delete" class="btn btn-danger">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- UPDATE Quantity --}}


                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#increase{{$item->id}}">
                                    <i class="fas fa-sort-amount-up"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="increase{{$item->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle">
                                                  How Many Coupon you want to Increase 
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <form action="/coupon/{{$item->id}}" method="POST">
                                            @csrf   @method("PUT")
                                            
                                          <div class="modal-body">
                                              <input type="number" name="newvaluecoupon" class="form-control" required>
                                              <input type="hidden" name="currentcoupon" value="{{$item->quantity}}">
                                              <input type="hidden" name="totalcoupon" value="{{$item->total_quantity}}">
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary"
                                                  data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Save changes</button>
                                          </div>
                                            
                                        </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- END --------------UPDATE Quantity --}}




                            </td>
                        </tr>
                    @endforeach

                @else
                    <tr>
                        <td colspan="7">
                            <span class="text-danger font-weight-bold h4">No Coupon Generated</span>
                        </td>
                    </tr>

                @endif
            </tbody>
        </table>


    </div>
@endsection
