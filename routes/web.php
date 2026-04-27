<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\KadesController;
use App\Http\Controllers\PublicController;

// Halaman Publik
Route::get('/', [PublicController::class, 'beranda']);
Route::get('/layanan', [PublicController::class, 'layanan']);
Route::get('/informasi', [PublicController::class, 'informasi']);

// Autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// WARGA
Route::middleware(['auth', 'role:warga'])->prefix('warga')->name('warga.')->group(function () {
    Route::get('/dashboard', [WargaController::class, 'dashboard'])->name('dashboard');
    Route::get('/pengajuan', [WargaController::class, 'formPengajuan'])->name('pengajuan');
    Route::post('/pengajuan', [WargaController::class, 'submitPengajuan']);
    Route::get('/riwayat', [WargaController::class, 'riwayat'])->name('riwayat');
    Route::get('/surat/cetak/{id}', [WargaController::class, 'cetakSurat'])->name('cetak');
});

// STAFF
Route::middleware(['auth', 'role:staff'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('dashboard');
    Route::get('/masuk', [StaffController::class, 'suratMasuk'])->name('masuk');
    Route::post('/proses/{id}', [StaffController::class, 'prosesSurat'])->name('proses');
    Route::get('/diproses', [StaffController::class, 'suratDiproses'])->name('diproses');
    Route::get('/revisi', [StaffController::class, 'suratRevisi'])->name('revisi');
    Route::post('/revisi/kirim/{id}', [StaffController::class, 'kirimRevisi'])->name('kirim');
});

// KADES
Route::middleware(['auth', 'role:kades'])->prefix('kades')->name('kades.')->group(function () {
    Route::get('/dashboard', [KadesController::class, 'dashboard'])->name('dashboard');
    Route::get('/menunggu', [KadesController::class, 'menungguPersetujuan'])->name('menunggu');
    Route::get('/menunggu/{id}/review', [KadesController::class, 'reviewSurat'])->name('review');
    Route::post('/menunggu/{id}/setujui', [KadesController::class, 'setujuiSurat'])->name('setujui');
    Route::post('/menunggu/{id}/tolak', [KadesController::class, 'tolakSurat'])->name('tolak');
    Route::get('/riwayat', [KadesController::class, 'riwayat'])->name('riwayat');
});