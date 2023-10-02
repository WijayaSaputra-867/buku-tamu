<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    @include('partials.navbar')
    <div class="container">
        <div class="mt-5">       
            @yield('container')
        </div>
    </div>
</body>
</html>