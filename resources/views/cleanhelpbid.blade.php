@extends('layout.master')

@section('container')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">See Requests</h1>
    </div>
</div>

<div class="container text-center mb-4">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        City Filter
    </button>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">City Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="{{ route('areaclean.fill') }}">
                    <div class="mb-3">
                        <label for="city-dropdown" class="form-label">Select City</label>
                        <select id="city-dropdown" class="form-select" name="city">
                            <option value="">-- Select City --</option>
                            @foreach ($data as $city)
                                <option value="{{ $city }}">{{ $city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Submit" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@php
    $filteredData = session('data');
    $displayedUsers = [];
@endphp

<div class="container mt-4">
    @if ($users->isNotEmpty())
        @foreach ($users as $index => $user)
            @php
                $userTimeId = $usertime[$index]->id;
                $userCity = $useradd[$index]->city;
            @endphp

            @if (!in_array($userTimeId, $displayedUsers) && (!$filteredData || collect($filteredData)->contains(fn($filter) => $filter->address->city == $userCity)))
                @php
                    $displayedUsers[] = $userTimeId;
                @endphp
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-primary text-white text-center">Find Assistance</div>
                    <div class="card-body">
                        <h5 class="card-title text-center mb-3">{{ $user->name }} {{ $user->lastname }}</h5>
                        <p class="text-center">
                            {{ $useradd[$index]->address_line_1 }}, {{ $useradd[$index]->address_line_2 }},
                            {{ $useradd[$index]->area }}, {{ $useradd[$index]->city }}, {{ $useradd[$index]->state }}
                        </p>
                        <p class="text-center">
                            {{ \Carbon\Carbon::parse($usertime[$index]->start_time)->format('g:i A') }} to
                            {{ \Carbon\Carbon::parse($usertime[$index]->end_time)->format('g:i A') }}
                        </p>
                        <p class="text-center">Time preference: {{ $usertime[$index]->jobtype }}</p>
                        <p class="text-center">Days: {{ str_replace(['[', ']', '"'], '', $usertime[$index]->weekdays) }}</p>
                        <p class="card-text"><strong>Type of house:</strong> {{ $userclean[$index]->hometype }}</p>
                        <p class="card-text"><strong>Number of bedrooms:</strong> {{ $userclean[$index]->bedroomno }}</p>
                        <p class="card-text"><strong>Number of halls:</strong> {{ $userclean[$index]->hallno }}</p>
                        <p class="card-text"><strong>Number of kitchens:</strong> {{ $userclean[$index]->kichenno }}</p>
                        <p class="card-text"><strong>Type of cleaning:</strong> {{ $userclean[$index]->cleaningtype }}</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('propindex.build', ['id' => $user->id, 'tid' => $usertime[$index]->id]) }}" class="btn btn-primary">Make Proposal</a>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        <div class="alert alert-warning text-center">No requests found.</div>
    @endif
</div>
@endsection
