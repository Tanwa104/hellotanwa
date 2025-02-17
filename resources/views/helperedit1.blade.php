
<html>
    <head>
        <title> Edit your Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
        <body>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (\Session::has('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('msg') !!}</li>
        </ul>
    </div>
@endif

            @foreach ($items as $item)
            @php
 foreach($item->helpers as $help)
 {
    $tid=$help->id;
 }
@endphp
        <form method="post" action="{{route('edhelp.changes',[$tid])}}">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                <input type="text" class="form-control" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$item->name}}">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">LastName</span>
                <input type="text" class="form-control"  name="lastname" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$item->lastname}}">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                <input type="text" class="form-control" name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$item->email}}">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                <input type="password" class="form-control" name="password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Confirm Password</span>
                <input type="password" class="form-control" name="password_confirmation" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
                <input type="text" class="form-control" name="phone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$item->phone}}">
              </div>
             
              <input type="submit" value="submit">

             @foreach($item->helpers as $helper)
             
                <select name="roles" >
                    <option value="Housecleaner" {{$helper->role == 'Housecleaner' ? 'selected' :  ''}}>HouseCleaner</option>
                    <option value="childcare" {{$helper->role == 'childcare' ? 'selected' :  ''}}>ChildCare</option>
                    <option value="houseCook" {{$helper->role == 'houseCook' ? 'selected' :  ''}}>houseCook</option>
                </select>
             @endforeach
        </form>
        <table border="1">
           
            @foreach($item->address as $dat)
            <tr>
            <td>{{$dat->address_line_1}}</td>
            <td>{{$dat->address_line_2}}</td>
            <td>{{$dat->city}}</td>
            
            <form action="{{route('edhelp.destroy',[$dat->id])}}" method="POST">
                @csrf
            @method("DELETE")
            <td><input type="submit" value="delete"/></td> 
            </form>     
           <td><a href="{{route('edhelp.edit',[$dat->id])}}">edit</a></td>
           </tr>
           @endforeach
        </table>
            @endforeach
      <a href="{{route('help.build')}}">Back</a>     
        </body>
</html>