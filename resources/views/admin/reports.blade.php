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
            $userName = $entry->user->name;
            if ($entry->Acceptedpending === 'accepted') {
                $userBookingData[$userName] = ($userBookingData[$userName] ?? 0) + 1;
            }
        }
    }

    $userNames = array_keys($userBookingData);
    $userBookingData = array_values($userBookingData);
@endphp

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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        var cityNames = @json($cityNames);
        var cityBookingData = @json($cityBookingData);

        new Chart(document.querySelector('#cityBarChart'), {
            type: 'bar',
            data: {
                labels: cityNames,
                datasets: [{
                    label: 'Number of Bookings per City',
                    data: cityBookingData,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Number of Bookings in Different Cities'
                    }
                },
                scales: {
                    y: { 
                        beginAtZero: true,
                        ticks: { precision: 0 }  // Ensures absolute numbers (integers)
                    }
                }
            }
        });

        var userNames = @json($userNames);
        var userBookingData = @json($userBookingData);

        new Chart(document.querySelector('#userBarChart'), {
            type: 'bar',
            data: {
                labels: userNames,
                datasets: [{
                    label: 'Number of Bookings per User',
                    data: userBookingData,
                    backgroundColor: 'rgba(255, 165, 0, 0.6)',
                    borderColor: 'rgba(255, 140, 0, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Number of Bookings per User'
                    }
                },
                scales: {
                    y: { 
                        beginAtZero: true,
                        ticks: { precision: 0 }  // Ensures absolute numbers (integers)
                    }
                }
            }
        });
    });
</script>
@endsection