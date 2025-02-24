@extends('layout.master')
@section('container')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Enter the details given</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                
            </ol>
        </nav>
    </div>
</div>

    <div class="container-xxl py-5">
        <div class="container">
           
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">



                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <img class="position-relative rounded w-100 h-100" src="img/gharsaf.jpg" alt="Map Placeholder" style="min-height: 350px; object-fit: cover;">
                    </div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form method="GET" action="{{ route('udclean.build') }}">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">

                                        <select name="apart_villa" class="form-select" id="place">
                                                <option>Select</option>
                                            <option value="apartment">Apartment</option>
                                            <option value="tenament">Tenament</option>
                                            <option value="duplex">Duplex</option>
                                            <option value="villa">Villa</option>
                                            <option value="penthouse">Penthouse</option>
                                        </select>
                                        <label for="place">type of place </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="bedno" class="form-control" id="bedno" />
                                        <label for="bedno">Bedroom number</label>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="hallno" class="form-control" id="hallno" />
                                            <label for="hallno">Hall number</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="kitchen" class="form-control" id="kitchen" />
                                            <label for="kitchen">Kitchen number</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-floating">

                                        <select name="typeclean" class="form-select" id="typeclean">
                                                <option>Select</option>
                                            <option value="normal">Normal Day to Day cleaning</option>
                                            <option value="deep">deep cleaning</option>
                                        </select>

                                        <label for="typeclean">type of cleaning</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
  