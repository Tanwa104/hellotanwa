@extends('layout.master')
@section('container')
    <div class="container-xxl bg-white p-0">
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container my-5 py-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-3 text-white animated slideInLeft">Karvae<br>Ghar ki seva</h1>
                        <p class="text-white animated slideInLeft mb-4 pb-2">Your everyday needs, expertly handled.
                            Home services, simplified. Connecting you with top-rated pros. Get things done, the easy way.
                            Trusted professionals, at your service.</p>
                       
                    </div>
                    <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                        <img class="img-fluid hero-image" src="img/hero.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Services</h5>
                <h1 class="mb-5">Available</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded overflow-hidden">
                        <form action="{{ route('fliter') }}" method="get">
                            <input type="hidden" name="role" value="Housecleaner">
                            <button type="submit" class="service-image-container">
                                <img class="img-fluid service-image" src="/img/gharclean.png" alt="House Cleaning">
                            </button>
                        </form>
                        <div class="p-4 text-center">
                            <h5 class="mb-3">Housecleaning</h5>
                            <p>Keep your home sparkling clean with our professional house cleaning services.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded overflow-hidden">
                         <form action="{{ route('fliter') }}" method="get">
                            <input type="hidden" name="role" value="childcare">
                            <button type="submit" class="service-image-container">
                                <img class="img-fluid service-image" src="/img/childnanny.png" alt="Childcare">
                            </button>
                        </form>
                        <div class="p-4 text-center">
                            <h5 class="mb-3">Childcare</h5>
                            <p>Trust our experienced childcare providers to care for your little ones.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded overflow-hidden">
                         <form action="{{ route('fliter') }}" method="get">
                            <input type="hidden" name="role" value="houseCook">
                            <button type="submit" class="service-image-container">
                                <img class="img-fluid service-image" src="/img/housecook.png" alt="Home Cook">
                            </button>
                        </form>
                        <div class="p-4 text-center">
                            <h5 class="mb-3">Home Cook</h5>
                            <p>Enjoy delicious, home-cooked meals prepared by our talented chefs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection