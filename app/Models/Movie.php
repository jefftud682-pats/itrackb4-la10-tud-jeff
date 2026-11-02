<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'director',
        'genre_id',
        'year',
        'is_showing',
        'runtime'
    ];

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'is_showing' => 'boolean',
        ];
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}
