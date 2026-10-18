<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
   protected $fillable = ['title', 'director', 'genre', 'year', 'is_showing', 'runtime'];

protected function casts(): array
{
    return [
        'year' => 'integer',
        'is_showing' => 'boolean',
    ];
}
}