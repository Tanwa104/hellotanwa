@extends('layout.master')
@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Edit Address</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
               
            </ol>
        </nav>
    </div>
</div>

<div class="container">  <div class="row justify-content-center"> <div class="col-lg-8"> <form method="POST" action="{{route('edhelp.update',[$pid])}}" class="mb-5">
                @csrf
                @method("PUT")

                <div class="mb-3">
                    <label for="address1" class="form-label">Address Line 1</label>
                    <input type="text" class="form-control" id="address1" name="address1" value="{{$data->address_line_1}}" required>
                </div>
                <div class="mb-3">
                    <label for="address2" class="form-label">Address Line 2</label>
                    <input type="text" class="form-control" id="address2" name="address2" value="{{$data->address_line_2}}">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Area</label>
                    <input type="text" class="form-control" id="area" name="area" value="{{$data->area}}" required>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{$data->city}}" required>
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control" id="state" name="state" value="{{$data->state}}" required>
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" value="{{$data->country}}" required>
                </div>
                <div class="mb-3">
                    <label for="zip" class="form-label">Zip Code</label>
                    <input type="text" class="form-control" id="zip" name="zip" value="{{$data->pincode}}" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Update Address</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection