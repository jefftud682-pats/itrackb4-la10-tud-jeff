<?php

namespace App\Http\Controllers;

class MovieController extends Controller
{
    public function index()
    {
        $movies = $this->movies();

        return view('movies.index', [
            'movies' => $movies
        ]);
    }

    public function show($id)
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

        $item = $movies[3];

        return view('movies.featured', [
            'item' => $item
        ]);
    }

    public function filter($value = null)
    {
        $movies = $this->movies();

        if ($value === null) {
            return view('movies.filter', [
                'movies' => $movies,
                'activeFilter' => 'All'
            ]);
        }

        $filtered = [];

        foreach ($movies as $item) {
            if ($item['genre'] === $value) {
                $filtered[] = $item;
            }
        }

        return view('movies.filter', [
            'movies' => $filtered,
            'activeFilter' => $value
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
}