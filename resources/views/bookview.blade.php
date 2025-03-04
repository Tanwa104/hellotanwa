@extends('layout.master')

@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Your Bookings</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
            </ol>
        </nav>
    </div>
</div>

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

    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .card-subtitle {
        font-size: 1rem;
        color: #6c757d;
        margin-bottom: 10px;
    }

    .modal-header {
        background-color: #f0f0f0;
        border-bottom: 1px solid #ddd;
    }

    .modal-footer {
        border-top: 1px solid #ddd;
    }
</style>

@if (\Session::has('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('msg') !!}</li>
        </ul>
    </div>
@endif

<div class="container">
    @if ($bookings->isEmpty())
        <p>No bookings found for this user.</p>
    @else
        @foreach($bookings as $i => $booking)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> {{ $booking->user->name }}&nbsp;{{ $booking->user->lastname }}</h5>
                    @if ($booking->helper_id)
                        @php
                            $helper = \App\Models\Helper::with('user')->find($booking->helper_id);
                            $helperName = $helper->user->name . " " . $helper->user->lastname ?? 'No Helper Assigned';
                        @endphp
                        <h2 class="card-subtitle mb-2 text-muted">Helper: {{ $helperName }}</h2>
                    @else
                        <h6 class="card-subtitle mb-2 text-muted">Helper: No Helper Assigned</h6>
                    @endif
                    <p>Start Time: {{ \Carbon\Carbon::parse($booking->timeline->start_time)->format('g:i A') }}</p>
                    <p>End Time: {{ \Carbon\Carbon::parse($booking->timeline->end_time)->format('g:i A') }}</p>
                    @if ($booking->userAddress)
                        <p>Address: {{ $booking->userAddress->address_line_1 }}, {{ $booking->userAddress->city }}</p>
                    @else
                        <p>Address: No address provided.</p>
                    @endif

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rateModal{{ $i }}">
                        Rate
                    </button>

                    <div class="modal fade" id="rateModal{{ $i }}" tabindex="-1" aria-labelledby="rateModalLabel{{ $i }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="rateModalLabel{{ $i }}">{{ $booking->user->name }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('rate.build', $booking->id) }}" method="get">
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
        @endforeach
    @endif
</div>
@endsection