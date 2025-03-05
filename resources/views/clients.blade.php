@extends('layout.master')
@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Accept the User</h1>
    </div>
    
</div>

@if (\Session::has('msg'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('msg') !!}</li>
    </ul>
</div>
@endif

@if (\Session::has('msg1'))
<div class="alert alert-danger">
    <ul>
        <li>{!! \Session::get('msg1') !!}</li>
    </ul>
</div>
@endif
@php
$n=count($bookuser)
@endphp
@for($i=0;$i<$n;$i++)
<div class="container">  <div class="row justify-content-center">
    @if($bookuser[$i]->Acceptedpending=='pending')
        <div class="col-md-8 shadow p-4 mb-4 bg-body-tertiary rounded animated fadeInUp"> <p>Your proposal given to {{$bookuser[$i]->name}} {{$bookuser[$i]->lastname}} of time 

                
                    {{\Carbon\Carbon::parse($booktime[$i]->start_time)->format('g:i A')}} to {{\Carbon\Carbon::parse($booktime[$i]->end_time)->format('g:i A')}}
            
                has been accepted by the user.
            </p>
            <p>Are you ready to work with this user?</p>
            <div class="d-flex justify-content-center">  <a href="{{route('acceptbook.fill',[$bookuser[$i]->id])}}" class="btn btn-primary me-2">Yes</a>  <a href="{{route('deniedbook.fill',[$bookuser[$i]->id])}}" class="btn btn-danger">No</a>  </div>
        </div>
        @endif
        @endfor
    </div>
</div>

@endsection