@extends('layout.master')
@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Change profile</h1>
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
        <form method="post" action="{{route('edus.store')}}" class="mb-5">
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
                    
                    <select class="form-select" id="gender" name="gen">
                  <option>select</option>
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
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <h2 class="mt-4">Addresses</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Address Line 1</th>
                    <th>Address Line 2</th>
                    <th>Area</th>
                    <th>City</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($item->address as $dat)
                    <tr>
                        <td>{{$dat->address_line_1}}</td>
                        <td>{{$dat->address_line_2}}</td>
                        <td>{{$dat->area}}</td>
                        <td>{{$dat->city}}</td>
                        <td>{{$dat->updated_at}}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('edus.edit',[$dat->id])}}" class="btn btn-sm btn-warning me-2">Edit</a>
                                <form action="{{route('edus.destroy',[$dat->id])}}" method="POST">
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
                        <input type="text" class="form-control" id="floatingInput" name="area" placeholder="name">
                        <label for="floatingInput">area</label>
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
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection