@extends('include.master')

@section('contents')

    <div class="mx-auto col-5  border-dark p-0  border mt-5">

        <div class="display-4  py-2 bg-dark text-center">
            <i class="far fa-bell"> Notification</i>
        </div>
        <div class="text-center border py-2"><i class="fas fa-bullhorn"></i> We send all order Details on this mail</div>
        <div>
            @foreach ($data as $item)
                <div class="text-center h4">
                    {{ $item->notifyemail }}
                    {{-- <a href="/configuration/{{$item->id}}/edit" class="btn btn-sm btn-warning">change</a> --}}
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
                        data-target="#exampleModalCenter{{ $item->id }}">
                        Change
                    </button>
                </div>

                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Change Notification Mail</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="/configuration/{{ $item->id }}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="modal-body">

                                    <input type="email" name="notifyemail" value="{{ $item->notifyemail }}" required
                                        class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    <button type="submit" class="btn btn-primary">Save changes</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>


    @if (Session::has('success'))
        <div class="mx-auto col-5 alert alert-dismissible alert-success " style="background-color:#C3FFBD; color:#085700">
            <button type="button" class="close" data-dismiss="alert" style="color:#085700">&times;</button>
            <strong class="h4"> {{ Session::get('success') }} </strong>

        </div>
    @endif


    @error('notifyemail')
        <div class="mx-auto col-5 text-center alert alert-danger font-weight-bold alert-dismissible">
            <button type="button" class="close text-white" data-dismiss="alert">&times;</button>
            {{ $message }}
        </div>
    @enderror
@endsection
