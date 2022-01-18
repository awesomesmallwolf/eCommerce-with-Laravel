@extends('include.master')
@section('contents')

    @php
    $i = 0;
    @endphp



    <div class="text-right ">
        <a href="/cms/create" class="btn btn-warning btn-lg"><i class="fas fa-filter"></i> &nbsp;
            <span class="font-weight-bold">Add CMS</span></a>
    </div>
    

        @if (session('success'))
            <div class="alert alert-dismissible container" style="background-color: #B2FFAE">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong class="h4"> {{ session('success') }}</strong>
            </div>

        @endif


        <div class="row text-center">
          @if (count($data) > 0)
               @foreach ($data as $item)

                  <div class="px-3 col-12">
                      <div class=" row border-secondary bg-white border py-3 my-3">

                          <div class="col-6 my-auto ">
                              <img src="{{ asset("cmsimages/$item->image") }}" alt="sdfsdf" width="500px" height="350"
                                  style="border-radius: 20px">
                          </div>
                          <div class="col-6 my-auto">
                              <div class="h2">
                                {{ $item->name }}
                              </div>
                              <div class="h6">
                                {{ $item->description }}
                              </div>
                              <div class="text-center">
                                <a href="/cms/{{ $item->id }}/edit" class="btn btn-dark">Edit</a>

                                <button type="button" class="btn btn-danger" data-toggle="modal"
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
                                                <div class="modal-body h5">
                                                    Are You Really Want to delete CMS
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
    
                                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                    <form action="cms/{{ $item->id }}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <input type="submit" value="Delete" class="btn btn-danger">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                              </div>
                          </div>

                      </div>

                  </div>

                @endforeach
          @else
              <div class="text-danger display-1">
                NO DATA IS THERE
              </div>              
          @endif

        </div>


@endsection
