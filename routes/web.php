<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/moviess/featured', [ MovieController::class, 'featured'])
    ->name('movies.featured');

Route::get('/moviess/filter/{value?}', [MovieController::class, 'filter'])
    ->name('movies.filter');

Route::resource('movies', MovieController::class)
    ->only(['index', 'show']);

