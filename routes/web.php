<?php

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
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

// Login & logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman admin: wajib login
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', function () {
        $total    = Project::count();
        $active   = Project::where('status', 'active')->count();
        $archived = Project::where('status', 'archived')->count();

        return view('admin.dashboard', compact('total', 'active', 'archived'));
    })->name('dashboard');

    Route::resource('projects', AdminProjectController::class)->except(['show']);
});