<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PesakitController;

Route::get('/', function () {
    //return config('app.name');
    // return env('APP_NAME');
    return view('welcome');
});

Route::get('login', [LoginController::class, 'borangLogin']);
Route::post('login', [LoginController::class, 'terimaData']);

Route::get('register', [RegisterController::class, 'borangRegister']);
Route::post('register', [RegisterController::class, 'terimaData']);

Route::get('password-reset', fn () => view('authentication.template-password-reset'));

Route::get('dashboard', DashboardController::class);

Route::get('pesakit', [PesakitController::class, 'index']);
Route::get('pesakit/daftar', [PesakitController::class, 'create']);
Route::post('pesakit/daftar', [PesakitController::class, 'store']);
Route::get('pesakit/{id}', [PesakitController::class, 'show']);
Route::get('pesakit/{id}/edit', [PesakitController::class, 'edit']);
Route::patch('pesakit/{id}/edit', [PesakitController::class, 'update']);
Route::get('pesakit/{id}/delete', [PesakitController::class, 'destroy']);

// Kalau nak guna Route::resource, kena pastikan semua method dalam controller
// turut menggunakan method resource iaitu (index, create, store, show, edit, update, destroy)
// Route::resource('pesakit', PesakitController::class);


Route::get('laporan/pesakit-dalam', function () {
    return view('laporan.pesakit-dalam');
});
Route::get('laporan/pesakit-luar', function () {
    return view('laporan.pesakit-luar');
});

Route::get('users', function () {});
Route::get('users/daftar', function () {});
