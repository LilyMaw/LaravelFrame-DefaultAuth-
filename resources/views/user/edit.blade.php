@extends('layouts.app')
   
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="ttl">
        <h2>Edit User</h2>
      </div>
    </div>
  </div>
  
  <form action="{{ route('user.update',$user->id) }}" method="POST" id="form" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }} 
    <div class="row content-inner">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="name" class="pull-left">Name:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control pull-right">
          </div>
          @if ($errors->has('name'))
            <p class="text-danger pull-right">{{ $errors->first('name') }}</p>
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="email" class="pull-left">E-mail Address:</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control pull-right">
          </div>
          @if ($errors->has('email'))
            <p class="text-danger pull-right">{{ $errors->first('email') }}</p>
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <label for="type" class="pull-left">Type:</label>
          <select id="type" name="type" value="{{ old('type', $user->type) }}" class="form-control pull-right">
            <option value="0">Admin</option>
            <option value="1">User</option>
        </select>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <label for="phone" class="pull-left">Phone:</label>
          <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control pull-right">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <label for="dob" class="pull-left">Date of Birth:</label>
          <input type="date" name="dob" value="{{ old('dob', $user->dob) }}" class="form-control pull-right">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="address" class="pull-left">Address:</label>
            <input type="text" name="address" value="{{ old('address', $user->address) }}" class="form-control pull-right">
          </div>
          @if ($errors->has('address'))
            <p class="text-danger pull-right">{{ $errors->first('address') }}</p>
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <label for="old-profile" class="pull-left">Old Profile:</label>
          <img src="{{ asset('storage/images/'.$user->profile)}}" alt="profile_image" class="form-control image">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="profile" class="pull-left">Profile:</label>
            <input type="file" name="profile" value="{{ old('profile', $user->profile) }}" class="form-control pull-right">
          </div>
          @if ($errors->has('profile'))
            <p class="text-danger pull-right">{{ $errors->first('profile') }}</p>
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Edit</button>
        <button type="reset" class="btn btn-secondary">Clear</button>
        <a href="{{ route('change_password', Auth::user()->id) }}">Change Password?</a>
      </div>
    </div>
  </form>
</div>
  
@endsection
