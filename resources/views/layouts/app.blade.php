<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>
<body>

    <div class="container">

        <h1> My Movies Collection</h1>

        <p>Created by: Jeff Tud</p>

        @include('partials._nav')

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </div>

</body>
</html>