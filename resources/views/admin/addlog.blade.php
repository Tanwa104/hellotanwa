@extends('layout.master')

@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Enter credentials</h1>
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
                <img class="position-relative rounded w-100 h-100" src="/img/login.jpg" alt="Map Placeholder" style="min-height: 350px; object-fit: cover;">
                </div>
            
    
            <div class="col-md-6">
                <div id="response1" style="
                background-color: #e8f5e9; /* Light green background */
                color: #1b5e20; /* Dark green text */
                padding: 15px;
                border-radius: 8px;
                margin: 20px 0;
                font-family: 'Arial', sans-serif;
                font-size: 16px;
                text-align: center;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                border: 1px solid #a5d6a7; /* Light green border */
                display: none; /* Initially hide the message */
            "></div>
                            <form action="{{route('admin.seen')}}" method="GET">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
                                
                        
                            
                                <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter password"/>
                                <input type="submit" value="confirm" class="btn btn-primary"/>
                                </form>

            </div>

        </div>
    </div>
</div>
@endsection



