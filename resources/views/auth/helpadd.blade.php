@extends('layout.master')
@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Register yourself as helper</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                
            </ol>
        </nav>
    </div>
</div>
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
</div>
@endif

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
                    <img class="position-relative rounded w-100 h-100" src="/img/register.jpg" alt="Map Placeholder" style="min-height: 350px; object-fit: cover;">
            
                </div>
                
                <div class="col-md-6">
                    <form method="POST" action="{{ route('helpadd.build') }}">
                        @csrf
                        @method('POST')
                        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label>roles</label><br>
            <select name="roles" class="form-select">
                <option>select</option>
                <option value="Housecleaner">HouseCleaner</option>
                <option value="childcare">ChildCare</option>
                <option value="houseCook">houseCook</option>
            </select>
            <br>
                       
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="exp" placeholder="name">
                            <label for="floatingInput">Experience(in yrs)</label>
                          </div>
                         
                          <input type="submit" value="submit" class="btn btn-dark"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection