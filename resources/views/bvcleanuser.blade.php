@extends('layout.master')
@section('container')
    <div class="container-xxl bg-white p-0">
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container my-5 py-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-3 text-white animated slideInLeft">Karvae<br>Ghar ki seva</h1>
                        <p class="text-white animated slideInLeft mb-4 pb-2">Your everyday needs, expertly handled.
                          Home services, simplified. Connecting you with top-rated pros. Get things done, the easy way.
                          Trusted professionals, at your service.</p>

                    </div>
                    <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                        <img class="img-fluid" src="img/hero.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($items as $user)
    <div class="card text-center">
      @php
      $no1=count($us)
      @endphp
        <div class="card-header">
          View the proposals made by the helpers
        </div>
        <div class="card-body">
           
          <h5 class="card-title">{{$itemadd->name}}</h5>
          <p class="card-text">{{$city}}</p>
          {{ \Carbon\Carbon::parse($us[$no1-1]->start_time)->format('g:i A') }}&nbsp;to&nbsp;{{ \Carbon\Carbon::parse($us[$no1-1]->end_time)->format('g:i A') }}
          <p class="card-text">{{$us[$no1-1]->weekdays}}</p>
          <p class="card-text">type of house @foreach($user->cleanerreqs as $add){{{$add->hometype}}}@endforeach</p>
          <p class="card-text"> number of bedrooms @foreach($user->cleanerreqs as $add){{{$add->bedroomno}}}@endforeach</p>
          <p class="card-text"> number of halls @foreach($user->cleanerreqs as $add){{{$add->hallno}}}@endforeach</p>
          <p class="card-text"> numberof kitchen @foreach($user->cleanerreqs as $add){{{$add->kichenno}}}@endforeach</p>
          <p class="card-text"> type of cleaning @foreach($user->cleanerreqs as $add){{{$add->cleaningtype}}}@endforeach</p>
          <p class="card-text" style="background-color:orange;color:white"> your request has been registered and you will get the proposals soon<br>
            go to view proposals to see proposals made
          </p>
        </div>
        <div class="card-footer text-body-secondary">
          
          <a href="{{route('user.build')}}">Back</a>     
        </div>
      </div>
    
        
    @endforeach
@endsection