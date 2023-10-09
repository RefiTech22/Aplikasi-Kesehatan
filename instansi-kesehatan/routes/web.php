<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\Trx_RegistrasiController;


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

Route::get('/', [PostController::class, 'index']);

// Route::get('/form', function () {
//     return view('form', [
//         "title" => "form"
//     ]);
// });

// Route::get('/table', function () {
//     return view('table', [
//         "title" => "table"
//     ]);
// });

//Route Data Pasien
Route::get('/Data_Pasien/pasien', [PasienController::class, 'index']);

Route::get('/Data_Pasien/tambah_pasien', [PasienController::class, 'tambah']);

Route::post('/insert_pasien', [PasienController::class, 'insert']);

Route::get('/Data_Pasien/edit_pasien/{id}', [PasienController::class, 'edit']);

Route::post('/pasien_update',[PasienController::class, 'update' ]);

Route::get('/hapus_pasien/{id}',[PasienController::class, 'delete' ]);

//Route Data Layanan
Route::get('/Data_Layanan/layanan', [LayananController::class, 'index']);

Route::get('/Data_Layanan/tambah_layanan', [LayananController::class, 'tambah']);

Route::post('/insert_layanan', [LayananController::class, 'insert']);

Route::get('/Data_Layanan/edit_layanan/{id}', [LayananController::class, 'edit']);

Route::post('/layanan_update',[LayananController::class, 'update' ]);

Route::get('/hapus_layanan/{id}',[LayananController::class, 'delete' ]);

//Route Data Pembayaran
Route::get('/Data_Pembayaran/pembayaran', [PembayaranController::class, 'index']);

Route::get('/Data_Pembayaran/tambah_pembayaran', [PembayaranController::class, 'tambah']);

Route::post('/insert_pembayaran', [PembayaranController::class, 'insert']);

Route::get('/Data_Pembayaran/edit_pembayaran/{id}', [PembayaranController::class, 'edit']);

Route::post('/pembayaran_update',[PembayaranController::class, 'update' ]);

Route::get('/hapus_pembayaran/{id}',[PembayaranController::class, 'delete' ]);

//Route Data Petugas
Route::get('/Data_Petugas/petugas', [PetugasController::class, 'index']);

Route::get('/Data_Petugas/tambah_petugas', [PetugasController::class, 'tambah']);

Route::post('/insert_petugas', [PetugasController::class, 'insert']);

Route::get('/Data_Petugas/edit_petugas/{id}', [PetugasController::class, 'edit']);

Route::post('/petugas_update',[PetugasController::class, 'update' ]);

Route::get('/hapus_petugas/{id}',[PetugasController::class, 'delete' ]);

//Route Data Registrasi
Route::get('/Data_Registrasi/registrasi', [Trx_RegistrasiController::class, 'index']);

Route::get('/Data_Registrasi/tambah_registrasi', [Trx_RegistrasiController::class, 'tambah']);

Route::post('/insert_registrasi', [Trx_RegistrasiController::class, 'insert']);

Route::get('/Data_Registrasi/edit_registrasi/{id}', [Trx_RegistrasiController::class, 'edit']);

Route::post('/registrasi_update',[Trx_RegistrasiController::class, 'update' ]);

Route::get('/hapus_registrasi/{id}',[Trx_RegistrasiController::class, 'delete' ]);

Route::get('/waktu_mulai_pelayanan/{id}',[Trx_RegistrasiController::class, 'waktu_mulai_pelayanan' ]);

Route::get('/waktu_selesai_pelayanan/{id}',[Trx_RegistrasiController::class, 'waktu_selesai_pelayanan' ]);

//Route Data Laporan
Route::get('/Data_Laporan/laporan', [LaporanController::class, 'index']);