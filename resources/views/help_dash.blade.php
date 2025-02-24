@extends('layout.master')
@section('container')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Kare Ghar ki Seva</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                
            </ol>
        </nav>
    </div>
</div>
    
        
              <!-- Team Start -->
    <div class="container-xxl pt-5 pb-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">things to do</h5>
                
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="rounded-circle overflow-hidden m-4">
                            {{-- <img class="img-fluid" src="img/team-1.jpg" alt=""> --}}
                            <form action="{{ route('cleanhelper.build') }}" method="get">
                        
                                <input type="image" class="img-fluid" src="/img/findnewclient.jpg" alt="Submit">
                            </form>
                            </div>
                    
                        <h5 class="mb-0">Find new Clients</h5>
                        <small>Designation</small>
                        <div class="d-flex justify-content-center mt-3">

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="rounded-circle overflow-hidden m-4">
                            {{-- <img class="img-fluid" src="img/team-2.jpg" alt=""> --}}
                            <form action="{{route('bookhelp.fill')}}" method="get">
                                
                                <input type="image" class="img-fluid" src="/img/accept.jpg" alt="Submit">
                            </form>
                            </div>
                        <h5 class="mb-0">Accept clients</h5>
                        <small>Designation</small>
                        <div class="d-flex justify-content-center mt-3">

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="rounded-circle overflow-hidden m-4">
                            {{-- <img class="img-fluid" src="img/team-3.jpg" alt=""> --}}
                            <form action="{{route('rate.see')}}" method="get">
                                <input type="hidden" id="role3" name="role" value="houseCook">
                                <input type="image" class="img-fluid" src="/img/reviews.jpg" alt="Submit">
                            </form>
                            </div>
                        <h5 class="mb-0">Veiw ratings</h5>
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

  
@endsection
