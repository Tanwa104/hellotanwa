@extends('layout.master')
@section('container')
    <div class="container-xxl bg-white p-0">
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container my-5 py-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-3 text-white animated slideInLeft">Karvae<br>Ghar ki seva</h1>
                        <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor
                            diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem
                            sit clita duo justo magna dolore erat amet</p>

                    </div>
                    <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                        <img class="img-fluid" src="img/hero.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Enter</h5>
                <h1 class="mb-5">The given details</h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">


                        
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form method="GET" action="{{route('udclean.build')}}">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                    
                                            <select name="apart_villa" class="form-select" id="place">
                                                
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
                                        <input type="text" name="bedno"  class="form-control" id="bedno"/>
                                        <label for="bedno">Bedroom number</label>
                                    </div>
                                </div>
                                <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="hallno"  class="form-control" id="hallno"/>
                                        <label for="hallno">Hall number</label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="kitchen"  class="form-control" id="kitchen"/>
                                        <label for="kitchen">Kitchen number</label>
                                    </div>
                                </div>
                        
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                
                                            <select name="typeclean" class="form-select"  id="typeclean">
                                            
                                                <option value="normal">Normal Day to Day cleaning</option>
                                                <option value="deep">deep cleaning</option> 
                                            </select>
                                
                                        <label for="typeclean">type of cleaning</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <!-- Contact End -->
