@extends('layout.master')
@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Accept the User</h1>
    </div>
    <a href="{{route('help.build')}}">back to home</a>
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

<div class="container">  <div class="row justify-content-center"> @foreach($bookuser as $bou)
    @if($bou->Acceptedpending=='pending')
        <div class="col-md-8 shadow p-4 mb-4 bg-body-tertiary rounded animated fadeInUp"> <p>Your proposal given to {{$bou->name}} {{$bou->lastname}} of time 
                @foreach($booktime as $bot)
                
                    {{\Carbon\Carbon::parse($bot->start_time)->format('g:i A')}} to {{\Carbon\Carbon::parse($bot->end_time)->format('g:i A')}}
                @endforeach
                has been accepted by the user.
            </p>
            <p>Are you ready to work with this user?</p>
            <div class="d-flex justify-content-center">  <a href="{{route('acceptbook.fill',[$bou->id])}}" class="btn btn-primary me-2">Yes</a>  <a href="{{route('deniedbook.fill',[$bou->id])}}" class="btn btn-danger">No</a>  </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

@endsection