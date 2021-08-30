@extends('layout_user.app')
@section('content')
<br>
<br>
@foreach($msgUser as $msg)
<div class="card" style="margin-left: 20px; width:800px" >
  <div class="card-body">
    <h5 class="card-title">This Message For Admin {{$msg->name}}</h5>
    <p class="card-text">{{$msg->message}}</p>
  </div>
</div>
<br>
<br>
@endforeach

@endsection