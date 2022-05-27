<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">



    <!-- Styles -->
    <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet">


</head>
<body>



    <div class="wrapper ">
        @include('layouts.inc.sidebar')

    <div class="main-panel">
        @include('layouts.inc.adminnavbar')

      <div class="content">
          @yield('content')

      </div>

      @include('layouts.inc.adminfooter')
    </div>

    </div>





    <script
    src="https://code.jquery.com/jquery-2.2.4.js"
    integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
    crossorigin="anonymous"></script>

     <script src="{{ asset('js/jquery.min.js') }}"></script>
     <script src="{{ asset('js/popper.min.js') }}"></script>
     <script src="{{ asset('js/bootstrap-material-design.min.js') }}"></script>
     <script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
     @yield("scripts")
</body>
</html>
