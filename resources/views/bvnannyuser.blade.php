@extends('layout.master')
@section('container')
    <div class="container-xxl bg-white p-0">
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container my-5 py-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-3 text-white animated slideInLeft">Karvae<br>Ghar ki seva</h1>
                        <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor
                            diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem
                            sit clita duo justo magna dolore erat amet</p>

                    </div>
                    <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                        <img class="img-fluid" src="img/hero.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card text-center">
        <div class="card-header">
          @php
          $no1=count($us)
          @endphp
          View the proposals made by the helpers
        </div>
        <div class="card-body">
           
          <h5 class="card-title">{{$itemadd->name}}</h5>
          <p class="card-text">{{$city}}</p>
          {{ \Carbon\Carbon::parse($us[$no1-1]->start_time)->format('g:i A') }}&nbsp;to&nbsp;{{ \Carbon\Carbon::parse($us[$no1-1]->end_time)->format('g:i A') }}
        <p class="card-text">{{$us[$no1-1]->weekdays}}</p>
          <table border  class="card-text">
            <tr><th>childname</th>
                <th>age</th>
                <th>gender</th></tr>
          @for($i=0;$i<$no;$i++)
          <tr><td>{{$items[$i]->childname}}</td><td>{{$items[$i]->childage}}</td><td>{{$items[$i]->childgender}}</td></tr>
          @endfor
          </table>
          <p class="card-text" style="background-color: orange;color:white"> your request has been registered and you will get the proposals soon<br>
            go to view proposals to see proposals made
          </p>
        </div>
        <div class="card-footer text-body-secondary">
          <a href="{{route('user.build')}}">Back</a>     
    
              </div>
      </div>
    </html>
    
    @endsection