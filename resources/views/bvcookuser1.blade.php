<html>
    <head> <title>find Assistence</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            </head>

<div class="card text-center">
    <div class="card-header">
      View the proposals made by the helpers
    </div>
    <div class="card-body">
       @php
       $no1=count($us)
       @endphp
      <h5 class="card-title">{{$itemadd->name}}</h5>
      <p class="card-text">{{$city}}</p>
      {{ \Carbon\Carbon::parse($us[$no1-1]->start_time)->format('g:i A') }}&nbsp;to&nbsp;{{ \Carbon\Carbon::parse($us[$no1-1]->end_time)->format('g:i A') }}
    <p class="card-text">{{$us[$no1-1]->weekdays}}</p>
    <p class="card-text">type of ocassion &nbsp;{{$items[0]->ocassion}}</p>
    <p class="card-text">number of people &nbsp;{{$items[0]->peopleno}}</p>
    <p class="card-text">type of cusine &nbsp;{{$items[0]->cusine}}</p>

      <table border  class="card-text">
        <tr><th>meal description</th>
            </tr>
      @for($i=0;$i<$no;$i++)
      <tr><td>{{$items[$i]->description}}</td></tr>
      @endfor
      </table>
      <p class="card-text" style="background-color: green;color:white"> your request has been registered and you will get the proposals soon<br>
        go to view proposals to see proposals made
      </p>
    </div>
    <div class="card-footer text-body-secondary">
      <a href="{{route('user.build')}}">Back</a>     

          </div>
  </div>
</html>

    
