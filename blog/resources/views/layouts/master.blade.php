<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{URL::to('css/style.css') }}">
</head>
<body>
    @include('includes.header')
    <div class="container-fluid">
        @yield('content')     {{-- hook in your code--}}
    </div>
    {{--{!! "<script> alert('Are you sure you want to continue in this project ??') </script> " !!}--}}
</body>
</html>
