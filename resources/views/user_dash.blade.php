@extends('layout.master')
@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Karvae Ghar ki Seva</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                
            </ol>
        </nav>
    </div>
</div>

    @if (session('message'))
    <div class="alert" style="background-color:green;color:white">{{ session('message') }}</div>
@endif
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
            
            <style>
                .service-item {
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }
            
                .service-item:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
                }
            
                .service-image-container {
                    display: block;
                    width: 100%;
                    overflow: hidden;
                    border: none;
                    background: none;
                    padding: 0;
                }
            
                .service-image {
                    width: 100%;
                    height: auto;
                    transition: transform 0.3s ease;
                }
            
                .service-image-container:hover .service-image {
                    transform: scale(1.1);
                }
            </style>
        </div>
    </div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    
@endsection