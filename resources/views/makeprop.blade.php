@extends('layout.master')
@section('container')

<style>


    .container-content {  /* Container for the main content */
        margin-top: 30px;
        padding: 20px;
    }

    .image-section {
        text-align: center; /* Center the image */
    }

    .image-section img {
        max-width: 100%; /* Make image responsive */
        height: auto;
        border-radius: 8px; /* Add rounded corners to image */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    }

    .info-section {
        padding: 20px;
    }

    .info-label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .info-value {
        margin-bottom: 10px;
    }

    .address-message {
        background-color: #ffc107; /* Amber/Yellow for message */
        color: #fff;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px; /* Add margin below the message */
        text-align: center; /* Center the message */

    }
    .form-section{
        border:1px solid gray;
        padding:20px;
        border-radius:8px;
    }

    .modal-title {
        font-weight: bold;
    }

    .modal-body .form-floating {
        margin-bottom: 15px;
    }

    .modal-footer .btn {
        margin-right: 10px; /* Add space between buttons */
    }
</style>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">See request</h1>
    </div>
</div>

<div class="container container-content">
    <div class="row">
        <div class="col-md-6 image-section">
            <img src="/img/cleanghar.png" alt="Cleaning Image">
        </div>
        <div class="col-md-6 info-section">
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Address
            </button>
            <br><br>

            <form method="get" action="{{route('makeprop.fill',[$cid])}}" class="form-section">
                @if (\Session::has('msg'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('msg') !!}</li>
                        </ul>
                    </div>
                @endif

                <div class="text-center">
                    <div class="info-label">Name:</div>
                    <div class="info-value">{{$items->name}}&nbsp;{{$items->lastname}}</div>

                    <div class="info-label">Role:</div>
                    <div class="info-value">
                        @foreach($items->helpers as $help)
                            {{$help->role}}
                        @endforeach
                    </div>

                    <div class="info-label">Address:</div>
                    <div class="info-value">
                        @if($items->address->isEmpty())  {{-- Check if address is empty --}}
                            <div class="address-message">Please enter the address</div>
                        @else
                            @foreach($items->address as $add)
                                {{$add->address_line_1}}<br>
                                {{$add->address_line_2}}<br>
                                {{$add->city}}<br>
                                {{$add->state}}<br>
                                {{$add->country}}<br>
                                {{$add->zip}}  {{-- Include the zip code --}}
                            @endforeach
                        @endif
                    </div>

                    <div class="info-label">Enter the price for the made request:</div>
                    <div class="info-value">
                        <input type="text" name="price" id="price" required/>
                    </div>
                    <br>
                    <input type="submit" value="Submit" class="btn btn-primary"/>
                </div>
            </form>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Address</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{route('add.store')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="address1" placeholder="Address Line 1" required>
                                    <label for="floatingInput">Address Line 1</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="address2" placeholder="Address Line 2">
                                    <label for="floatingInput">Address Line 2</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="city" placeholder="City" required>
                                    <label for="floatingInput">City</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="state" placeholder="State" required>
                                    <label for="floatingInput">State</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="country" placeholder="Country" required>
                                    <label for="floatingInput">Country</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="zip" placeholder="Zip Code" required>
                                    <label for="floatingInput">Zip Code</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Save Changes">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection