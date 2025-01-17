<html>
    <head> <title>find Assistence</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            </head>
   
            @foreach ($items as $user)
<div class="card text-center">
    <div class="card-header">
      Find Assistence
    </div>
    <div class="card-body">
       
      <h5 class="card-title">{{$user->name}}</h5>
      <p class="card-text">@foreach($user->address as $add){{{$add->city}}}@endforeach</p>
      <p class="card-text">@foreach($user->helpers as $add){{{$add->role}}}@endforeach</p>
      <a href="#" class="btn btn-primary">book</a>
    </div>
    <div class="card-footer text-body-secondary">
      <a href="#" >view Profile</a>
    </div>
  </div>

    
@endforeach