<html>
    <head>
        <title>view proposals </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </head>
    <body>
      @if (\Session::has('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('msg') !!}</li>
        </ul>
    </div>
@endif
        <div class="card text-center">
           @php
           $no=count($user);
           $no1=count($helper);
           $no2=count($props);
           @endphp
                            @for($i=0;$i<$no;$i++)
              <div class="card-header">
                View the proposals made by the helpers
              </div>
              <div class="card-body">

                <h5 class="card-title">{{$user[$i]->name}}&nbsp;{{$user[$i]->lastname}}</h5>
                
        
                <p class="card-text">Experience&nbsp;{{$helper[$i]->exp}}&nbsp;yrs</p>
                <p class="card-text">for&nbsp;{{$helper[$i]->role}}</p>
            
                <p class="card-text">price&nbsp;{{$props[$i]->price}}</p>
        
              
                <a class="btn btn-primary-col4" href="{{route('book',[$props[$i]->id])}}">book</a>
               
              </div>
              <div class="card-footer text-body-secondary">
              @endfor

              </div>
            </div>
           
              
              </div>
            </div>
          