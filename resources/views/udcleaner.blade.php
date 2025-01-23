<html> 
    <head> <title> Enter more details </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </head>
    <body>
        <form method="GET" action="{{route('udclean.build')}}"> 
            <div class="col-md-12">
                
            <label class="form-label" for="place">Enter the type of place you have</label>
            <input type="text" class="form-control" name="place" id="place" placeholder="eg apartment,villa,duplex,etc"/>
            <br>
            <label class="form-label" for="bedno">Enter the number of bedrooms you have</label>
            <input type="text" name="bedno"  class="form-control" id="bedno"/>
            <br>
            <label class="form-label" for="hallno">Enter the number of halls you have</label>
            <input type="text" name="hallno" class="form-control" id="hallno"/>
            <br>
            <label class="form-label" for="kitchno">Enter the number of kitchens you have</label>
            <input type="text" name="kitchen" id="kitchno" class="form-control"/>
            <br>
            <label class="form-label" for="typeclean">Enter the type of cleaning</label>
            <span id="typeclean" class="form-control">
            <select name="typeclean">
                <option>select</option>
                <option value="normal">Normal Day to Day cleaning</option>
                <option value="deep">deep cleaning</option> 
            </select>
            </span>
            </div>
            <input type="submit" value="submit"/>
        </form>
    </body>
</html>