<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>@yield('title')</title>
</head>
<body>
    @include('Layout.menu')

    @yield('content')

    @yield('script')

    @include('Layout.footer')

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>