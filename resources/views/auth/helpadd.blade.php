@extends('layout.master')
@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Helper Email Verification</h1>
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
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
                <div class="col-md-6">
                    <form method="POST" action="{{ route('helpadd.build') }}">
                        @csrf
                        @method('POST')
                        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label>roles</label><br>
            <select name="roles" class="form-select">
                <option>select</option>
                <option value="Housecleaner">HouseCleaner</option>
                <option value="childcare">ChildCare</option>
                <option value="houseCook">houseCook</option>
            </select>
            <br>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="city" placeholder="name">
                            <label for="floatingInput">City</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="exp" placeholder="name">
                            <label for="floatingInput">Experience(in yrs)</label>
                          </div>
                         
                          <input type="submit" value="submit" class="btn btn-dark"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection