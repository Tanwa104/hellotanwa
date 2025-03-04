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
<div style="display: flex; justify-content: center; align-items: center; flex-direction: column; gap: 20px; padding: 20px;">
    <div style="display: flex; align-items: center; flex-direction: column;">
        <form action="{{ route('propuser.build') }}" method="get" style="display: flex; flex-direction: column; align-items: center;">
            <input type="hidden" id="role" name="role" value="Housecleaner">
            <button type="submit" style="background: none; border: none; padding: 0;">
                <img src="/img/cleaning.png" alt="House Cleaning" width="64" height="64">
            </button>
            <span style="margin-top: 5px;">House Cleaning</span>
        </form>
    </div>

    <div style="display: flex; align-items: center; flex-direction: column;">
        <form action="{{ route('propuser.build') }}" method="get" style="display: flex; flex-direction: column; align-items: center;">
            <input type="hidden" id="role" name="role" value="childcare">
            <button type="submit" style="background: none; border: none; padding: 0;">
                <img src="/img/nanny.png" alt="Childcare" width="64" height="64">
            </button>
            <span style="margin-top: 5px;">Childcare</span>
        </form>
    </div>

    <div style="display: flex; align-items: center; flex-direction: column;">
        <form action="{{ route('propuser.build') }}" method="get" style="display: flex; flex-direction: column; align-items: center;">
            <input type="hidden" id="role" name="role" value="houseCook">
            <button type="submit" style="background: none; border: none; padding: 0;">
                <img src="/img/cook.png" alt="Cook" width="64" height="64">
            </button>
            <span style="margin-top: 5px;">Cook</span>
        </form>
    </div>
</div>
@endsection