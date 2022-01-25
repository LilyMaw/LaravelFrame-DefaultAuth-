@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="ttl">
          <h2 class="container">Change Password</h2>
        </div>
      </div>
    </div>

    <form action="{{  route('update_password', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group row clearfix">
        <div class="clearfix">
          <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
          <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
        </div>
        @if($errors->any())
          <p class="text-danger pull-right">{{$errors->first()}}</p>
        @endif

        @if ($errors->has('current_password'))
          <p class="text-danger pull-right">{{ $errors->first('current_password') }}</p>
        @endif
      </div>

      <div class="form-group row clearfix">
        <div class="clearfix">
          <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
          <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
        </div>
        @if ($errors->has('new_password'))
          <p class="text-danger pull-right">{{ $errors->first('new_password') }}</p>
        @endif
      </div>

      <div class="form-group row clearfix">
        <div class="clearfix">
          <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
          <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
        </div>
        @if ($errors->has('new_confirm_password'))
          <p class="text-danger pull-right">{{ $errors->first('new_confirm_password') }}</p>
        @endif
      </div>

      <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
          <button type="submit" class="btn btn-primary">
            Update Password
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection