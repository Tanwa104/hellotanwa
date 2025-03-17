@extends('admin.layout_dash.main_add')

@section('comp')

@php
$bookingCounts = [];
$cityNames = [];

foreach ($useradd as $user) 
{
    
    $no=count($user);
    for($i=0;$i<$no;$i++){
        $noj=count($user[$i]->bookings);
        for($j=0;$j<$noj;$j++)  
        {
        if($user[$i]->bookings[$j]->Acceptedpending=='accepted')
    {
          if (!isset($bookingCounts[$user[$i]->city])) {
        $bookingCounts[$user[$i]->city] = 0;
    }
    $bookingCounts[$user[$i]->city] += $user[$i]->bookings()->count();
}
}
}
}

$cityNames = array_keys($bookingCounts);
$bookingData = array_values($bookingCounts);
@endphp

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Number of Bookings in Different Cities</h5>

            <!-- Bar Chart -->
            <canvas id="barChart" style="max-height: 400px;"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    var cities = @json($cityNames);
                    var bookingsCount = @json($bookingData);

                    new Chart(document.querySelector('#barChart'), {
                        type: 'bar',
                        data: {
                            labels: cities,
                            datasets: [{
                                label: 'Number of Bookings per city',
                                data: bookingsCount,
                                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>

@endsection
