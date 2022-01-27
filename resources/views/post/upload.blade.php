@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="ttl">
        <h2 class="container">Upload CSV File</h2>
      </div>
    </div>
  </div>
  <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <div class="clearfix">
            <label for="import_file" class="pull-left">CSV File</label>
            <input type="file" name="import_file" class="form-control pull-right">
          </div>
          @if ($errors->has('import_file'))
            <p class="text-danger pull-right">{{ $errors->first('import_file') }}</p>
          @endif
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Upload</button>
        <a href="{{ route('post.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </div>
  </form>
</div>
@endsection