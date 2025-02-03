<html>
    <head>
        <title>make proposal</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </head>
    <body>
        <form method="get" action="{{route('makeprop.fill',[$cid])}}">
        
        @if (\Session::has('msg'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('msg') !!}</li>
                </ul>
            </div>
        @endif
            <div class="shadow-sm p-3 mb-5 bg-body-tertiary rounded">
            <div class="text-center">
            <label>name</label>
            <p>{{$items->name}}&nbsp;{{$items->lastname}}</p><br><br>

            <label>role</label>
            <p>
@foreach($items->helpers as $help){{$help->role}}@endforeach</p><br><br>
<label>Address</label>
<p>
@foreach($items->address as $add){{$add->address_line_1}}&nbsp;{{$add->address_line_2}}&nbsp;{{$add->city}}&nbsp;{{$add->state}}&nbsp;{{$add->country}}@endforeach</p><br><br>
            <label>Enter the price for the made request</label><br>
            <input type="text" name="price" id="price" required/><br><br>
            <input type="submit" value="submit"/>
           </div>
           </div>
        </form>
    </body>