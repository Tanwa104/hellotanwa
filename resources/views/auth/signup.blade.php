@extends('layout.master')
@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Regiter yourself in application</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                
            </ol>
        </nav>
    </div>
</div>

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
                    <img class="position-relative rounded w-100 h-100" src="/img/register.jpg" alt="Map Placeholder" style="min-height: 350px; object-fit: cover;">
                
                </div>
                <div class="col-md-6">
                    <form method="POST" action="{{ route('signup.build') }}">
                        @csrf
                        @method('POST')
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                            <input type="text" class="form-control" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">LastName</span>
                            <input type="text" class="form-control" name="lastname" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Email Address</span>
                            <input type="text" class="form-control" name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$valmail}}">
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
                            <input type="text" class="form-control" name="phone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                          </div>
                                          
                                            <input type="submit" value="submit" class="btn btn-dark"/>
                                            
                                            </div>
                                        
                                  </form>

                </div>

            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection
