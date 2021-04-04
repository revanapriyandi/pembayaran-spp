<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\PenggunaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('dashboard');
});

Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Pengguna
    Route::get('/pengguna',[PenggunaController::class,'index'])->name('pengguna');
    Route::get('/pengguna/create',App\Http\Livewire\Pengguna\Create::class)->name('pengguna.create');
    Route::get('/pengguna/{id}/edit',App\Http\Livewire\Pengguna\Edit::class)->name('pengguna.edit');
    Route::delete('/pengguna/{id}',[PenggunaController::class,'destroy'])->name('pengguna.destroy');
    Route::post('/pengguna/{id}/active',[PenggunaController::class,'active'] )->name('pengguna.active');
    Route::post('/pengguna/{id}/disable',[PenggunaController::class,'disabled'] )->name('pengguna.disable');

    //Periode
    Route::get('/periode',[PeriodeController::class,'index'])->name('periode');
    Route::get('/periode/create',App\Http\Livewire\Periode\Create::class)->name('periode.create');
    Route::get('/periode/{id}/edit',App\Http\Livewire\Periode\Edit::class)->name('periode.edit');
    Route::delete('/periode/{id}',[PeriodeController::class,'destroy'])->name('periode.destroy');
    Route::post('/periode/{id}/active',[PeriodeController::class,'active'] )->name('periode.active');
    Route::post('/periode/{id}/disable',[PeriodeController::class,'disabled'] )->name('periode.disable');

    //Kelas
    Route::get('/kelas',[KelasController::class,'index'])->name('kelas');
    Route::get('/kelas/create',App\Http\Livewire\Kelas\Create::class)->name('kelas.create');
    Route::get('/kelas/{id}/edit',App\Http\Livewire\Kelas\Edit::class)->name('kelas.edit');
    Route::delete('/kelas/{id}',[KelasController::class,'destroy'])->name('kelas.destroy');

    //Siswa
    Route::get('/siswa',[SiswaController::class,'index'])->name('siswa');
    Route::get('/siswa/create',App\Http\Livewire\Siswa\Create::class)->name('siswa.create');
    Route::get('/siswa/{id}/edit',App\Http\Livewire\Siswa\Edit::class)->name('siswa.edit');
    Route::delete('/siswa/{id}',[SiswaController::class,'destroy'])->name('siswa.destroy');

    //Tagihan
    Route::get('/tagihan',[TagihanController::class,'index'])->name('tagihan');
    Route::get('/tagihan/create',App\Http\Livewire\Tagihan\Create::class)->name('tagihan.create');
    Route::get('/tagihan/{id}/edit',App\Http\Livewire\Tagihan\Edit::class)->name('tagihan.edit');
    Route::delete('/tagihan/{id}',[TagihanController::class,'destroy'])->name('tagihan.destroy');



});
