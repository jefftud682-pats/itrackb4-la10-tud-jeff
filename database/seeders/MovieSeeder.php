<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        Movie::create(['title' => 'Hello, Love, Goodbye', 'director' => 'Cathy Garcia-Sampana', 'genre' => 'Romance', 'year' => 2019]);
        Movie::create(['title' => 'Four Sisters and a Wedding', 'director' => 'Cathy Garcia-Sampana', 'genre' => 'Family', 'year' => 2013]);
        Movie::create(['title' => 'Seven Sundays', 'director' => 'Cathy Garcia-Sampana', 'genre' => 'Family', 'year' => 2017]);
        Movie::create(['title' => 'That Thing Called Tadhana', 'director' => 'Antoinette Jadaone', 'genre' => 'Romance', 'year' => 2014]);
        Movie::create(['title' => 'Heneral Luna', 'director' => 'Jerrold Tarog', 'genre' => 'Historical', 'year' => 2015]);
       
    }
}