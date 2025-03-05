@extends('layout.master')
@section('container')

<style>
   

    .card {
        margin-top: 30px;
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f0f0f0;
        padding: 15px;
        font-weight: bold;
        text-align: center;
    }

    .card-body {
        padding: 20px;
    }

    .info-row {
        display: flex;
        align-items: flex-start; /* Align to top of the row */
        margin-bottom: 10px;
    }

    .info-label {
        font-weight: bold;
        width: 150px; /* Increased width for labels */
        margin-right: 10px;
        text-align: left; /* Align label text to the left */
    }

    .info-value {
        flex-grow: 1;
    }

    .multi-value { /* Style for multiple values (hometype, etc.) */
        display: block; /* Make each value appear on a new line */
        margin-bottom: 5px; /* Add some spacing between values */
    }

    .highlight-message {
        background-color: #ffc107;
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
    @foreach ($items as $user)
    <div class="card">
        <div class="card-body">
            @php
            $no1=count($us)
            @endphp

            <div class="info-row">
                <div class="info-label">Name:</div>
                <div class="info-value">{{$itemadd->name}}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Address:</div>
                <div class="info-value">{{$city}}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Time:</div>
                <div class="info-value">
                    {{ \Carbon\Carbon::parse($us[$no1-1]->start_time)->format('g:i A') }}&nbsp;to&nbsp;{{ \Carbon\Carbon::parse($us[$no1-1]->end_time)->format('g:i A') }}
                    <br>
                    {{$us[$no1-1]->weekdays}}
                </div>
                <div class="info-label">jobtype:</div>{{$us[$no1-1]->jobtype}}
            </div>

            <div class="info-row">

                <div class="info-label">Type of House:</div>
                <div class="info-value">
                    @foreach($user->cleanerreqs as $add)
                        <span class="multi-value">{{$add->hometype}}</span>
                    @endforeach
                </div>
            </div>
            <div class="info-row">
                <div class="info-label">Number of Bedrooms:</div>
                <div class="info-value">
                    @foreach($user->cleanerreqs as $add)
                        <span class="multi-value">{{$add->bedroomno}}</span>
                    @endforeach
                </div>
            </div>
            <div class="info-row">
                <div class="info-label">Number of Halls:</div>
                <div class="info-value">
                    @foreach($user->cleanerreqs as $add)
                        <span class="multi-value">{{$add->hallno}}</span>
                    @endforeach
                </div>
            </div>
            <div class="info-row">
                <div class="info-label">Number of Kitchens:</div>
                <div class="info-value">
                    @foreach($user->cleanerreqs as $add)
                        <span class="multi-value">{{$add->kichenno}}</span>
                    @endforeach
                </div>
            </div>
            <div class="info-row">
                <div class="info-label">Type of Cleaning:</div>
                <div class="info-value">
                    @foreach($user->cleanerreqs as $add)
                        <span class="multi-value">{{$add->cleaningtype}}</span>
                    @endforeach
                </div>
            </div>

            <p class="highlight-message">
                Your request has been registered and you will get the proposals soon.<br>
                Go to view proposals to see proposals made.
            </p>
        </div>
        <div class="card-footer">
            <a href="{{route('user.build')}}" class="btn-back">Back</a>
        </div>
    </div>
    @endforeach
</div>

@endsection