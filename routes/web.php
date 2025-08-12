<?php


use Illuminate\Support\Facades\Route;
use App\livewire\Homepage;
use App\livewire\ListMovies;


Route::get('/', Homepage::class);
Route::get('/movies', ListMovies::class);



// require __DIR__.'/auth.php';
