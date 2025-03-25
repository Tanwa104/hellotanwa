@extends('admin.layout_dash.main_add')

@section('comp')
<br><br><br>
<br>

@if (\Session::has('msg'))
<div class="alert alert-info">
    <ul>
        <li>{!! \Session::get('msg') !!}</li>
    </ul>
</div>
@endif
@if (\Session::has('msg1'))
<div class="alert alert-danger">
<ul>
    <li>{!! \Session::get('msg1') !!}</li>
</ul>
</div>
@endif
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Position</th>
        <th scope="col">Gender</th>
       
      </tr>
    </thead>
    <tbody>
        @foreach($helpers as $helper)
        @if($helper->status=='pending')
        <tr>
            <th scope="row">{{$helper->id}}</th>
            <td>{{$helper->user->name}}{{$helper->user->lastname}}</td>
            <td>{{$helper->role}}</td>
            <td>{{$helper->user->gender}}</td>
            <td><a href="{{route('helper.accept',[$helper->id])}}" class="btn btn-success">accept</a></td>
            <td><a href="{{route('helper.deny',[$helper->id])}}" class="btn btn-danger">reject</a></td>
          </tr>
        @endif
        @endforeach
    </tbody>
</table>

    
  <br><br><br>
@endsection