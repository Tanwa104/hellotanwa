@extends('layout.master')
@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">See Bookings</h1>
    </div>
</div>

<div class="container">
    @php
        $n = count($items);
    @endphp

    @for($i = 0; $i < $n; $i++)
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">{{$items[$i]->name}} {{$items[$i]->lastname}}</h5>
                        <p class="card-text"><strong>Role:</strong> {{$role[$i]}}</p>
                        <p class="card-text">
                            <strong>Address:</strong> {{$iadd[$i]->address_line_1}} {{$iadd[$i]->address_line_2}} {{$iadd[$i]->city}}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text">
                            <strong>Start Time:</strong>
                            @php
                                $startTime = \Carbon\Carbon::parse($itime[$i]->start_time); // Use Carbon for time formatting
                                echo $startTime->format('h:i A'); // Format as 12-hour with AM/PM
                            @endphp
                        </p>
                        @php
                            $arr = $itime[$i]->weekdays;
                            $week = implode(", ", $arr);
                        @endphp
                        <p class="card-text"><strong>Weekdays:</strong> {{$week}}</p>
                        <a href="">rate</a>
                    </div>
                </div>
            </div>
        </div>

    @endfor
</div>

@endsection