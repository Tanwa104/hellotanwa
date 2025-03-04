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
@if (\Session::has('msg'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('msg') !!}</li>
    </ul>
</div>
@endif
    <div class="card text-center">
       @php
       $no=count($user);
       $no1=count($helper);
       $no2=count($props);
       @endphp
                        @for($i=0;$i<$no;$i++)
                        <div class="card mb-4 shadow-sm">
                          <div class="card-header bg-primary text-white text-center">
                              View Proposals from Helpers
                          </div>
                          <div class="card-body">
                              <h5 class="card-title text-center mb-3">
                                  {{ $user[$i]->name }} {{ $user[$i]->lastname }}
                              </h5>
                      
                              <div class="mb-3">
                                  <p class="card-text">
                                      <strong>Experience:</strong> {{ $helper[$i]->exp }} yrs
                                  </p>
                                  <p class="card-text">
                                      <strong>Role:</strong> {{ $helper[$i]->role }}
                                  </p>
                                  <p class="card-text">
                                      <strong>Price:</strong> ₹{{ $props[$i]->price }}
                                  </p>
                              </div>
                      
                              <div class="d-grid gap-2 d-md-block text-center">
                                  <a class="btn btn-success" href="{{ route('book', [$props[$i]->id]) }}">Book Now</a>
                              </div>
                          </div>
                      </div>
          <div class="card-footer text-body-secondary">
          @endfor

          </div>
        </div>
       
          
          
@endsection