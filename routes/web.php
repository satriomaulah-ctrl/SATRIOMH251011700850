<?php

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.home');
});

Route::get('/profile', [MahasiswaController::class, 'index']);

// Halaman publik: cuma lihat daftar dan detail
Route::resource('project', ProjectController::class)->only(['index', 'show']);

Route::get('/about', function () {
    return view('page.about');
});

// Halaman admin: CRUD project
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('projects', AdminProjectController::class)->except(['show']);
});