<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa', function () {
    $mahasiswa = [
        'status' => 'Aktif',
        'nama' => 'Satrio Maula Hafiz',
        'nim' => '2510114013',
        'prodi' => 'sistem informasi',
        'email' => 'satriohafiz0307@gmail.com',
        'kampus' => 'Universitas Pamulang',
    ];
    return view('mahasiswacontroler', compact('mahasiswa'));
});