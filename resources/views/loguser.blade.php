@extends('layout.master')
@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">User Email Verification</h1>
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
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <img class="position-relative rounded w-100 h-100" src="/img/login.jpg" alt="Map Placeholder" style="min-height: 350px; object-fit: cover;">
                        </div>
                </div>
                <div class="col-md-6">
                    <div id="response" style="background-color: greenyellow"></div>
                                <form>
                    <input type="email" name="ni" id="ni"class="form-control" placeholder="Enter Email"><br>
                                    <input type="button" value="genrate OTP" class="btn btn-primary" onclick="fetchData()">
                                    

                                </form><br><br><br><form method="POST" action="{{route('register.build')}}">
                                    @csrf
                                    
                                    <input type="number" name="otp" id="otp" class="form-control" placeholder="enter otp"/><br>
                                    <input type="submit" value="confirm" class="btn btn-primary"/>
                                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>
        function fetchData() {
            // preventDefault();
            const input = document.getElementById("ni");
const inputValue = input.value;
            $.ajax({
                url: "{{ route('getotp.build') }}",
                type: "GET",
                datatype: "json",
                data: {
                    email: inputValue,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                    $("#response").text(response.message);
                },
                error: function(xhr) {
                    $("#response").text("Error: " + xhr.statusText);
                }
            });
        }
    </script>
</div>
</div>
@endsection
