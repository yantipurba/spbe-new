<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\PagesController::class, 'dashboard']);
Route::get('/register_verifikator', [App\Http\Controllers\PagesController::class, 'register_verifiaktor']);
Route::get('/list', [App\Http\Controllers\PagesController::class, 'listHomestay']);
Route::get('/home', [App\Http\Controllers\PagesController::class, 'home']);


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/tambah_user', [App\Http\Controllers\PagesController::class, 'tambah_user']);
    Route::post('/create_user', [App\Http\Controllers\PagesController::class, 'create_user']);
});

Route::middleware(['auth', 'verifikator'])->group(function () {
    // Route::post('/bank/destroy/{id}', [App\Http\Controllers\BankController::class, 'destroy']);
    // aplikasi
    Route::get('/aplikasi_verifikator', [App\Http\Controllers\AplikasiController::class, 'index_verifikator']);
    Route::get('/aplikasi/setuju/{id}', [App\Http\Controllers\AplikasiController::class, 'setuju']);
    // Route::get('/aplikasi/ditolak/{id}', [App\Http\Controllers\AplikasiController::class, 'ditolak']);
    Route::post('/aplikasi/alasan/create/{id}', [App\Http\Controllers\AplikasiController::class, 'ditolak']);

    // Route::post('/create_aplikasi', [App\Http\Controllers\AplikasiController::class, 'store']);


    Route::get('/hosting_verifikator', [App\Http\Controllers\HostingController::class, 'index_verifikator']);
    Route::get('/hosting/setuju/{id}', [App\Http\Controllers\HostingController::class, 'setuju']);
    // Route::get('/hosting/ditolak/{id}', [App\Http\Controllers\HostingController::class, 'ditolak']);
    Route::post('/hosting/alasan/create/{id}', [App\Http\Controllers\HostingController::class, 'ditolak']);
    
    
    Route::get('/rekomendasi_verifikator', [App\Http\Controllers\RekomendasiController::class, 'index_verifikator']);
    Route::get('/rekomendasi/setuju/{id}', [App\Http\Controllers\RekomendasiController::class, 'setuju']);
    Route::post('/rekomendasi/alasan/create/{id}', [App\Http\Controllers\RekomendasiController::class, 'ditolak']);

});

Route::middleware(['auth', 'user'])->group(function () {

    // aplikasi
    Route::get('/aplikasi', [App\Http\Controllers\AplikasiController::class, 'index']);
    Route::get('/tambah_aplikasi', [App\Http\Controllers\AplikasiController::class, 'create']);
    Route::post('/create_aplikasi', [App\Http\Controllers\AplikasiController::class, 'store']);
    Route::get('/aplikasi/edit/{id}', [App\Http\Controllers\AplikasiController::class, 'edit']);
    Route::post('/aplikasi/update/{id}', [App\Http\Controllers\AplikasiController::class, 'update']);
    Route::get('/aplikasi/hapus/{id}', [App\Http\Controllers\AplikasiController::class, 'destroy']);

    Route::get('/hosting', [App\Http\Controllers\HostingController::class, 'index']);
    Route::get('/tambah_hosting', [App\Http\Controllers\HostingController::class, 'create']);
    Route::post('/create_hosting', [App\Http\Controllers\HostingController::class, 'store']);
    Route::get('/hosting/edit/{id}', [App\Http\Controllers\HostingController::class, 'edit']);
    Route::post('/hosting/update/{id}', [App\Http\Controllers\HostingController::class, 'update']);
    Route::get('/hosting/hapus/{id}', [App\Http\Controllers\HostingController::class, 'destroy']);

    Route::get('/rekomendasi', [App\Http\Controllers\RekomendasiController::class, 'index']);
    Route::get('/tambah_rekomendasi', [App\Http\Controllers\RekomendasiController::class, 'create']);
    Route::post('/create_rekomendasi', [App\Http\Controllers\RekomendasiController::class, 'store']);
    Route::get('/rekomendasi/edit/{id}', [App\Http\Controllers\RekomendasiController::class, 'edit']);
    Route::post('/rekomendasi/update/{id}', [App\Http\Controllers\RekomendasiController::class, 'update']);
    Route::get('/rekomendasi/hapus/{id}', [App\Http\Controllers\RekomendasiController::class, 'destroy']);
});
