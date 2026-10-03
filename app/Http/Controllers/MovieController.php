<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    private array $directors = [
        'Cathy Garcia-Sampana',
        'Antoinette Jadaone',
        'Jerrold Tarog',
        'Erik Matti',
    ];

    private array $genres = ['Romance', 'Family', 'Historical', 'Crime'];

    public function index(Request $request)
    {
        $movies = $this->movies();

        $genre = $request->query('genre', 'all');
        $director = $request->query('director', 'all');

        $filtered = [];

        foreach ($movies as $item) {
            $genreMatch = $genre === 'all' || $item['genre'] === $genre;
            $directorMatch = $director === 'all' || $item['director'] === $director;

            if ($genreMatch && $directorMatch) {
                $filtered[] = $item;
            }
        }

        return view('movies.index', [
            'movies' => $filtered,
            'genre' => $genre,
            'director' => $director
        ]);
    }

    public function create()
    {
        return view('movies.create', [
            'directors' => $this->directors,
            'genres' => $this->genres,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'director' => 'required|in:' . implode(',', $this->directors),
            'genre' => 'required|in:' . implode(',', $this->genres),
            'year' => 'required|numeric|min:1900|max:2026'
        ]);

        $movies = $this->movies();

        $id = 1;

        foreach ($movies as $item) {
            if ($item['id'] >= $id) {
                $id = $item['id'] + 1;
            }
        }

        $data['id'] = $id;

        $movies[$id] = $data;

        $this->saveMovies($movies);

        return redirect()->route('movies.index')
            ->with('success', 'Movie added successfully.');
    }

    public function show(string $id)
    {
        $movies = $this->movies();

        if (!isset($movies[$id])) {
            abort(404);
        }

        $item = $movies[$id];

        return view('movies.show', [
            'item' => $item
        ]);
    }

    public function featured()
    {
        $movies = $this->movies();

        $item = $movies[1] ?? reset($movies);

        if (!$item) {
            abort(404);
        }

        return view('movies.featured', [
            'item' => $item
        ]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    private function movies()
    {
        $path = storage_path('app/private/movies.json');

        // If movies.json does not exist yet (it is git-ignored),
        // create it from the starting data.
        if (!file_exists($path)) {
            $this->saveMovies($this->defaultMovies());
        }

        return json_decode(file_get_contents($path), true);
    }

    private function saveMovies(array $movies)
    {
        file_put_contents(
            storage_path('app/private/movies.json'),
            json_encode($movies, JSON_PRETTY_PRINT)
        );
    }

    private function defaultMovies()
    {
        return [
            1 => ['id' => 1, 'title' => 'Hello, Love, Goodbye', 'director' => 'Cathy Garcia-Sampana', 'genre' => 'Romance', 'year' => 2019],
            2 => ['id' => 2, 'title' => 'Four Sisters and a Wedding', 'director' => 'Cathy Garcia-Sampana', 'genre' => 'Family', 'year' => 2013],
            3 => ['id' => 3, 'title' => 'Seven Sundays', 'director' => 'Cathy Garcia-Sampana', 'genre' => 'Family', 'year' => 2017],
            4 => ['id' => 4, 'title' => 'That Thing Called Tadhana', 'director' => 'Antoinette Jadaone', 'genre' => 'Romance', 'year' => 2014],
            5 => ['id' => 5, 'title' => 'Heneral Luna', 'director' => 'Jerrold Tarog', 'genre' => 'Historical', 'year' => 2015],
            6 => ['id' => 6, 'title' => 'On the Job', 'director' => 'Erik Matti', 'genre' => 'Crime', 'year' => 2013],
        ];
    }
}