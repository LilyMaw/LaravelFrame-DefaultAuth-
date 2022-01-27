@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="ttl">
        <h2>User List</h2>
      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif
  <div class="row col-lg-12">
    <form class="search">
      <label for="name">Name:</label>
      <input type="text" name="name"  value="{{ request('name')}}">
      <label for="email">Email:</label>
      <input type="email" name="email" value="{{ request('email')}}">
      <label for="from_date">From:</label>
      <input type="date" name="start_date" value="{{ request('start_date')}}">
      <label for="from_date">To:</label>
      <input type="date" name="end_date" value="{{ request('end_date')}}">
      <button type="submit">Search</button>
    </form>
  </div>

  <table class="table table-bordered">
    <tr class="table-ttl">
      <th>No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Created User</th>
      <th>Type</th>
      <th>Phone</th>
      <th>Date of Birth</th>
      <th>Address</th>
      <th>Created date</th>
      <th>Updated date</th>
      <th>Operation</th>
    </tr>
    @if(isset($userList))
      @if(sizeof($userList) > 0)
        @foreach ($userList as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td><a href="{{ route('user.show',$user->id) }}">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>{{ App\Models\User::find($user->created_user_id)->name }}</td>
            <td>{{ $user->type }}</td>
            {{-- @if($user->type == 0) 
            <td>Admin</td>
            @elseif($user->type == 1)
            <td>User</td>
            @endif --}}
            <td>{{ $user->phone }}</td>
            <td>{{ $user->dob }}</td>
            <td>{{ $user->address }}</td>
            <td>{{date('Y/m/d', strtotime($user->created_at))}}</td>
            <td>{{date('Y/m/d', strtotime($user->updated_at))}}</td>
            <td>
              <form action="{{ route('user.destroy',$user->id) }}" method="POST">       
                {{ csrf_field() }}
                {{ method_field('DELETE') }}   
                <button type="submit" onclick='return confirm(`Are you sure you want to delete "{{ $user->name }}" `)' class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
        @else 
        <div>
          <h2>No user found</h2>
        </div>
      @endif
    @endif
  </table>
</div>
@endsection
