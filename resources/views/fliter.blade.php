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


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">please</h5>
                    <h1 class="mb-5">Enter the given details</h1>
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
                            <div class="row">
                            <label for="select1">Select Address</label>
                            <div class="col-8">
                                <div class="form-floating">
                                <form method="POST" action="{{ route('cust.store') }}">
                                    @csrf
                                    <select name="dl1" class="form-select" id="select1">
                                    <option>select the address and click on confirm button </option>
                                
                                        @foreach ($itemadd as $item)
                                            
                                            @if ($item != null)
                                                <option value="{{ $item->id }}" {{ $item->id == $id   ? 'selected' : '' }}>
                                                    {{ $item->address_line_1 }}&nbsp;{{ $item->address_line_2 }}&nbsp;{{ $item->city }}</option>
                                            @endif
                                        @endforeach
                                       
                                    </select>
                                    
                                </div>
                                    <input type="submit" value="confirm">
                                </form>
                            </div>
                            
 <button  data-bs-toggle="modal" class="btn btn-primary col-4" data-bs-target="#exampleModal"
     type="button">add new Address</button>
  


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('add.store') }}">

                <div class="modal-body">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="address1"
                            placeholder="name">
                        <label for="floatingInput">Address line 1</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="address2"
                            placeholder="name">
                        <label for="floatingInput">Address line 2</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="city" placeholder="name">
                        <label for="floatingInput">city</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="state" placeholder="name">
                        <label for="floatingInput">State</label>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="country"
                                placeholder="name">
                            <label for="floatingInput">Country</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="zip"
                                placeholder="name">
                            <label for="floatingInput">Zipcode</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save Changes">
                </div>
            </form>
        </div>
    </div>
</div>
                            </div>
                            <br><br>
                            <form method="GET" action="{{route('fliter.build')}}">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            {{-- <input type="text" class="form-control" id="name" placeholder="Your Name"> --}}
                                            {{-- <label for="name">Your Name</label> --}}
                                            @foreach($items as $item)
                                            
                                            <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}"/>
                                            <label for="name" class="form-label">Name </label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            @foreach($items as $item)
                                           
                                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{$item->lastname}}"/>
                                            <label for="lastname" class="form-label">lastname </label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            
                                           
                                            <span id="inputEmail4" class="form-control">
                                                <select name="bhours">
                                                  
                                                  <option value="1">1</option>
                                                  <option value="2">2</option>
                                                  <option value="3">3</option>
                                                  <option value="4">4</option>
                                                  <option value="5">5</option>
                                                  <option value="6">6</option>
                                                  <option value="7">7</option>
                                                  <option value="8">8</option>
                                                  <option value="9">9</option>
                                                  <option value="10">10</option>
                                                  <option value="11">11</option>
                                                  <option value="12">12</option>
                                                 </select>
                                                 <select name="bmin" >
                                                  <option value=":00">:00</option> 
                                                  <option value=":15">:15</option>
                                                  <option value=":30">:30</option>
                                                  <option value=":45">:45</option>
                                                 </select>
                                                 <select name="bampm">
                                                  <option value="am">am</option> 
                                                  <option value="pm">pm</option>
                                                  </select>
                                            </span>
                                            <label for="inputEmail4" class="form-label">Start time </label>
                                        
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                           <span id="inputEmail5" class="form-control">
                                            <select name="ahours">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                               </select>
                                               <select name="amins">
                                                <option value=":00">:00</option> 
                                                <option value=":15">:15</option>
                                                <option value=":30">:30</option>
                                                <option value=":45">:45</option>
                                               </select>
                                               <select name="aampm">
                                                <option value="am">am</option> 
                                                <option value="pm">pm</option>
                                               </select>
                               

                                           </span>
                                            <label for="inputEmail5" class="form-label">End time </label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-12">
                                        <div class="form-floating">
                                          <div  class="card">
                                            <label for="message" class="form-label">number of days in week</label>
                                        <div class="form-control" id="message">
                                        
                                                <input type="checkbox" class="form-check-input" id="btn-check-4" autocomplete="off" name="weekdays[]" value="monday">
                                    <label class="form-check-label" for="btn-check-4">Monday</label>&nbsp;
                                    <input type="checkbox" class="form-check-input" id="btn-check-5" autocomplete="off" name="weekdays[]" value="tuesday">
                                    <label class="form-check-label" for="btn-check-5">Tuesday</label>&nbsp;
                                    <input type="checkbox" class="form-check-input" id="btn-check-6" autocomplete="off" name="weekdays[]" value="wednesday">
                                    <label class="form-check-label" for="btn-check-6">Wednesday</label>&nbsp;
                                    <input type="checkbox" class="form-check-input" id="btn-check-7" autocomplete="off" name="weekdays[]" value="thursday">
                                    <label class="form-check-label" for="btn-check-7">Thursday</label>&nbsp;
                                    <input type="checkbox" class="form-check-input" id="btn-check-8" autocomplete="off" name="weekdays[]" value="friday">
                                    <label class="form-check-label" for="btn-check-8">Friday</label><br>
                                    <input type="checkbox" class="form-check-input" id="btn-check-9" autocomplete="off" name="weekdays[]" value="saturday">
                                    <label class="form-check-label" for="btn-check-9">Saturday</label>&nbsp;
                                    <input type="checkbox" class="form-check-input" id="btn-check-10" autocomplete="off" name="weekdays[]" value="sunday">
                                    <label class="form-check-label" for="btn-check-10">Sunday</label>&nbsp;
                                        </div>
                                            
                                        </div>
                                        </div>
                                    </div><br><br><br>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            
                                           <div class="card">
                                            <label for="service" class="form-label">Service Preference </label>
                                            
                                            <span id="service" class="form-control">
                                                <input type="radio" class="btn-check" name="options" id="singletime" autocomplete="off" value="singletime">
                                                <label class="btn btn-outline-primary" for="singletime">Singletime</label>&nbsp;&nbsp;
                                                
                                                or&nbsp;&nbsp;
                                                
                                                <input type="radio" class="btn-check" name="options" id="fulltime" autocomplete="off" value="fulltime">
                                                <label class="btn btn-outline-primary" for="fulltime">Fulltime</label>
                                             </span></div></div>
                                

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
        <!-- Contact End -->

@endsection