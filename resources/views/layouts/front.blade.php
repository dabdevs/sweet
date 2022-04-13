<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Djnius') }}</title>

    <!-- Scripts -->
    <link rel="icon" type="image/png" href="{{ asset('rubik/img/favicon.ico') }}">

    <!-- Styles -->
    <link href="{{ asset('rubik/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('rubik/css/rubick.css') }}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('rubik/css/fonts/pe-icon-7-stroke.css')}}" rel="stylesheet">
    <link href="{{ asset('rubik/css/fonts/Rubik-Fonts.css')}}" rel="stylesheet">

    @yield('css')
</head>
<body>

    @yield('content')

    <!--   core js files    -->
    <script src="{{ asset('rubik/js/jquery-1.11.2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('rubik/js/bootstrap.js') }}" type="text/javascript"></script>
  
    <!--   file for adding vertical points where we activate the elements animation   -->
    <script type="text/javascript" src="{{ asset('rubik/js/jquery.waypoints.min.js') }}"></script>

    <!--  js library for devices recognition -->
    <script type="text/javascript" src="{{ asset('rubik/js/modernizr.js') }}"></script>

    <!--  script for google maps   -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        
    <!--   file where we handle all the script from the Rubik page   -->
    <script type="text/javascript" src="{{ asset('rubik/js/rubick.js') }}"></script>

    @yield('js')
</body>
</html>
