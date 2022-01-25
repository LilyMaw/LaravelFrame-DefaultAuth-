@extends('layouts.app')
   
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="ttl">
        <h2>Confirm Post</h2>
      </div>
    </div>
  </div>
  <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="title" class="pull-left">Title:</label>
            <input type="text" value="{{ request('title') }}" name="title" class="form-control pull-right" readonly>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="title" class="pull-left">Description:</label>
            <textarea class="form-control text-box pull-right" name="description" readonly>{{ request('description') }}</textarea>
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