<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $romance = Genre::create(['name' => 'Romance']);
        $family = Genre::create(['name' => 'Family']);
        $historical = Genre::create(['name' => 'Historical']);
        $crime = Genre::create(['name' => 'Crime']);

        Movie::create([
            'title' => 'Hello, Love, Goodbye',
            'director' => 'Cathy Garcia-Sampana',
            'genre_id' => $romance->id,
            'year' => 2019
        ]);

        Movie::create([
            'title' => 'Four Sisters and a Wedding',
            'director' => 'Cathy Garcia-Sampana',
            'genre_id' => $family->id,
            'year' => 2013
        ]);

        Movie::create([
            'title' => 'Seven Sundays',
            'director' => 'Cathy Garcia-Sampana',
            'genre_id' => $family->id,
            'year' => 2017
        ]);

        Movie::create([
            'title' => 'That Thing Called Tadhana',
            'director' => 'Antoinette Jadaone',
            'genre_id' => $romance->id,
            'year' => 2014
        ]);

        Movie::create([
            'title' => 'Heneral Luna',
            'director' => 'Jerrold Tarog',
            'genre_id' => $historical->id,
            'year' => 2015
        ]);
    }
}
