@extends('layout.master')

@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">See Ratings</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
            </ol>
        </nav>
    </div>
</div>

<style>
    .checked {
        color: orange;
    }

    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-body {
        padding: 2rem;
    }

    .card-title {
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .card-text {
        margin-bottom: 0.5rem;
    }
    
    .rating {
        display: flex;
        align-items: center;
    }

    .rating p {
        margin-bottom: 0;
        margin-right: 10px;
    }
</style>

<div class="container">
    @php
        $n = isset($bookings) ? count($bookings) : 0; 
        $ratingsMap = [];

        // Convert rates array into a map where the key is booking_id
        if(isset($rates)){
            foreach($rates as $rate){
                $ratingsMap[$rate->first()->booking_id ?? null] = $rate;
            }
        }
    @endphp

@foreach($bookings as $booking)
@php
    $rating = $booking->ratings->first(); // Get the first rating if available
@endphp

<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-title">
                    {{ $booking->user->name ?? 'Unknown' }} 
                    {{ $booking->user->lastname ?? '' }}
                </h5>
                <p class="card-text">
                    <strong>Address:</strong> 
                    {{ $booking->userAddress->address_line_1 ?? '' }} 
                    {{ $booking->userAddress->address_line_2 ?? '' }} 
                    {{ $booking->userAddress->city ?? '' }}
                </p>
            </div>

            <div class="col-md-6">
                @if($rating)
                    <p class="card-text"><strong>Review:</strong> {{ $rating->comments }}</p>
                    <div class="rating">
                        <p class="card-text"><strong>Star Rating:</strong></p>
                        @php
                            $nStars = $rating->star_rating;
                        @endphp
                        <div>
                            @for($k = 1; $k <= $nStars; $k++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for($k = $nStars + 1; $k <= 5; $k++)
                                <i class="fa fa-star"></i>
                            @endfor
                        </div>
                    </div>
                @else
                    <p class="card-text"><strong>Review:</strong> No review available</p>
                    <p class="card-text"><strong>Star Rating:</strong> No rating</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach

</div>

@endsection
