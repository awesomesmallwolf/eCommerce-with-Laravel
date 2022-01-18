@extends('include.master')
@section('contents')

<div class="display-4 text-center my-2">Contact Us</div>

@if(Session::has("success"))
    <div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@php
    $i=1
@endphp
    <table class="table text-center">
        <thead>
            <tr class="h5">
                <th style="width:5%"> S.No </th>
                <th style="width:10%"> Name </th>
                <th style="width:10%"> Email </th>
                <th style="width:10%">  Mobile No. </th>
                <th style="width:67%">  Message </th>
                <th style="width:3%"> Action </th>
            </tr>
        </thead>
        <tbody> 
            @foreach ($data as $item)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->contact}}</td>
                <td>{{$item->message}}</td>
                <td>
                    <button type="button" class="btn" data-toggle="modal" data-target="#bd-example-modal-sm{{$item->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"  width="50" height="50"                viewBox="0 0 172 172"
                        style=" fill:#000000;"><g transform="translate(0.516,0.516) scale(0.994,0.994)"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="none" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g fill="#e74c3c" stroke="#cccccc" stroke-linejoin="round"><path d="M160.53333,80.26667c0,34.83 -33.368,63.06667 -74.53333,63.06667c-5.7104,0 -11.26877,-0.54691 -16.60651,-1.57891c-3.31387,-0.64213 -6.69044,0.5324 -9.09271,2.90026c-8.17895,8.06496 -20.13914,15.77687 -34.25443,15.86745c-0.08192,0.00726 -0.16411,0.011 -0.24635,0.0112c-1.58322,0 -2.86667,-1.28345 -2.86667,-2.86667c0.0013,-1.18894 0.73637,-2.25367 1.84766,-2.6763c0.00745,-0.00376 0.01491,-0.0075 0.0224,-0.0112c12.14954,-5.60644 13.51409,-17.76635 13.10156,-26.57266c-16.15653,-11.56987 -26.43828,-28.82997 -26.43828,-48.13984c0,-34.83 33.368,-63.06667 74.53333,-63.06667c41.16533,0 74.53333,28.23667 74.53333,63.06667zM58.93464,53.2013c-2.13853,2.13853 -2.1328,5.60496 0,7.73776l19.32761,19.32761l-19.32761,19.32761c-2.13853,2.13853 -2.1328,5.60496 0,7.73776c2.13853,2.1328 5.59922,2.13853 7.73776,0l19.32761,-19.32761l19.32761,19.32761c2.13853,2.1328 5.59922,2.13853 7.73776,0c2.13853,-2.13853 2.1328,-5.60496 0,-7.73776l-19.32761,-19.32761l19.32761,-19.32761c2.13853,-2.13853 2.1328,-5.60496 0,-7.73776c-2.13853,-2.1328 -5.59922,-2.13853 -7.73776,0l-19.32761,19.32761l-19.32761,-19.32761c-1.06927,-1.0664 -2.47554,-1.60059 -3.87448,-1.6013c-1.39893,-0.00072 -2.79401,0.53204 -3.86328,1.6013z"></path></g><path d="M0,172v-172h172v172z" fill="none" stroke="none" stroke-linejoin="miter"></path><g fill="#e74c3c" stroke="none" stroke-linejoin="miter"><path d="M86,17.2c-41.16533,0 -74.53333,28.23667 -74.53333,63.06667c0,19.30987 10.28175,36.56997 26.43828,48.13984c0.41253,8.80631 -0.95202,20.96622 -13.10156,26.57266c-0.00748,0.0037 -0.01495,0.00743 -0.0224,0.0112c-1.11129,0.42263 -1.84635,1.48737 -1.84766,2.6763c0,1.58322 1.28345,2.86667 2.86667,2.86667c0.08224,-0.0002 0.16443,-0.00393 0.24635,-0.0112c14.11529,-0.09058 26.07547,-7.80249 34.25443,-15.86745c2.40227,-2.36787 5.77884,-3.5424 9.09271,-2.90026c5.33773,1.032 10.89611,1.57891 16.60651,1.57891c41.16533,0 74.53333,-28.23667 74.53333,-63.06667c0,-34.83 -33.368,-63.06667 -74.53333,-63.06667zM62.79792,51.6c1.39893,0.00072 2.80521,0.5349 3.87448,1.6013l19.32761,19.32761l19.32761,-19.32761c2.13853,-2.13853 5.59922,-2.1328 7.73776,0c2.1328,2.1328 2.13853,5.59923 0,7.73776l-19.32761,19.32761l19.32761,19.32761c2.1328,2.1328 2.13853,5.59922 0,7.73776c-2.13853,2.13853 -5.59922,2.1328 -7.73776,0l-19.32761,-19.32761l-19.32761,19.32761c-2.13853,2.13853 -5.59922,2.1328 -7.73776,0c-2.1328,-2.1328 -2.13853,-5.59922 0,-7.73776l19.32761,-19.32761l-19.32761,-19.32761c-2.1328,-2.1328 -2.13853,-5.59923 0,-7.73776c1.06927,-1.06927 2.46435,-1.60202 3.86328,-1.6013z"></path></g><path d="" fill="none" stroke="none" stroke-linejoin="miter"></path><path d="" fill="none" stroke="none" stroke-linejoin="miter"></path></g></g></svg>
                    </button>

<div class="modal fade" id="bd-example-modal-sm{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form action="/contactus/{{$item->id}}" method="post" class="py-5">
        @csrf  @method("DELETE")
       <div class="h3 my-3">ARE YOU WANT TO DELETE MESSAGE</div>
        <button class="btn btn-danger" type="submit">
            DELETE
        </button>
    </form>
    </div>
  </div>
</div>
                    <a href="/contact/{{$item->id}}" class="btn btn-sm btn-">
                       
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection