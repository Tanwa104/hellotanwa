@extends('layout.master')

<style>
    .rating-css div {
        color: #ffe400;
        font-size: 30px;
        font-family: sans-serif;
        font-weight: 800;
        text-align: center;
        text-transform: uppercase;
        padding: 20px 0;
    }

    .rating-css input {
        display: none;
    }

    .rating-css input + label {
        font-size: 60px;
        text-shadow: 1px 1px 0 #8f8420;
        cursor: pointer;
    }

    .rating-css input:checked + label ~ label {
        color: #b4afaf;
    }

    .rating-css label:active {
        transform: scale(0.8);
        transition: 0.3s ease;
    }
</style>

@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">See Bookings</h1>
    </div>
</div>

@if (\Session::has('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('msg') !!}</li>
        </ul>
    </div>
@endif

<div class="container">
    @foreach($items as $i => $item)  {{-- More concise loop --}}
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">{{ $item->name }} {{ $item->lastname }}</h5>
                        <p class="card-text"><strong>Role:</strong> {{ $role[$i] }}</p>
                        <p class="card-text">
                            <strong>Address:</strong> {{ $iadd[$i]->address_line_1 }} {{ $iadd[$i]->address_line_2 }} {{ $iadd[$i]->city }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text">
                            <strong>Start Time:</strong>
                            @php
                                $startTime = \Carbon\Carbon::parse($itime[$i]->start_time);
                                echo $startTime->format('h:i A');
                            @endphp
                        </p>
                        <p class="card-text"><strong>Weekdays:</strong> {{ implode(", ", $itime[$i]->weekdays) }}</p>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rateModal{{ $i }}">
                            Rate
                        </button>

                        <div class="modal fade" id="rateModal{{ $i }}" tabindex="-1" aria-labelledby="rateModalLabel{{ $i }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="rateModalLabel{{ $i }}">{{ $item->name }} {{ $item->lastname }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('rate.build', $ibook[$i]->id) }}" method="get">
                                        <div class="modal-body">
                                            <label>Rate in stars</label>
                                            <div class="rating-css">
                                                <div class="star-icon">
                                                    @for ($j = 1; $j <= 5; $j++)
                                                        <input type="radio" value="{{ $j }}" name="product_rating" id="rating{{ $j }}{{ $i }}" {{ $j == 1 ? 'checked' : '' }}>
                                                        <label for="rating{{ $j }}{{ $i }}" class="fa fa-star"></label>
                                                    @endfor
                                                </div>
                                            </div>
                                            <label for="review{{ $i }}" class="form-label">Enter review</label>
                                            <textarea name="review" id="review{{ $i }}" class="form-control"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection