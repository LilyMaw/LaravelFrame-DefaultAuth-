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
  @if ($message = Session::get('error'))
  <div class="alert alert-danger">
      <p>{{ $message }}</p>
  </div>
  @endif
  <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group clearfix">
          <label for="import_file" class="pull-left">CSV File</label>
          <input type="file" name="import_file" class="form-control pull-right">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Upload</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
      </div>
    </div>
  </form>
</div>
@endsection