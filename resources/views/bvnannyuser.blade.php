@extends('layout.master')
@section('container')

<style>
  
    .card {
        margin-top: 30px; /* Adjusted margin */
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f0f0f0; /* Light gray */
        padding: 15px;
        font-weight: bold;
        text-align: center; /* Center header text */
    }

    .card-body {
        padding: 20px;
    }

    .info-row { /* Style for each info row */
        display: flex;
        align-items: center; /* Vertically align items */
        margin-bottom: 10px;
    }

    .info-label { /* Style for labels (name, city, time) */
        font-weight: bold;
        width: 120px; /* Set a fixed width for labels */
        margin-right: 10px;
    }

    .info-value { /* Style for values */
        flex-grow: 1; /* Allow values to take up remaining space */
    }


    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 12px; /* Increased padding */
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #eee; /* Lighter gray for table header */
        font-weight: bold;
    }

    .highlight-message {
        background-color: #ffc107; /* Amber/yellow */
        color: #fff;
        padding: 15px;
        text-align: center;
        margin-top: 20px;
        border-radius: 5px;
    }

    .card-footer {
        padding: 15px;
        background-color: #f0f0f0;
        text-align: right;
    }

    .btn-back {
        background-color: #007bff;
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
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            View the request
        </div>
        <div class="card-body">
            @php
            $no1=count($us)
            @endphp

            <div class="info-row">
                <div class="info-label">Name:</div>
                <div class="info-value">{{$itemadd->name}}</div>
            </div>
            <div class="info-row">
                <div class="info-label">City:</div>
                <div class="info-value">{{$city}}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Time:</div>
                <div class="info-value">
                    {{ \Carbon\Carbon::parse($us[$no1-1]->start_time)->format('g:i A') }}&nbsp;to&nbsp;{{ \Carbon\Carbon::parse($us[$no1-1]->end_time)->format('g:i A') }}
                    <br>
                    {{ str_replace(['[', ']', '"'], '', $us[$no1-1]->weekdays) }}
                    
                </div>
                <div class="info-label">jobtype:</div><div class="info-value">{{$us[$no1-1]->jobtype}}</div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Child Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i=0;$i<$no;$i++)
                    <tr>
                        <td>{{$items[$i]->childname}}</td>
                        <td>{{$items[$i]->childage}}</td>
                        <td>{{$items[$i]->childgender}}</td>
                    </tr>
                    @endfor
                </tbody>
            </table>

            <p class="highlight-message">
                Your request has been registered and you will get the proposals soon.<br>
                Go to view proposals to see proposals made.
            </p>
        </div>
        <div class="card-footer">
            <a href="{{route('user.build')}}" class="btn-back">Back</a>
        </div>
    </div>
</div>

@endsection