@extends('include.master')
@section('contents')
    @php $i=0    @endphp

    <div class="text-secondary ml-4 h1 row">
        <div class="col">
            <a href="/product-option"><i class="fas fa-arrow-circle-left"></i></a>
            @if (session('success'))
                <div class="alert alert-dismissible container p-1" style="background-color: #B2FFAE">
                    <span class="h6"> {{ session('success') }}</span>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
        </div>
        <div class="col text-right mr-5">
            <a href="/product-option/product/create" class="btn btn-lg btn-warning">
                <i class="fab fa-product-hunt"> &nbsp; ADD Product</i></a>
        </div>
    </div>

    <table class="table p-0 text-center">
        <thead>
            <tr>
                <th scope="col" style="width: 10%">S.no</th>
                <th scope="col" style="width: 10%">Name</th>
                <th scope="col" style="width: 20%">Description</th>
                <th scope="col" style="width: 10%">Price(&#8377)</th>
                <th scope="col" style="width: 10%">Status</th>
                <th scope="col" style="width: 10%">Brand</th>
                <th scope="col" style="width: 10%">Category</th>
                <th scope="col" style="width: 10%">MORE..</th>
                <th scope="col" style="width: 10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($data) > 0)
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td scope="row">{{ $item->name }}</td>
                        <td scope="row">{{ $item->description }}</td>
                        <td scope="row">{{ $item->price }}</td>
                        <td scope="row">
                            <form action="/productsatuschange/{{ $item->id }}" method="GET">
                                @if ($item->status)
                                    <button type="submit" class="btn btn-sm font-weight-bold"
                                        style="background-color: #7EFE77">Active</button>
                                @else
                                    <button type="submit" class="btn btn-sm font-weight-bold"
                                        style="background-color: #EA7171">In-Active</button>
                                @endif
                            </form>
                        </td>
                        <td scope="row">
                            @foreach ($brand as $bi)
                                @if ($bi->id == $item->brand_id)
                                    {{ $bi->name }}
                                @endif
                            @endforeach
                        </td>
                        <td scope="row">
                            @foreach ($category as $ci)
                                @if ($ci->id == $item->cate_id)
                                    {{ $ci->title }}
                                @endif
                            @endforeach
                        </td>
                        <td scope="row">


                            <a href="/product-option/product/image/{{ $item->id }}" class="h4 text-primary"><i
                                    class="far fa-images"></i></a> &nbsp;&nbsp;&nbsp;
                            <a href="/product-option/product/attribute/{{ $item->id }}"><img
                                    src="https://img.icons8.com/external-tal-revivo-color-tal-revivo/25/000000/external-computer-algorithm-with-connected-notes-diagram-web-color-tal-revivo.png" /></a>
                        </td>
                        <td scope="row">
                            <a href="/product-option/product/{{ $item->id }}/edit" class="btn btn-warning btn-sm"><i
                                    class="far fa-edit"></i></a>

                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#exampleModal{{ $item->id }}">
                                <i class="fas fa-trash"></i>
                            </button>



                            {{-- DELETE PRODUCTS MODEL CONFIRMATION --}}
                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are You Really Want to delete PRODUCT
                                            <div class="h3"> Name - {{ $item->name }}</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>

                                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                            <form action="/product-option/product/{{ $item->id }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- END MODEL --}}
                        </td>
                    </tr>
                @endforeach


            @else
                <tr>
                    <td colspan="10">
                        <div class="text-danger h2">NO Product Found</div>
                    </td>
                </tr>
            @endif

        </tbody>
    </table>


@endsection
