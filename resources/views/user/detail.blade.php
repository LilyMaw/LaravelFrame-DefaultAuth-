@extends('layouts.app')
  
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="ttl">
        <h2>User Detail</h2>
      </div>
    </div>
  </div>
   
  <div class="row">
    <div class="pull-left">
      <img class="image" src="{{ asset('storage/images/'.$user->profile) }}" alt="profile_image">
    </div>
    <div class="pull-right">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <label for="name">Name:</label>
          {{ $user->name }}
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <label for="type">Type:</label>
          @if($user->type == 0)
          Admin
          @elseif($user->type == 1)
          User
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <label for="email">Email:</label>
          {{ $user->email }}
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <label for="title">Phone:</label>
          {{ $user->phone }}
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <label for="title">Date of Birth:</label>
          {{ $user->dob }}
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <label for="title">Address:</label>
          {{ $user->address }}
        </div>
      </div>
      <a href="{{ route('user.index') }}"></a>
    </div>
  </div>
    
</div>
@endsection