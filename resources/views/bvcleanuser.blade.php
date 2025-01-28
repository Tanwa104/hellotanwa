<html>
    <head> <title>find Assistence</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            </head>
   
            @foreach ($items as $user)
<div class="card text-center">
  @php
  $no1=count($us)
  @endphp
    <div class="card-header">
      View the proposals made by the helpers
    </div>
    <div class="card-body">
       
      <h5 class="card-title">{{$user->name}}</h5>
      <p class="card-text">{{$city}}</p>
      {{ \Carbon\Carbon::parse($us[$no1-1]->start_time)->format('g:i A') }}&nbsp;to&nbsp;{{ \Carbon\Carbon::parse($us[$no1-1]->end_time)->format('g:i A') }}
      <p class="card-text">{{$us[$no1-1]->weekdays}}</p>
      <p class="card-text">type of house @foreach($user->cleanerreq as $add){{{$add->hometype}}}@endforeach</p>
      <p class="card-text"> number of bedrooms @foreach($user->cleanerreq as $add){{{$add->bedroomno}}}@endforeach</p>
      <p class="card-text"> number of halls @foreach($user->cleanerreq as $add){{{$add->hallno}}}@endforeach</p>
      <p class="card-text"> numberof kitchen @foreach($user->cleanerreq as $add){{{$add->kichenno}}}@endforeach</p>
      <p class="card-text"> type of cleaning @foreach($user->cleanerreq as $add){{{$add->cleaningtype}}}@endforeach</p>
      
    </div>
    <div class="card-footer text-body-secondary">
      <a href="" >view proposals</a>
    </div>
  </div>

    
@endforeach