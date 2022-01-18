@extends('include.master')
@section('contents')

@php
    $i=0
@endphp
@if (session('success'))
<div class="alert alert-dismissible container" style="background-color: #B2FFAE">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong class="h4"> {{ session('success') }}</strong>
  </div>
   
@endif

<div class="text-right ">
  <a href="/user/create" class="btn btn-warning btn-lg"><i class="fas fa-users"  style="color:#000000"></i> &nbsp; Add User</a>
</div>
   <div  class="text-center mt-4">
    <table class="table table-striped" >
        <thead class="">
          <tr>
            <th scope="col">S.no</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            @if (count($data)>1)

         @foreach ($data as $item)
         @if (Auth::user()->email == $item->email )
             @continue
         @else
             
         
        
             <tr>
                <td>{{++$i}}</td>
                <td>{{$item->firstname}}</td>
                <td>{{$item->lastname}}</td>
                <td>{{$item->email}}</td>
                <td>
                    <form action="/userstatuschange/{{ $item->id }}" method="GET">
                        @if ($item->status)
                            <button type="submit" class="btn btn-sm font-weight-bold"
                                style="background-color: #7EFE77">Active</button>
                        @else
                            <button type="submit" class="btn btn-sm font-weight-bold"
                                style="background-color: #EA7171">In-Active</button>
                        @endif
                    </form>
                </td>
   
               <td>
                  <span class="h4" style="color:#010E4D ; font-weight:bold ">
                    @foreach ($role as $r)
                        @if ($r->id==$item->role_id)
                            {{$r->role_name}}
                        @endif
                    @endforeach
                    {{-- {{$item->role_id}} --}}
                  
                  </span>
               </td>
               <td>
{{-- DELETE                                    <!-- Button trigger modal --> --}}
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$item->id}}">Delete</button>
{{-- EDIT                 --}}
        <a href="user/{{$item->id}}/edit" class="btn btn-primary">Edit</a>

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
                        Are You Really Want to delete USER   <b class="h4"> {{$item->firstname}}</b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        <form action="user/{{$item->id}}" method="POST">
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
            
             @endif
         @endforeach
         @else
         <tr>
             <td colspan="7">
                 <span class="text-danger font-weight-bold h4">No other User is there</span>
             </td>
         </tr>
         @endif

        </tbody>
      </table>
       
    
   </div>
@endsection