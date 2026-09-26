<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
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

    private function movies()
    {
        return [
            1 => [
                'id' => 1,
                'title' => 'Hello, Love, Goodbye',
                'director' => 'Cathy Garcia-Sampana',
                'genre' => 'Romance',
                'year' => 2019,
            ],
            2 => [
                'id' => 2,
                'title' => 'Four Sisters and a Wedding',
                'director' => 'Cathy Garcia-Sampana',
                'genre' => 'Family',
                'year' => 2013,
            ],
            3 => [
                'id' => 3,
                'title' => 'Seven Sundays',
                'director' => 'Cathy Garcia-Sampana',
                'genre' => 'Family',
                'year' => 2017,
            ],
            4 => [
                'id' => 4,
                'title' => 'That Thing Called Tadhana',
                'director' => 'Antoinette Jadaone',
                'genre' => 'Romance',
                'year' => 2014,
            ],
            5 => [
                'id' => 5,
                'title' => 'Heneral Luna',
                'director' => 'Jerrold Tarog',
                'genre' => 'Historical',
                'year' => 2015,
            ],
            6 => [
                'id' => 6,
                'title' => 'On the Job',
                'director' => 'Erik Matti',
                'genre' => 'Crime',
                'year' => 2013,
            ],
        ];
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
}