<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

// Rute untuk halaman awal (seperti index.html)
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk halaman home (tes skrining)
Route::get('/home', function () {
    return view('pages.home');
});

// Rute untuk halaman-halaman footer (jika mereka halaman statis)
Route::get('/about', function () {
    // Anda akan membuat file Blade baru untuk ini, misal: resources/views/pages/about.blade.php
    // Untuk saat ini, kita bisa arahkan ke view placeholder
    return view('pages.latarb');
});

Route::get('/pencegahan', function () {
    return view('pages.kenapaini');
});

Route::get('/sumber-daya', function () {
    return view('pages.isipiring');
});

Route::get('/disclaimer', function () {
    return view('pages.dondonts');
});


// Rute untuk menyimpan data kuesioner ke database
Route::post('/save-quiz-data', [QuizController::class, 'saveData']);