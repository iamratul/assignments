<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment of Module 15</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
</head>
<body>
    @include('component.Navigation')
        @yield('content')
    <script src="{{asset('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
</body>
</html>