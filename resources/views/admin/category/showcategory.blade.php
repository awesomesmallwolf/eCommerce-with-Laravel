@extends('include.master')
@section('contents')

@php
    $i=0
@endphp



<div class="text-right ">
  <a href="/category/create" class="btn btn-warning btn-lg"><i class="fas fa-sitemap"></i> &nbsp; 
<span class="font-weight-bold">Add Category</span></a>
</div>
   <div  class="text-center mt-4">
       
@if (session('success'))
<div class="alert alert-dismissible container" style="background-color: #B2FFAE">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong class="h4"> {{ session('success') }}</strong>
  </div>
   
@endif
    <table class="table col-10 m-auto table-waring" >
        <thead class=" ">
          <tr>
            <th scope="col" style="width:10% ">S.no.</th>
            <th scope="col" style="width:20% ">Title</th>
            <th scope="col" style="width:50% ">Description</th>
            <th scope="col" style="width:20% ">Action</th>
          </tr>
        </thead>
        <tbody>
          @if (count($data) > 0)
          @foreach ($data as $item)
              <tr>
                  <td>{{++$i}}</td>
                  <td>{{$item->title}}</td>
                  <td>{{$item->description}} </td>
                  <td>
                
                        <a href="/category/{{$item->id}}/edit" class="btn btn-dark">Edit</a>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                            Delete
                        </button>
                    
                
                 

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are You Really Want to delete category  <span class="h3"> {{$item->title}}</span>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                          <form action="category/{{$item->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                              <input type="submit" value="Delete" class="btn btn-danger">
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  </td>
              </tr>
          @endforeach
              
          @else
          <tr>
              <td colspan="4"> 
                  <span class="text-danger font-weight-bold h4">No Category is there</span>
              </td>
          </tr>
          
          @endif  
        </tbody>
      </table>
       
    
   </div>
@endsection



