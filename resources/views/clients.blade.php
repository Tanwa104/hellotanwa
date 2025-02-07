<html>
    <head>
        <title> clients </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </head>
    <body>
        @foreach($bookuser as $bou)
        <div class="shadow p-3 mb-5 bg-body-tertiary rounded"style="margin-left:20%;margin-top:10pt;margin-right:20%">

        <p> your proposal given to{{$bou->name}} {{$bou->lastname}} of time @foreach($booktime as $bot){{\Carbon\Carbon::parse($bot->start_time)->format('g:i A')}}  to {{\Carbon\Carbon::parse($bot->end_time)->format('g:i A')}} has been accepted by user @endforeach
        </p>
        <p>are you ready to work to that user</p>
        <a href="{{route('acceptbook.fill',[$bou->id])}}" class="btn">yes</a>
        <a href="{{route('deniedbook.fill',[$bou->id])}}" class="btn">no</a>

        </div>
        @endforeach
    </body>