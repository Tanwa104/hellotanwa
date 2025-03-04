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
                        <img class="img-fluid" src="img/hero.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="/img/gharclean.png" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="/img/cooker.jpg" style="margin-top: 25%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="/img/login.jpg" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="/img/childlook.jpg" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                    <h1 class="mb-4" style="font-weight: bold;">Welcome to Gruhseva</h1>
                    <p class="mb-4" style="font-size: 1.1rem; line-height: 1.8;">Your trusted platform for finding reliable and skilled service providers for your home needs. Whether you need a professional house cleaner, a caring nanny, or an experienced cook, we connect you with the right experts to make your life easier.</p>
                    <p style="font-size: 1.1rem; line-height: 1.8;">Our mission is to provide hassle-free and efficient home services, ensuring safety, quality, and convenience at your fingertips. With Gruhseva, booking a trusted service provider is just a few clicks away!.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Features</h5>
                <h2 class="mb-4" style="font-weight: bold;">Our Key Features</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3" style="background-color: #fff8e1; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; height: 100%;">
                        <div class="p-4" style="background-color:#ffe0b2; flex-grow: 1;">
                            <h5 style="font-weight: bold; color:black;">Bidding Request</h5>
                            <p style="font-size: 1rem; line-height: 1.6; color:black;">Helpers bid on user requests, allowing users to select the most suitable offer.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded pt-3" style="background-color: #fff8e1; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; height: 100%;">
                        <div class="p-4" style="background-color:#ffe0b2; flex-grow: 1;">
                            <h5 style="font-weight: bold; color:black;">Ratings Feature</h5>
                            <p style="font-size: 1rem; line-height: 1.6; color:black;">Users rate helpers based on their work, ensuring quality and trust.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3" style="background-color: #fff8e1; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; height: 100%;">
                        <div class="p-4" style="background-color: #ffe0b2; flex-grow: 1;">
                            <h5 style="font-weight: bold; color:black;">Easy Connect</h5>
                            <p style="font-size: 1rem; line-height: 1.6; color:black;">Seamlessly connect with and book helpers with just a few clicks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item rounded pt-3" style="background-color: #fff8e1; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; height: 100%;">
                        <div class="p-4" style="background-color: #ffe0b2; flex-grow: 1;">
                            <h5 style="font-weight: bold; color:black;">24/7 Booking</h5>
                            <p style="font-size: 1rem; line-height: 1.6; color:black;">Book services anytime, ensuring flexibility and convenience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection