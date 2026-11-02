
@extends('layouts.app')

@section('title', 'Movie List')

@section('content')

    <h2>Movie List</h2>

    <p>
        <a href="{{ route('movies.create') }}" class="btn btn-primary">
            Add Movie
        </a>
    </p>

    <p>
        <strong>Genre:</strong>
        {{ $genre === 'all' ? 'All Genres' : ($genres->firstWhere('id', $genre)?->name ?? 'Unknown') }}
        |
        <strong>Director:</strong> {{ $director }}
    </p>

    <h5>Filter by Genre</h5>

    @foreach ($genres as $itemGenre)
        <a href="{{ route('movies.index', array_filter([
            'genre' => $itemGenre->id,
            'director' => $director !== 'all' ? $director : null,
        ])) }}">
            {{ $itemGenre->name }}
        </a>
    @endforeach

    <a href="{{ route('movies.index', array_filter([
        'director' => $director !== 'all' ? $director : null,
    ])) }}">
        All Genres
    </a>

    <br><br>

    <h5>Filter by Director</h5>

    @php
        $directors = [
            'Cathy Garcia-Sampana',
            'Antoinette Jadaone',
            'Jerrold Tarog',
            'Erik Matti',
        ];
    @endphp

    <a href="{{ route('movies.index', array_filter([
        'genre' => $genre !== 'all' ? $genre : null,
    ])) }}">
        All Directors
    </a>

    @foreach ($directors as $itemDirector)
        <a href="{{ route('movies.index', array_filter([
            'genre' => $genre !== 'all' ? $genre : null,
            'director' => $itemDirector,
        ])) }}">
            {{ $itemDirector }}
        </a>
    @endforeach

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
                <td>{{ $item->genre->name }}</td>

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

    <p>Queries: {{ count(\Illuminate\Support\Facades\DB::getQueryLog()) }}</p>

@endsection
