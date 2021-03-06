<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="flex-center position-ref full-height">
      @if (Route::has('login'))
        <div class="top-right links">
          @if (Auth::check())
            <a href="{{ url('/post') }}">Post</a>
          @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
          @endif
        </div>
      @endif

      <div class="content">
        <div class="title m-b-md">
          Welcome <br> to <br>
          <strong>Bulletin Board</strong>
        </div>
        <div >
          @if (Auth::check())
            <a href="{{ url('/post') }}" class="gray">Login</a>
          @else
            <a href="{{ url('/login') }}" class="gray">Login</a>
          @endif
        </div>
      </div>
    </div>
  </body>
</html>
