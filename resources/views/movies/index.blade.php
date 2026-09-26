@extends('layouts.app')

@section('title', 'Movie List')

@section('content')

    <h2>Movie List</h2>

    <p>
        <strong>Genre:</strong> {{ $genre }}
        |
        <strong>Director:</strong> {{ $director }}
    </p>

    <h5>Filter by Genre</h5>

    @if ($director === 'all')
        <a href="{{ route('movies.index') }}">All Genres</a>
        <a href="{{ route('movies.index', ['genre'=>'Romance']) }}">Romance</a>
        <a href="{{ route('movies.index', ['genre'=>'Family']) }}">Family</a>
        <a href="{{ route('movies.index', ['genre'=>'Historical']) }}">Historical</a>
        <a href="{{ route('movies.index', ['genre'=>'Crime']) }}">Crime</a>
    @else
        <a href="{{ route('movies.index', ['director'=>$director]) }}">All Genres</a>
        <a href="{{ route('movies.index', ['genre'=>'Romance','director'=>$director]) }}">Romance</a>
        <a href="{{ route('movies.index', ['genre'=>'Family','director'=>$director]) }}">Family</a>
        <a href="{{ route('movies.index', ['genre'=>'Historical','director'=>$director]) }}">Historical</a>
        <a href="{{ route('movies.index', ['genre'=>'Crime','director'=>$director]) }}">Crime</a>
    @endif

    <br><br>

    <h5>Filter by Director</h5>

    @if ($genre === 'all')
        <a href="{{ route('movies.index') }}">All Directors</a>
        <a href="{{ route('movies.index', ['director'=>'Cathy Garcia-Sampana']) }}">Cathy Garcia-Sampana</a>
        <a href="{{ route('movies.index', ['director'=>'Antoinette Jadaone']) }}">Antoinette Jadaone</a>
        <a href="{{ route('movies.index', ['director'=>'Jerrold Tarog']) }}">Jerrold Tarog</a>
        <a href="{{ route('movies.index', ['director'=>'Erik Matti']) }}">Erik Matti</a>
    @else
        <a href="{{ route('movies.index', ['genre'=>$genre]) }}">All Directors</a>
        <a href="{{ route('movies.index', ['genre'=>$genre,'director'=>'Cathy Garcia-Sampana']) }}">Cathy Garcia-Sampana</a>
        <a href="{{ route('movies.index', ['genre'=>$genre,'director'=>'Antoinette Jadaone']) }}">Antoinette Jadaone</a>
        <a href="{{ route('movies.index', ['genre'=>$genre,'director'=>'Jerrold Tarog']) }}">Jerrold Tarog</a>
        <a href="{{ route('movies.index', ['genre'=>$genre,'director'=>'Erik Matti']) }}">Erik Matti</a>
    @endif

    <p>
        <a href="{{ route('movies.index') }}">
            Clear Both Filters
        </a>
    </p>

    <table class="table table-striped table-bordered">
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Title</th>
            <th>Director</th>
            <th>Genre</th>
            <th>Year</th>
        </tr>

        @forelse ($movies as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>{{ $item['id'] }}</td>

                <td>
                    <a href="{{ route('movies.show', $item['id']) }}">
                        {{ $item['title'] }}
                    </a>
                </td>

                <td>{{ $item['director'] }}</td>

                <td>{{ $item['genre'] }}</td>

                <td>
                    {{ $item['year'] }}

                    @if ($item['year'] == 2019)
                        <span class="badge bg-primary">Featured</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">
                    No movies are available in the collection.
                </td>
            </tr>
        @endforelse

    </table>

@endsection