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
       
      <h5 class="card-title">{{$itemadd->name}}</h5>
      <p class="card-text">{{$city}}</p>
      {{ \Carbon\Carbon::parse($us[0]->start_time)->format('g:i A') }}&nbsp;to&nbsp;{{ \Carbon\Carbon::parse($us[0]->end_time)->format('g:i A') }}
    <p class="card-text">{{$us[0]->weekdays}}</p>
      <table border  class="card-text">
        <tr><th>childname</th>
            <th>age</th>
            <th>gender</th></tr>
      @for($i=0;$i<$no;$i++)
      <tr><td>{{$items[$i]->childname}}</td><td>{{$items[$i]->childage}}</td><td>{{$items[$i]->childgender}}</td></tr>
      @endfor
      </table>
    </div>
    <div class="card-footer text-body-secondary">
        <a href="" >view proposals</a>

          </div>
  </div>

    
