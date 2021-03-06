@extends('layouts.app')
   
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="ttl">
        <h2>Edit Confirm</h2>
      </div>
    </div>
  </div>
  <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }} 
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="title" class="pull-left">Title:</label>
            <span class="form-control pull-right">{{ request('title')}}</span>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="title" class="pull-left">Description:</label>
            <span class="form-control text-box pull-right">{{ request('description')}}</span>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <label for="status" class="pull-left">Status</label>
          <input type="checkbox" name="status" value="{{ request('status') }}"/>
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