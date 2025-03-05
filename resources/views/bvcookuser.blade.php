@extends('layout.master')
@section('container')

<style>
    

    .card {
        margin-top: 50px; /* Add margin */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add card shadow */
        border: none; /* Remove default border */
    }

    .card-header {
        background-color: #f8f9fa; /* Light gray background */
        font-weight: bold;
        padding: 15px;
        border-bottom: 1px solid #dee2e6; /* Add border */
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #343a40; /* Darker text color */
    }

    .card-text {
        margin-bottom: 10px;
        color: #555; /* Slightly lighter text color */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    th {
        background-color: #f2f2f2; /* Light gray for header cells */
        font-weight: bold;
    }

    .highlight-message {
        background-color: orange;
        color: white;
        padding: 15px;
        border-radius: 5px;
        margin-top: 20px; /* Add margin */
    }

    .card-footer {
        padding: 15px;
        background-color: #f8f9fa;
        border-top: 1px solid #dee2e6;
        text-align: right; /* Align button to the right */
    }

    .btn-back { /* Style for the back button */
        background-color: #007bff; /* Blue button */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
    }
</style>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">View your request</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                </ol>
        </nav>
    </div>
</div>

<div class="container">  <div class="card">
        <div class="card-header">
            View the proposals made by the helpers
        </div>
        <div class="card-body">
            @php
            $no1=count($us)
            @endphp
            <h5 class="card-title">{{$itemadd->name}}</h5>
            <p class="card-text">{{$city}}</p>
            <p class="card-text">Time wanted: {{ \Carbon\Carbon::parse($us[$no1-1]->start_time)->format('g:i A') }}&nbsp;to&nbsp;{{ \Carbon\Carbon::parse($us[$no1-1]->end_time)->format('g:i A') }}</p>
            <p class="card-text">{{$us[$no1-1]->weekdays}}</p>
            <p class="card-text">{{$us[$no1-1]->jobtype}}</p>

            <p class="card-text">Type of occasion: {{$items[0]->ocassion}}</p>
            <p class="card-text">Number of people: {{$items[0]->peopleno}}</p>
            <p class="card-text">Type of cuisine: {{$items[0]->cusine}}</p>

            <table>
                <tr>
                    <th>Meal description</th>
                </tr>
                @for($i=0;$i<$no;$i++)
                <tr>
                    <td>{{$items[$i]->description}}</td>
                </tr>
                @endfor
            </table>

            <p class="card-text highlight-message">
                Your request has been registered and you will get the proposals soon.<br>
                Go to view proposals to see proposals made.
            </p>
        </div>
        <div class="card-footer">
            <a href="{{route('user.build')}}" class="btn-back">Back</a>
        </div>
    </div>
</div>  @endsection