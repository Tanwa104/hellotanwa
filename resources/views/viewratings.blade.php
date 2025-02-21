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
        border: none; /* Remove default border */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        transition: transform 0.2s; /* Add a hover effect */
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-body {
        padding: 2rem; /* Increase padding */
    }

    .card-title {
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .card-text {
        margin-bottom: 0.5rem; /* Reduce spacing between text elements */
    }
    .rating{
        display: flex;
        align-items: center;
    }
    .rating p{
        margin-bottom: 0;
        margin-right: 10px;
    }

</style>

<div class="container">
    @php
        $n = count($items);
    @endphp

    @for($i = 0; $i < $n; $i++)
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">{{$itemuser[$i]->name}} {{$itemuser[$i]->lastname}}</h5>
                        <p class="card-text">
                            <strong>Address:</strong> {{$itemadd[$i]->address_line_1}} {{$itemadd[$i]->address_line_2}} {{$itemadd[$i]->city}}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text">
                            <strong>Review:</strong> {{$items[$i]->comments}}
                        </p>
                        <div class="rating">
                        <p class="card-text"><strong>Star Rating:</strong></p>
                            @php
                                $nStars = $items[$i]->star_rating;
                            @endphp
                            <div>
                            @for($j = 1; $j <= $nStars; $j++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for($j = $nStars + 1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>

@endsection