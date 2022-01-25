@extends('layouts.app')
 
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="ttl">
        <h2>Post List</h2>
      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif
  <div class="row col-lg-12 search">
    <form>
      <label for="keyword" style="width: auto">Keyword</label>
      <input type="text" name="keyword"  value="{{ request('keyword')}}">
      <button type="submit" class="btn btn-success">Search</button>
    </form>
    <div>
      <a class="btn btn-success" href="{{ route('post.create') }}">Create</a>
      <a class="btn btn-success" href="{{ route('importExportView') }}">Upload</a>
      <a class="btn btn-success" href="{{ route('export') }}">Download</a>
    </div>
  </div>

  <table class="table table-bordered">
    <tr class="table-ttl">
      <th>Post Title</th>
      <th>Post Description</th>
      <th>Posted User</th>
      <th>Posted Date</th>
      <th>Operation</th>
    </tr>
    @foreach ($data as $key => $value)
      <tr>
        <td><a href="{{ route('post.show',$value->id) }}">{{ $value->title }}</a></td>
        <td>{{ $value->description }}</td>
        <td>{{ App\Models\User::find(1)->name }}</td>
        <td>{{ App\Models\Post::find($value->id)->created_at->toDateString() }}</td>
        <td>
          <form action="{{ route('post.destroy',$value->id) }}" method="POST">     
            <a class="btn btn-primary" href="{{ route('post.edit',$value->id) }}">Edit</a>   
            {{ csrf_field() }}
            {{ method_field('DELETE') }}  
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>  
  {!! $data->links() !!}  
</div>
    
@endsection