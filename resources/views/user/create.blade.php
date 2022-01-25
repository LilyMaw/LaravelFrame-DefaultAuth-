@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="ttl">
        <h2 class="container">Create User</h2>
      </div>
    </div>
  </div>

  <form action="{{ route('register_confirm') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="name" class="pull-left">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control pull-right">
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
            <input type="text" name="email" value="{{ old('email') }}" class="form-control pull-right">
          </div>
          @if ($errors->has('email'))
            <p class="text-danger pull-right">{{ $errors->first('email') }}</p>
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="password" class="pull-left">Password:</label>
            <input type="password" name="password" class="form-control pull-right">
          </div>
          @if ($errors->has('password'))
            <p class="text-danger pull-right">{{ $errors->first('password') }}</p>
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="password_confrimed" class="pull-left">Password Confirmation:</label>
            <input type="password" name="password_confrimed" class="form-control pull-right">
          </div>
          @if ($errors->has('password_confrimed'))
            <p class="text-danger pull-right">{{ $errors->first('password_confrimed') }}</p>
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="type" class="pull-left">Type:</label>
            <select id="type" name="type" value="{{ old('type') }}" class="form-control pull-right">
              <option value="0" selected>Admin</option>
              <option value="1" >User</option>
            </select>
          </div>
          @if ($errors->has('type'))
            <p class="text-danger pull-right">{{ $errors->first('type') }}</p>
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <label for="phone" class="pull-left">Phone:</label>
          <input type="text" name="phone" value="{{ old('phone') }}" class="form-control pull-right">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <label for="dob" class="pull-left">Date of Birth:</label>
          <input type="date" name="dob" value="{{ old('dob') }}" class="form-control pull-right">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="address" class="pull-left">Address:</label>
            <input type="text" name="address" value="{{ old('address') }}" class="form-control pull-right">
          </div>
          @if ($errors->has('address'))
            <p class="text-danger pull-right">{{ $errors->first('address') }}</p>
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="profile" class="pull-left">Profile:</label>
            <input type="file" name="profile" value="{{ old('profile') }}" class="form-control pull-right">
          </div> 
          @if ($errors->has('profile'))
            <p class="text-danger pull-right">{{ $errors->first('profile') }}</p>
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Create</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
      </div>
    </div>
     
  </form>
</div>
@endsection