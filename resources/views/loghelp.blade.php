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

                        @if (\Session::has('msg'))
                        <div class="alert alert-info">
                            <ul>
                                <li>{!! \Session::get('msg') !!}</li>
                            </ul>
                        </div>
                    @endif
                    @if (\Session::has('msg1'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{!! \Session::get('msg1') !!}</li>
                        </ul>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            request again
                          </button>
                    </div>
                @endif
                @if (\Session::has('msg2'))
                <div class="alert alert-info">
                    <ul>
                        <li>{!! \Session::get('msg2') !!}</li>
                    </ul>
                </div>
            @endif
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
                    $("#response1").text(response.message).css({'display':'block'});
                },
                error: function(xhr) {
                    $("#response1").text("Error: " + xhr.statusText).css({'display':'block'});
                }
            });
        }
    </script>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Request again</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('request.new')}}" method="GET">
            <input type="text" class="form-input" name="email" placeholder="enter email">
            <input type="submit" value="submit" class="btn btn-primary">
          </form>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
@endsection
