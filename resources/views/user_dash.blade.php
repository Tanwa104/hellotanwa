<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>
<a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
    aria-controls="offcanvasExample" style="margin-left:10pt">
    hello user
</a><br>
@php
                // dd($id);
            @endphp
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
@if (\Session::has('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('msg') !!}</li>
        </ul>
    </div>
@endif
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
    style="margin-right:0pt;margin-left:90%;">
    Add Address
</button>
<br><br>
<!-- Modal -->
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
<div>
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
        {{-- <img src="/img/cleaning.png" alt="logo" width="100px" height="100px"/>
    <img src="/img/cook.png" alt="logo" width="100px" height="100px" style="margin-left:10pt"/>
    <img src="/img/nanny.png" alt="logo" width="100px" height="100px" style="margin-left:10pt"/> --}}
    </div>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Customer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <a class="btn btn-secondary" href="{{route('edus.index')}}" role="button">Edit Profile</a><br><br>
                <a class="btn btn-secondary" href="" role="button">Bookings</a>
                <a class="btn btn-secondary" href="{{route('propuser.select')}}" role="button">View Proposals</a>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
        
            <input type="submit" value="logout" onclick="event.preventDefault();
                                this.closest('form').submit();">
           </form>
           
