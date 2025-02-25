@extends('layout.master')
@section('container')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">See request</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                
            </ol>
        </nav>
    </div>
</div>
<a href="" class="btn btn-primary">city and area filter</a>
@php
$n=count($users);   

@endphp
@for($i=0;$i<$n;$i++)      
<div class="card text-center">
<div class="card-header">
  Find Assistence
</div>
<div class="card-body">
   
  <h5 class="card-title">{{$users[$i]->name}}&nbsp;{{$users[$i]->lastname}}</h5>
<p>{{$useradd[$i]->address_line_1}}&nbsp;{{$useradd[$i]->address_line_2}}&nbsp;{{$useradd[$i]->city}}&nbsp;{{$useradd[$i]->state}}</p>
{{ \Carbon\Carbon::parse($usertime[$i]->start_time)->format('g:i A') }}&nbsp;to&nbsp;{{ \Carbon\Carbon::parse($usertime[$i]->end_time)->format('g:i A') }}<br>
<p class="card-text">{{$usertime[$i]->weekdays}}</p>
<table border  class="card-text">
    <tr><th>description</th>
        

  @php
  $no=count($usercook[$usertime[$i]->id]);
  @endphp
  @for($j=0;$j<$no;$j++)
  <tr><td>{{$usercook[$usertime[$i]->id][$j]->description}}</td></tr>
  
  @endfor</table>
  <a href="#" class="btn btn-primary">book</a>
</div>
<div class="card-footer text-body-secondary">
  <a href="{{route('propindex.build', ['id' => $users[$i]->id, 'tid' => $usertime[$i]->id])}}">make proposal</a>
</div>
</div><br><br>
@endfor

@endsection