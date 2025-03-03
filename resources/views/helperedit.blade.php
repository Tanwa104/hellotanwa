@extends('layout.master')
@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Edit your profile</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (\Session::has('msg'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('msg') !!}</li>
            </ul>
        </div>
    @endif

    @foreach ($items as $item)
        @php
            foreach($item->helpers as $help){
                $tid=$help->id;
            }
        @endphp

        <form method="post" action="{{route('edhelp.changes',[$tid])}}" class="mb-5">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{$item->lastname}}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="{{$item->email}}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{$item->phone}}" required>
                </div>
            </div>

           
            <div class="row mb-3">
                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <select class="form-select" id="gender" name="gender">
                    
                        <option value="male" {{$item->gender == 'male' ? 'selected' : ''}}>Male</option>
                        <option value="female" {{$item->gender == 'female' ? 'selected' : ''}}>Female</option>
                        <option value="other" {{$item->gender == 'other' ? 'selected' : ''}}>Other</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="DoB" class="col-sm-2 col-form-label">Date of Birth</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="DoB" name="DoB" value="{{$item->DOB}}" required>
                </div>
            </div>
            @foreach($item->helpers as $helper)
            <div class="row mb-3">
                <label for="role" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <select class="form-select" id="role" name="roles">
                        
                        <option value="Housecleaner" {{$helper->role == 'Housecleaner' ? 'selected' : ''}}>House Cleaner</option>
                        <option value="childcare" {{$helper->role == 'childcare' ? 'selected' : ''}}>Child Care</option>
                        <option value="houseCook" {{$helper->role == 'houseCook' ? 'selected' : ''}}>House Cook</option>
                    </select>
                </div>
            </div>
        @endforeach

        
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Submit Changes</button>
            </div>
        </form>

        <h2 class="mt-4">Addresses</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Address Line 1</th>
                    <th>Address Line 2</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($item->address as $dat)
                    <tr>
                        <td>{{$dat->address_line_1}}</td>
                        <td>{{$dat->address_line_2}}</td>
                        <td>{{$dat->city}}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('edhelp.edit',[$dat->id])}}" class="btn btn-sm btn-warning me-2">Edit</a>
                                <form action="{{route('edhelp.destroy',[$dat->id])}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Address
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{route('add.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="address1" placeholder="Address Line 1" required>
                            <label for="floatingInput">Address Line 1</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="address2" placeholder="Address Line 2">
                            <label for="floatingInput">Address Line 2</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="area" placeholder="area" required>
                            <label for="floatingInput">Area</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="city" placeholder="City" required>
                            <label for="floatingInput">City</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="state" placeholder="State" required>
                            <label for="floatingInput">State</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="country" placeholder="Country" required>
                            <label for="floatingInput">Country</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="zip" placeholder="Zip Code" required>
                            <label for="floatingInput">Zip Code</label>
                        </div>
                        <input type="submit" class="btn btn-primary" value="submit"/>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</div> 
<br><br>
@endsection