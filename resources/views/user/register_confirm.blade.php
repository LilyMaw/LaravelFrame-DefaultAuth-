@extends('layouts.app')
   
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="ttl">
        <h2>Register Confirm</h2>
      </div>
    </div>
  </div>
  <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row content-inner">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="name" class="pull-left">Name:</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control pull-right" readonly>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="email" class="pull-left">E-mail Address:</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control pull-right" readonly>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="password" class="pull-left">Password:</label>
            <input type="password" name="password" value="{{ $user->password }}" class="form-control pull-right" readonly>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="password_confrimed" class="pull-left">Password Confirmation:</label>
            <input type="password" name="password_confrimed" value="{{ $user->password }}" class="form-control pull-right" readonly>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="type" class="pull-left">Type:</label>
            @if($user->type == 0) 
            <input type="text" name="type" value="Admin" class="form-control pull-right" readonly>
            @elseif($user->type == 1)
            <input type="text" name="type" value="User" class="form-control pull-right" readonly>
            @endif
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="phone" class="pull-left">Phone:</label>
            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control pull-right" readonly>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="dob" class="pull-left">Date of Birth:</label>
            <input type="date" name="dob" value="{{ $user->dob }}" class="form-control pull-right" readonly>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="address" class="pull-left">Address:</label>
            <input type="text" name="address" value="{{ $user->address }}" class="form-control pull-right" readonly> 
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="profile" class="pull-left">Profile:</label>
            <input type="hidden" name="profile" value="{{ $user->profile }}" class="form-control pull-right">
            <img src="/storage/images/{{ $user->profile }}" alt="profile_image" class="form-control image">
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Confirm</button>
        <a onclick="window.history.back();" class="btn btn-secondary">Cancel</a>
      </div>
    </div>
  </form>
</div>
  
@endsection