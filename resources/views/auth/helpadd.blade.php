<html>
    <head>
        <title>Helper Address</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            </head>
    <body style="">
        <form method="POST" action="{{ route('helpadd.build') }}">
            @csrf
            @method('POST')
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<label>roles</label><br>
<select name="roles">
    <option value="Housecleaner">HouseCleaner</option>
    <option value="childcare">ChildCare</option>
    <option value="houseCook">houseCook</option>
</select>
<br>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="city" placeholder="name">
                <label for="floatingInput">City</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="exp" placeholder="name">
                <label for="floatingInput">Experience(in yrs)</label>
              </div>
             
              <input type="submit" value="submit" class="btn btn-dark"/>
        </form>
    </body>
</html>