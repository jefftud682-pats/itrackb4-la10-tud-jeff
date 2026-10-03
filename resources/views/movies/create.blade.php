@extends('layouts.app')

@section('title', 'Add Movie')

@section('content')

    <h2>Add Movie</h2>

    <form method="POST" action="{{ route('movies.store') }}">
        @csrf

        <div class="mb-3">
            <label for="title">Movie Title</label>

            <input
                type="text"
                name="title"
                id="title"
                class="form-control"
                value="{{ old('title') }}"
            >

            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="director">Director</label>

            <select name="director" id="director" class="form-control">
                <option value="">Select Director</option>
                @foreach ($directors as $name)
                    <option value="{{ $name }}" @selected(old('director') === $name)>{{ $name }}</option>
                @endforeach
            </select>

            @error('director')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="genre">Genre</label>

            <select name="genre" id="genre" class="form-control">
                <option value="">Select Genre</option>
                @foreach ($genres as $name)
                    <option value="{{ $name }}" @selected(old('genre') === $name)>{{ $name }}</option>
                @endforeach
            </select>

            @error('genre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="year">Year</label>

            <input
                type="number"
                name="year"
                id="year"
                class="form-control"
                value="{{ old('year') }}"
            >

            @error('year')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Add Movie
        </button>

        <a href="{{ route('movies.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>

@endsection