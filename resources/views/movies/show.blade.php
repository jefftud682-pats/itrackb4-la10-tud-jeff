<!DOCTYPE html>
<html>
<head>
    <title>Movie Details</title>
</head>
<body>

    <h1>{{ $item['title'] }}</h1>

    <p><strong>ID:</strong> {{ $item['id'] }}</p>
    <p><strong>Title:</strong> {{ $item['title'] }}</p>
    <p><strong>Director:</strong> {{ $item['director'] }}</p>
    <p><strong>Genre:</strong> {{ $item['genre'] }}</p>
    <p><strong>Year:</strong> {{ $item['year'] }}</p>

    <p>Created by: Jeff Tud</p>

    <a href="{{ route('movies.index') }}">
        Back to Movie List
    </a>

</body>
</html>
