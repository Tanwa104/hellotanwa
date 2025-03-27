@extends('admin.layout_dash.main_add')

@section('comp')
@php
    $bookingCounts = [];
    $cityNames = [];

    foreach ($useradd as $user) {
        foreach ($user as $entry) {
            $acceptedBookings = $entry->bookings->where('Acceptedpending', 'accepted');
            if ($acceptedBookings->isNotEmpty()) {
                $city = $entry->city;
                $bookingCounts[$city] = ($bookingCounts[$city] ?? 0) + $acceptedBookings->count();
            }
        }
    }

    $cityNames = array_keys($bookingCounts);
    $cityBookingData = array_values($bookingCounts);

    $userBookingData = [];

    foreach ($bookuser as $booking) { 
        foreach ($booking as $entry) {
            if (isset($entry->user->name) && $entry->Acceptedpending === 'accepted') {
                $userName = $entry->user->name;
                $userBookingData[$userName] = ($userBookingData[$userName] ?? 0) + 1;
            }
        }
    }

    $userNames = array_keys($userBookingData);
    $userBookingData = array_values($userBookingData);

    $Bookingtype = [];

    foreach ($booktype as $btype) {
        if (!is_iterable($btype)) continue;

        foreach ($btype as $bt) {
            if (!isset($bt->Acceptedpending)) continue;

            $accept = $bt->Acceptedpending;
            $Bookingtype[$accept] = ($Bookingtype[$accept] ?? 0) + 1;
        }
    }

    $booktype = array_keys($Bookingtype);
    $btnums = array_values($Bookingtype);

    foreach($servicetype as $sertype) {
        foreach($sertype as $stype) {
            $service = $stype->role;
            foreach($stype->bookings as $sbook) {
                if(!empty($sbook)) {
                    $ServiceType[$service] = ($ServiceType[$service] ?? 0) + 1;
                }   
            }
        }
    }
    $servicenames = array_keys($ServiceType);
    $servicenums = array_values($ServiceType);
@endphp
<br><br><br>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Number of Bookings in Different Cities</h5>
            <canvas id="cityBarChart" style="max-height: 400px;"></canvas>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Number of Bookings per User</h5>
            <canvas id="userBarChart" style="max-height: 400px;"></canvas>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Status of Booking</h5>
            <canvas id="statusBarChart" style="max-height: 400px;"></canvas>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Type of Service</h5>
            <canvas id="servicetype" style="max-height: 400px;"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#cityBarChart'), {
            type: 'bar',
            data: {
                labels: @json($cityNames),
                datasets: [{
                    label: 'Number of Bookings per City',
                    data: @json($cityBookingData),
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
            }
        });

        new Chart(document.querySelector('#userBarChart'), {
            type: 'bar',
            data: {
                labels: @json($userNames),
                datasets: [{
                    label: 'Number of Bookings per User',
                    data: @json($userBookingData),
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
            }
        });

        new Chart(document.querySelector('#statusBarChart'), {
            type: 'bar',
            data: {
                labels: @json($booktype),
                datasets: [{
                    label: 'Number of Booking Statuses',
                    data: @json($btnums),
                    backgroundColor: 'rgba(255, 206, 86, 0.6)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
            }
        });

        new Chart(document.querySelector('#servicetype'), {
            type: 'bar',
            data: {
                labels: @json($servicenames),
                datasets: [{
                    label: 'Number of Services',
                    data: @json($servicenums),
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
            }
        });
    });
</script>
@endsection