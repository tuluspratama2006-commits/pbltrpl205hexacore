<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/contact/submit', [Controller::class, 'submit'])->name('contact.submit');
