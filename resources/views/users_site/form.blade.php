@extends('layout_user.app')
@section('content')

<form action="{{route('user.message')}}" method="POST">
    @csrf
  <div class="form-group">
    <label>Message</label>
    <textarea name="message" class="form-control" id="message"></textarea>
  </div>
  <div class="form-group">
    <label>Admin</label>
    <select id="admin_id" name="admin_id" style="width: 500px;" class="form-control">
        @foreach($admins as $admin)
        <option value="{{$admin->id}}">{{$admin->name}}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>User</label>
    <select id="user_id" name="user_id" style="width: 500px;" class="form-control">
        <option value="{{auth()->user()->id}}">{{auth()->user()->first_name}}</option>
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Send</button>
</form>

@endsection