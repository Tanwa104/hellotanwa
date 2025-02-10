@extends('layouts.user_type.auth')

@section('content')

 
   <div class="row">        
    <div class="col-7">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-6">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Sales</p>
                  <h5 class="font-weight-bolder mb-0">
                    <form method="POST" action="{{ route('cust.store') }}">
                        @csrf
                        <select name="dl1">
                            <option value="0">select address</option>
                    
                            @foreach ($items as $item)
                                
                                @if ($item != null)
                                    <option value="{{ $item->id }}" {{ $item->id == $id   ? 'selected' : '' }}>
                                        {{ $item->address_line_1 }}&nbsp;{{ $item->address_line_2 }}&nbsp;{{ $item->city }}</option>
                                @endif
                            @endforeach
                    
                        </select>
                        <input type="submit" value="confirm">
                    </form>
            
                  </h5>
                </div>
              </div>
            </div>
          </div></div>
    </div>
    <div class="col-2">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-1">
                <div class="numbers">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    style="margin-right:0pt;margin-left:90%;">
                    Add Address
                </button>  
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
   </div>

    </div>
    <br><br><br>
    <div class="col-xl-3">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
             
                <div style="margin-left:45%;">
                    <form action="{{ route('fliter') }}" method="get">
                        <input type="hidden" id="role" name="role" value="Housecleaner">
                        <input type="image" src="/img/cleaning.png" alt="Submit"
                            width="48" height="48" >
                    </form>house clean<br>
                    <form action="{{ route('fliter') }}" method="get">
                        <input type="hidden" id="role" name="role" value="childcare">
                         <input type="image" src="/img/nanny.png" alt="Submit"
                            width="48" height="48">
                    </form>childcare<br>
                    <form action="{{ route('fliter') }}" method="get">
                        <input type="hidden" id="role" name="role" value="houseCook">
                        <input type="image" src="/img/cook.png" alt="Submit"
                            width="48" height="48">
                    </form>cook
                </div>
                  
              </div>
            </div>
            
         
            </div>
          </div>
        </div>
        <div></div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Address</h1>
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
                        </div>
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
    <div>
    
            
         
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
              </div>
            </div>
          </div>

@endsection
@push('dashboard')
  
@endpush

