@extends('layout.master')
@section('container')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">select request for which you want to see proposals</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                
            </ol>
        </nav>
    </div>
</div>
@php
    $n=count($users);   
   @endphp
   @for($i=0;$i<$n;$i++)      
<div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            Find Assistance
        </div>
        <div class="card-body">
            <h5 class="card-title text-center mb-3">
                {{ $users[$i]->name }} {{ $users[$i]->lastname }}
            </h5>
            <div class="mb-3">
                <p class="card-text text-center">
                    {{ $useradd[$i]->address_line_1 }}, {{ $useradd[$i]->address_line_2 }}, {{ $useradd[$i]->city }}, {{ $useradd[$i]->state }}
                </p>
            </div>
            <div class="mb-3 text-center">
                <p class="card-text">
                    {{ \Carbon\Carbon::parse($usertime[$i]->start_time)->format('g:i A') }} to {{ \Carbon\Carbon::parse($usertime[$i]->end_time)->format('g:i A') }}
                </p>
                <p class="card-text">
                    Days: {{ str_replace(['[', ']', '"'], '', $usertime[$i]->weekdays) }}
                </p>
                <p class="text-center">time preference:{{$usertime[$i]->jobtype}}</p>
            </div>
            <div class="mb-3">
                <p class="card-text"><strong>Home Type:</strong> {{ $userclean[$i]->hometype }}</p>
                <p class="card-text"><strong>Bedrooms:</strong> {{ $userclean[$i]->bedroomno }}</p>
                <p class="card-text"><strong>Halls:</strong> {{ $userclean[$i]->hallno }}</p>
                <p class="card-text"><strong>Kitchens:</strong> {{ $userclean[$i]->kichenno }}</p>
                <p class="card-text"><strong>Cleaning Type:</strong> {{ $userclean[$i]->cleaningtype }}</p>
            </div>
            <div class="d-grid gap-2">
            <div class="text-center">    <a href="{{ route('propsee.build', [$usertime[$i]->id]) }}" class="btn btn-primary col-4">View Proposals</a></div>
                {{-- <a href="#" class="btn btn-outline-secondary">View Profile</a> --}}
            </div>
        </div>
    </div>
    @endfor
    @endsection