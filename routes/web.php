<?php

use App\Http\Controllers\KasController;
use App\Http\Controllers\ProgramKerjaController;
use Illuminate\Support\Facades\Route;

// Redirect root to Manajemen Proker
Route::get('/', [ProgramKerjaController::class, 'index'])->name('home');

// Resource route for Manajemen Program Kerja
Route::resource('proker', ProgramKerjaController::class);

// Resource route for Manajemen Kas & Keuangan
Route::resource('kas', KasController::class)->parameters(['kas' => 'ka']);

// Route for updating Iuran Pengurus status
Route::patch('iuran/{iuran}', [KasController::class, 'updateIuran'])->name('iuran.update');
