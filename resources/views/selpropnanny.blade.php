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
$no=count($usernanny);
@endphp
@for($i=0;$i<$n;$i++)      
<div class="card text-center">
  <div class="card mb-4 shadow-sm">
    <div class="card-header bg-warning text-white text-center">
        Find Assistance
    </div>
    <div class="card-body">
        <h5 class="card-title text-center mb-3">
            {{ $users[$i]->name }} {{ $users[$i]->lastname }}
        </h5>
        <div class="mb-3 text-center">
            <p class="card-text">
                {{ $useradd[$i]->address_line_1 }}, {{ $useradd[$i]->address_line_2 }}, {{ $useradd[$i]->city }}, {{ $useradd[$i]->state }}
            </p>
            <p class="card-text">
                {{ \Carbon\Carbon::parse($usertime[$i]->start_time)->format('g:i A') }} to {{ \Carbon\Carbon::parse($usertime[$i]->end_time)->format('g:i A') }}
            </p>
            <p class="card-text">
                Days: {{ str_replace(['[', ']', '"'], '', $usertime[$i]->weekdays) }}
            </p>
        </div>

        <div class="mb-3">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Child Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = count($usernanny[$usertime[$i]->id]);
                    @endphp
                    @for ($j = 0; $j < $no; $j++)
                        <tr>
                            <td>{{ $usernanny[$usertime[$i]->id][$j]->childname }}</td>
                            <td>{{ $usernanny[$usertime[$i]->id][$j]->childage }}</td>
                            <td>{{ $usernanny[$usertime[$i]->id][$j]->childgender }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <div class="d-grid">
            @php
                $num = $usertime[$i]->id;
            @endphp
         <div class="text-center">   <a href="{{ route('propsee.build', [$num]) }}" class="btn btn-primary col-4">View Proposals</a>
         </div>   </div>
    </div>
</div><br><br>
@endfor



@endsection