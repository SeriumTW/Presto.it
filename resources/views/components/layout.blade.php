<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="{{ asset('img/ominoxl.jpg') }}">
    <title>Presto.it</title>
  </head>
  <body>

    

    <x-navbar/>

    {{$slot}}


    <x-footer/>
    <script src="{{asset('js/app.js')}}"></script>
  </body>
</html>