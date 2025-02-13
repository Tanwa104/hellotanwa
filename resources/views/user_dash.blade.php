@extends('layout.master')
@section('container')
    <div class="container-xxl bg-white p-0">
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container my-5 py-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-3 text-white animated slideInLeft">Karvae<br>Ghar ki seva</h1>
                        <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        
                    </div>
                    <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                        <img class="img-fluid" src="img/hero.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

       

       


       


        


        

        <!-- Team Start -->
        <div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">services</h5>
                    <h1 class="mb-5">Available</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                {{-- <img class="img-fluid" src="img/team-1.jpg" alt=""> --}}
                                <form action="{{ route('fliter') }}" method="get">
                                    <input type="hidden" id="role" name="role" value="Housecleaner">
                                    <input type="image" class="img-fluid" src="/img/gharclean.png" alt="Submit"
                                     >
                            </div>
                            <h5 class="mb-0">Housecleaning</h5>
                            <small>Designation</small>
                            <div class="d-flex justify-content-center mt-3">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                {{-- <img class="img-fluid" src="img/team-2.jpg" alt=""> --}}
                                <form action="{{ route('fliter') }}" method="get">
                                    <input type="hidden" id="role" name="role" value="childcare">
                                    <input type="image" class="img-fluid" src="/img/childnanny.png" alt="Submit"
                                          >
                            </div>
                            <h5 class="mb-0">Childcare</h5>
                            <small>Designation</small>
                            <div class="d-flex justify-content-center mt-3">
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                {{-- <img class="img-fluid" src="img/team-3.jpg" alt=""> --}}
                                <form action="{{ route('fliter') }}" method="get">
                                    <input type="hidden" id="role" name="role" value="houseCook">
                                    <input type="image" class="img-fluid" src="/img/housecook.png" alt="Submit"
                                     >
                            </div>
                            <h5 class="mb-0">Homecook</h5>
                            <small>Designation</small>
                            <div class="d-flex justify-content-center mt-3">
                              
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Team End -->


       

        

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection
