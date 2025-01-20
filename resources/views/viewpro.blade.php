<html>
    <head>
        <title>view profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </head>
    <body style="background-color:lavender">
    
        
        <div class="col-lg-12 p-3 p-lg-5 pt-lg-3" style="background-color: white;margin-top:3%">
        @foreach($items as $item)
        <h1 class="lead"style="margin-top:3%">{{$item->name}}&nbsp;{{$item->lastname}}</h1>
        
        <h1 class="lead" style="margin-top:3%">{{$item->email}}</h1>
        <h1 class="lead" style="margin-top:3%">{{$item->phone}}</h1>
        @foreach($item->helpers as $help)
        <h1 class="lead" style="margin-top:3%">{{$help->role}}</h1>
        @endforeach
        
        @endforeach
        </div>

    </body>
</html>