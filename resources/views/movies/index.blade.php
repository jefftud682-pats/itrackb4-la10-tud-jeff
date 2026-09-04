<!DOCTYPE html>
<html>
<head>
    <title>Movie List</title>
</head>
<body>

    <h1>My Movie Collection</h1>

    <p>Created by: Jeff Tud</p>

    <p>
        <a href="{{ route('movies.featured') }}">
            View Featured Movie
        </a>
    </p>

    <p>
        <a href="{{ route('movies.filter') }}">
            View All Movies
        </a>
    </p>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Director</th>
            <th>Genre</th>
            <th>Year</th>
        </tr>

        @foreach ($movies as $item)
            <tr>
                <td>{{ $item['id'] }}</td>

                <td>
                    <a href="{{ route('movies.show', $item['id']) }}">
                        {{ $item['title'] }}
                    </a>
                </td>

                <td>{{ $item['director'] }}</td>
                <td>{{ $item['genre'] }}</td>
                <td>{{ $item['year'] }}</td>
            </tr>
        @endforeach

    </table>

</body>
</html>