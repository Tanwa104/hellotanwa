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

</div>

@endsection