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
          <div class="card-header">
            View the proposals made by the helpers
          </div>
          <div class="card-body">

            <h5 class="card-title">{{$user[$i]->name}}&nbsp;{{$user[$i]->lastname}}</h5>
            
    
            <p class="card-text">Experience&nbsp;{{$helper[$i]->exp}}&nbsp;yrs</p>
            <p class="card-text">for&nbsp;{{$helper[$i]->role}}</p>
        
            <p class="card-text">price&nbsp;{{$props[$i]->price}}</p>
    
          
            <a class="btn btn-primary col-4" href="{{route('book',[$props[$i]->id])}}">book</a>
           
          </div>
          <div class="card-footer text-body-secondary">
          @endfor

          </div>
        </div>
       
          
          </div>
        </div>
      
@endsection