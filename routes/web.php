<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Fitur Pencarian
Route::get('/', [SuratController::class, 'index'])->name('surats.index');
//Fitur Tambah Surat
Route::get('/create', [SuratController::class, 'create'])->name('surats.create');
Route::post('/store', [SuratController::class, 'store'])->name('surats.store');
//Fitur Mengubah Surat
Route::get('/surats/{surat}/edit', [SuratController::class, 'edit'])->name('surats.edit');
Route::put('/surats/{surat}', [SuratController::class, 'update'])->name('surats.update');
//Fitur Hapus Surat
Route::delete('/surats/{surat}', [SuratController::class, 'destroy'])->name('surats.destroy');
//Fitur Unduh Surat
Route::get('/surats/{surat}/download', [SuratController::class, 'download'])->name('surats.download');
//Fitur Lihat Surat
Route::get('/surats/{surat}', [SuratController::class, 'show'])->name('surats.show');
//Fitur About
Route::view('/about', 'about')->name('about');
//Kategori
Route::get('/kategoris', [KategoriController::class, 'index'])->name('kategoris.index');
Route::get('/kategoris/create', [KategoriController::class, 'create'])->name('kategoris.create');
Route::post('/kategoris', [KategoriController::class, 'store'])->name('kategoris.store');
Route::get('/kategoris/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategoris.edit');
Route::put('/kategoris/{kategori}', [KategoriController::class, 'update'])->name('kategoris.update');
Route::delete('/kategoris/{kategori}', [KategoriController::class, 'destroy'])->name('kategoris.destroy');

