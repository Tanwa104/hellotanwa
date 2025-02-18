@extends('layout.master')
@section('container')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">select type of job for seeing proposals</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                
            </ol>
        </nav>
    </div>
</div>
<div style="margin-left:45%;">
    <form action="{{ route('propuser.build') }}" method="get">
        <input type="hidden" id="role" name="role" value="Housecleaner">
        <input type="image" src="/img/cleaning.png" alt="Submit"
            width="48" height="48" >
    </form>house clean<br>
    <form action="{{ route('propuser.build') }}" method="get">
        <input type="hidden" id="role" name="role" value="childcare">
         <input type="image" src="/img/nanny.png" alt="Submit"
            width="48" height="48">
    </form>childcare<br>
    <form action="{{ route('propuser.build') }}" method="get">
        <input type="hidden" id="role" name="role" value="houseCook">
        <input type="image" src="/img/cook.png" alt="Submit"
            width="48" height="48">
    </form>cook
  </div></body></html>
@endsection