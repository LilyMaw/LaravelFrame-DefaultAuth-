@extends('layouts.app')
   
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="ttl">
        <h2>Edit Post</h2>
      </div>
    </div>
  </div>
  <form action="{{ route('edit_confirm', $post->id) }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="title" class="pull-left">Title:</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control pull-right" placeholder="Title">
          </div>
          @if ($errors->has('title'))
            <p class="text-danger pull-right">{{ $errors->first('title') }}</p>
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="title" class="pull-left">Description:</label>
            <textarea class="form-control text-box pull-right" name="description" placeholder="Detail">{{ old('description', $post->description) }}</textarea>
          </div>
          @if ($errors->has('description'))
            <p class="text-danger pull-right">{{ $errors->first('description') }}</p>
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <label for="status" class="pull-left">Status</label>
          <input type="checkbox" name="status"  value="{{ $post->status }}" {{  ($post->status == 1 ? ' checked' : '') }} />
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Edit</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
      </div>
    </div>
  </form>
</div>
  
@endsection
