<html>
    <head>
        <title> edit blog</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </head>
    <body>
       
    <form method="POST" action="{{route('edhelp.update',[$pid])}}">
        @csrf
        @method("PUT")
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">address line 1</span>
            <input type="text" class="form-control" name="address1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$data->address_line_1}}">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">address line 2</span>
            <input type="text" class="form-control" name="address2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$data->address_line_2}}">
          </div>
       
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">City</span>
            <input type="text" class="form-control" name="city" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$data->city}}">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">State</span>
            <input type="text" class="form-control" name="state" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$data->state}}">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Country</span>
            <input type="text" class="form-control" name="country" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$data->country}}">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">zip</span>
            <input type="text" class="form-control" name="zip" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$data->pincode}}">
          </div>
        <input type="submit" value="submit"/>
       
    </form>
    </body>
</html>