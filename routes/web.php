<?php

use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pengguna',[PenggunaController::class,'index'])->name('pengguna');
    Route::get('/pengguna/create',App\Http\Livewire\Pengguna\Create::class)->name('pengguna.create');
    Route::get('/pengguna/{id}/edit',App\Http\Livewire\Pengguna\Edit::class)->name('pengguna.edit');
    Route::delete('/pengguna/{id}',[PenggunaController::class,'destroy'])->name('pengguna.destroy');
    Route::post('/pengguna/{id}/active',[PenggunaController::class,'active'] )->name('pengguna.active');
    Route::post('/pengguna/{id}/disable',[PenggunaController::class,'disabled'] )->name('pengguna.disable');

});
