<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// <<<<<<< HEAD
// Route::get('/', [HomeController::class, 'index'])->name('home');
// // =======
// Route::get('/', function () {
//     return view('welcome');
// });
// >>>>>>> 332dcfa6cec12cd8a651addb70a84cfaa5e85df0

Route::get('/home', function () {
    return view('home');
});
