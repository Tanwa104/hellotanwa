@extends('layout.master')
@section('container')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">See request</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                
            </ol>
        </nav>
    </div>
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-right:0pt;margin-left:80%;">
            Add Address
          </button>
          <br><br>
          <form method="get" action="{{route('makeprop.fill',[$cid])}}">
        
            @if (\Session::has('msg'))1
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('msg') !!}</li>
                    </ul>
                </div>
            @endif
                <div class="shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                <div class="text-center">
                <label>name</label>
                <p>{{$items->name}}&nbsp;{{$items->lastname}}</p><br><br>
        
                <label>role</label>
                <p>
        @foreach($items->helpers as $help){{$help->role}}@endforeach</p><br><br>
        <label>Address</label>
        <p>
            @if($items->address==null)
            <p style="background-color:orange;color:white"> please enter the address</p>
            @endif
        @foreach($items->address as $add){{$add->address_line_1}}&nbsp;{{$add->address_line_2}}&nbsp;{{$add->city}}&nbsp;{{$add->state}}&nbsp;{{$add->country}}@endforeach</p><br><br>
                <label>Enter the price for the made request</label><br>
                <input type="text" name="price" id="price" required/><br><br>
                <input type="submit" value="submit"/>
               </div>
               </div>
            </form>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{route('add.store')}}">
                 
                <div class="modal-body">
                  @csrf
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="address1" placeholder="name">
                    <label for="floatingInput">Address line 1</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="address2" placeholder="name">
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
                      <input type="text" class="form-control" id="floatingInput" name="country" placeholder="name">
                      <label for="floatingInput">Country</label>
                                </div>
                                <div class="form-floating mb-3">
                                  <input type="text" class="form-control" id="floatingInput" name="zip" placeholder="name">
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
        <div>
          <div>
          
          </div>
    </div>
</div>



@endsection