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
                    <div id="response1" style="background-color: greenyellow"></div>
                                <form>
                                    <input type="email" name="ni1" id="ni1" class="form-control" placeholder="Enter email">
                                    <input type="button" value="genrate OTP" class="btn btn-primary" onclick="fetchDataHelp()">
                                    <br>
                            
                                </form><br><br><form method="POST" action="{{route('helpotp.seen')}}">
                                    @csrf
                                
                                    <input type="number" name="otp1" id="otp1" class="form-control" placeholder="Enter otp"/>
                                    <input type="submit" value="confirm" class="btn btn-primary"/>
                                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>
       function fetchDataHelp() {
            // preventDefault();
            const input = document.getElementById("ni1");
const inputValue = input.value;
            $.ajax({
                url: "{{ route('otphelp.build') }}",
                type: "GET",
                datatype: "json",
                data: {
                    email: inputValue,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                    $("#response1").text(response.message);
                },
                error: function(xhr) {
                    $("#response1").text("Error: " + xhr.statusText);
                }
            });
        }
    </script>
</div>
</div>
@endsection
