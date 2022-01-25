@extends('layouts.app')
  
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="ttl">
        <h2>Create Post</h2>
      </div>
    </div>
  </div>
  <form action="{{ route('confirm_post') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="title" class="pull-left">Title:</label>
            <input type="text" value="{{ old('title')}}" name="title" class="form-control pull-right">
          </div>
          @if ($errors->has('title'))
            <p class="text-danger pull-right">{{ $errors->first('title') }}</p>
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="description" class="pull-left">Description:</label>
            <textarea class="form-control text-box pull-right" name="description">{{ old('description') }}</textarea>
          </div>
          @if ($errors->has('description'))
            <p class="text-danger pull-right">{{ $errors->first('description') }}</p>
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