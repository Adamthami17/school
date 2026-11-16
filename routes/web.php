<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Page d'accueil (publique)
Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

// Routes protégées : il faut être connecté (Laravel Breeze)
Route::middleware(['auth'])->group(function () {
    // Breeze redirige vers "dashboard" après connexion
    Route::get('/dashboard', function () {
        return redirect()->route('students.index');
    })->name('dashboard');

    // CRUD des étudiants
    Route::resource('students', StudentController::class);
});

// Routes d'authentification générées par Breeze (register, login, logout...)
require __DIR__ . '/auth.php';
