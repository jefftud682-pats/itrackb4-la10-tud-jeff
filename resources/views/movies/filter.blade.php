<!DOCTYPE html>
<html>
<head>
    <title>Movie Filter</title>
</head>
<body>

    <h1>Movie Collection</h1>

    <h2>Active Filter: {{ $activeFilter }}</h2>

    @if (count($movies) > 0)

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

    @else

        <p>No movies found for this filter.</p>

    @endif

    <br>

    <a href="{{ route('movies.index') }}">
        Back to Movie List
    </a>

</body>
</html>