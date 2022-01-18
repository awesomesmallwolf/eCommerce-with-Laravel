@extends('include.master')

@section('contents')
<div class="display-4 fornt-weight-bold">WelCome! Hello  {{{ Auth::user()->firstname}}}</div>

@endsection