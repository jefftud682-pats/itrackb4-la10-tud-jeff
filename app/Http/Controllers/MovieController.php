<?php

namespace App\Http\Controllers;

use App\Models\Movie;
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
        $movies = Movie::all();

        $genre = $request->query('genre', 'all');
        $director = $request->query('director', 'all');

        return view('movies.index', compact('movies', 'genre', 'director'));
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

        Movie::create($data);

        return redirect()->route('movies.index')
            ->with('success', 'Movie added successfully.');
    }

    public function show(string $id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies.show', ['item' => $movie]);
    }

    public function featured()
    {
        $item = Movie::findOrFail(1);

        return view('movies.featured', ['item' => $item]);
    }
}