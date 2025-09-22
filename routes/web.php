<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

Route::get('/', function () {
    return view('welcome');
});

// Minimal placeholder named routes so views that reference them do not error.
// These intentionally redirect to the home page and should be replaced by
// real auth controllers when authentication is implemented.
Route::get('/login', function () {
    return redirect('/');
})->name('login');

Route::get('/register', function () {
    return redirect('/');
})->name('register');

// Language Switcher
Route::post('/language/switch', [LanguageController::class, 'switch'])->name('language.switch');
