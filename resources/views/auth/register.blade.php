<html>
    <head>
        <title>Register Customer </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    
    <body >
        <form method="POST" action="{{ route('register.build') }}">
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
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="name">
                <label for="floatingInput">Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="lastname" placeholder="lastname">
                <label for="floatingInput">LastName</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="add Email">
                <label for="floatingInput">Email Address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="tel" class="form-control" id="floatingInput" name="phone" placeholder="add Phone">
                <label for="floatingInput">Phone Number</label>
              </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingInput"  name="password" placeholder="Enter password">
                    <label for="floatingInput">Password</label>

                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingInput" name="password_confirmation" placeholder="confirm password">
                    <label for="floatingInput">Confirm Password</label>
                  </div>
                  <input type="submit" value="submit" class="btn btn-dark"/>
              
        </form>
    </body></html>