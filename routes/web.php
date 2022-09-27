<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return config('app.name');
    // return env('APP_NAME');
    return view('welcome');
});
Route::get('login', fn () => view('authentication.template-login'));
Route::get('register', fn () => view('authentication.template-register'));
Route::get('password-reset', fn () => view('authentication.template-password-reset'));

Route::get('dashboard', function () {
    return view('template-dashboard');
});

Route::get('pesakit', function() {

    $title = 'Halaman Senarai Pesakit';
    $tarikhToday = date('d-m-Y');

    $senaraiPesakit = [
        ['id' => 1, 'nama' => 'Ali Bin Abu', 'nokp' => '808080808080'],
        ['id' => 2, 'nama' => 'Ahmad Bin Abu', 'nokp' => '7070707070770'],
        ['id' => 3, 'nama' => 'Jamal Bin Abu', 'nokp' => '808080808080'],
        ['id' => 4, 'nama' => 'Siti Bin Abu', 'nokp' => '808080808080'],
        ['id' => 5, 'nama' => 'Ah Leong Bin Abu', 'nokp' => '808080808080'],
        ['id' => 6, 'nama' => 'Sammy Bin Abu', 'nokp' => '808080808080'],
        ['id' => 7, 'nama' => 'John Bin Abu', 'nokp' => '808080808080'],
        ['id' => 8, 'nama' => 'Smith Bin Abu', 'nokp' => '808080808080'],
        ['id' => 9, 'nama' => 'Maria Bin Abu', 'nokp' => '808080808080'],
        ['id' => 10, 'nama' => 'Ipin Bin Abu', 'nokp' => '808080808080'],
    ];

    //return view('pesakit.template-index');
    // Cara 1 Pass Data Kepada Template
    // return view('pesakit.template-index')
    // ->with('pesakitList', $senaraiPesakit)
    // ->with('title', $title)
    // ->with('tarikhHariIni', $tarikhToday);
    // Cara 2 Pass Data Kepada Template
    // return view('pesakit.template-index', [
    //     'pesakitList' => $senaraiPesakit,
    //     'title' => $title,
    //     'tarikhHariIni' => $tarikhToday
    // ]);
    //Cara 3 Pass Data Kepada Template
    return view('pesakit.template-index', compact('senaraiPesakit', 'title', 'tarikhToday'));
});

Route::get('pesakit/daftar', function() {
    return view('pesakit.template-daftar');
});

Route::get('laporan/pesakit-dalam', function () {
    return view('laporan.pesakit-dalam');
});
Route::get('laporan/pesakit-luar', function () {
    return view('laporan.pesakit-luar');
});

Route::get('users', function () {});
Route::get('users/daftar', function () {});
