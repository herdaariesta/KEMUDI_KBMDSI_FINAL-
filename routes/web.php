<?php

use App\Http\Controllers\ProgramKerjaController;
use Illuminate\Support\Facades\Route;

// Redirect root to Manajemen Proker
Route::get('/', [ProgramKerjaController::class, 'index'])->name('home');

// Resource route for Manajemen Program Kerja
Route::resource('proker', ProgramKerjaController::class);

// Kas & Keuangan route placeholder (will be fully integrated in feat/manajemen-kas)
Route::get('/kas', function () {
    return redirect()->route('proker.index');
})->name('kas.index');
