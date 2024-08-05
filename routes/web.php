<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\VotingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route to display the login form
Route::get('/login', function () {
    return view('login');
})->name('login');

// Route to handle the login form submission
Route::post('/login', [UserController::class, 'login'])->name('login.submit');

// Route to display the registration form
Route::get('/register', function () {
    return view('register');
})->name('register');

// Route to handle the registration form submission
Route::post('/register', [UserController::class, 'register'])->name('register.submit');

// Route to display the home page after successful login
Route::get('/', function () {
    return view('home');
})->name('home');

// Route to display the list of positions and the form to add a new position
Route::get('/positions', [PositionController::class, 'index'])->name('positions.index');

// Route to handle the form submission for adding a new position
Route::post('/positions', [PositionController::class, 'store'])->name('positions.store');

// Route to handle the deletion of a position
Route::delete('/positions/{id}', [PositionController::class, 'destroy'])->name('positions.destroy');

// Route to display the list of candidates and the form to add a new candidate
Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index');

// Route to handle the form submission for adding a new candidate
Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');

// Route to handle the deletion of a candidate
Route::delete('/candidates/{id}', [CandidateController::class, 'destroy'])->name('candidates.destroy');


Route::get('/voting', [VotingController::class, 'index'])->name('voting.index');

// Route to handle the vote submission
Route::post('/voting', [VotingController::class, 'store'])->name('voting.store');
// web.php
Route::get('/voting/get-id', [VotingController::class, 'getId'])->name('voting.getId');


