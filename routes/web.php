<?php

use App\Http\Controllers\AnakController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PerkembanganAnakController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TahunAjaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin,kepsek'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::resource('/perkembangan', PerkembanganAnakController::class);
    //get
    Route::get('/get-semester/{tahunAjaranId}', [PerkembanganAnakController::class, 'getSemester']);
    Route::get('/get-kelas/{tahunAjaranId}', [PerkembanganAnakController::class, 'getKelas']);
    Route::get('/get-anak/{kelasId}', [PerkembanganAnakController::class, 'getAnak']);

    Route::get('/evaluasi', [EvaluasiController::class, 'index'])->name('evaluasi.index');
    Route::post('/evaluasi/prediksi', [EvaluasiController::class, 'prediksiSemua'])->name('evaluasi.prediksi');
    Route::get('/evaluasi/download-excel', [EvaluasiController::class, 'downloadExcelGrouped'])->name('evaluasi.download.excel');
    Route::get('/evaluasi/download-pdf', [EvaluasiController::class, 'downloadPDFGrouped'])->name('evaluasi.download.pdf');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::resource('/user', UserController::class);
    Route::resource('/tahun-ajaran', TahunAjaranController::class);
    Route::resource('/semester', SemesterController::class);
    Route::resource('/kelas', KelasController::class)->parameters([
        'kelas' => 'kelas'
    ]);
    Route::resource('/anak', AnakController::class);
});
