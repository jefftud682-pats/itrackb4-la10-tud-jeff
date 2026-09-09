@extends('layouts.app')

@section('title', 'Movie List')

@section('content')

    <h2>Movie List</h2>

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