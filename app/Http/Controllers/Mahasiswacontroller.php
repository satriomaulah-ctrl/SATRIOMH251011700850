<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //
    public function index()
    {
        $mahasiswa = [
        'status' => 'Aktif',
        'nama' => 'Satrio Maula Hafiz',
        'nim' => '2510114013',
        'prodi' => 'sistem informasi',
        'email' => 'satriohafiz0307@gmail.com',
        'kampus' => 'Universitas Pamulang',
    ];

        return view('page.profile', compact('mahasiswa'));
    }
}