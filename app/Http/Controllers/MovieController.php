<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
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

    public function index()
    {
         $movies = $this->movies();

        return view('movies.index' , [
            'movies' => $movies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
