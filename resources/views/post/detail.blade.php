@extends('layouts.app')
  
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="ttl">
        <h2>Post Detail</h2>
      </div>
    </div>
  </div>
   
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <label for="title">Title:</label>
        {{ $post->title }}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <label for="title">Description:</label>
        {{ $post->description }}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <label for="title">Status:</label>
        @if($post->status == 1)
        Active
        @else
        Non-Active
        @endif
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <label for="title">Created Date:</label>
        {{ $post->created_at->toDateString() }}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <label for="title">Created User:</label>
        {{ App\Models\User::find(1)->name }}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <label for="title">Updated Date:</label>
        {{ $post->updated_at->toDateString() }}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <label for="title">Updated User:</label>
        {{ App\Models\User::find(1)->name }}
      </div>
    </div>
  </div>
</div>
@endsection