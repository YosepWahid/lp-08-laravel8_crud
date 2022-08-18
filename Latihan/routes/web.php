<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\TransaksiController;
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
})->name('Utama');

Route::get('/logout', [BarangController::class, 'LogOut'])->name('Logout');

// barang
Route::get('/barang', [BarangController::class, 'AllBarang'])->name('Barang');
Route::post('/tambah', [BarangController::class, 'TambahBarang'])->name('TambahB');
Route::get('/detail/barang/{id}', [BarangController::class, 'DetailBarang']);
Route::get('/hapus/barang/{id}', [BarangController::class, 'HapusBarang']);
Route::post('/ubah/barang/{id}', [BarangController::class, 'UpdateBarang']);

// category
Route::get('/category', [CategoryController::class, 'AllCategory'])->name('Category');
Route::post('/ktambah', [CategoryController::class, 'TambahKategori'])->name('TambahK');
Route::get('/category/{id}', [CategoryController::class, 'TampilKategoriUbah']);
Route::post('/ubah/category/{id}', [CategoryController::class, 'UbahKategori']);
Route::get('/sampah/kategori/{id}', [CategoryController::class, 'sampahKategori']);


// pembeli
Route::get('/pembeli', [CostumerController::class, 'AllPembeli'])->name('Pembeli');
Route::post('/ptambah', [CostumerController::class, 'TambahBeli'])->name('TambahP');
Route::get('/hapus/pembeli/{id}', [CostumerController::class, 'HapusPembeli']);
Route::get('/pembeli/{id}', [CostumerController::class, 'TampilUbah']);
Route::post('/ubah/pembeli/{id}', [CostumerController::class, 'UbahPembeli'])->name('UbahP');


// Transaksi
Route::get('/Transaksi', [TransaksiController::class, 'AllTransaksi'])->name('Transaksi');
Route::post('/ttambah', [TransaksiController::class, 'TambahTransaksi'])->name('TambahTk');
Route::get('/hapus/transaksi/{id}', [TransaksiController::class, 'HapusTransaksi']);
Route::get('/hapus/transaksi/{id}', [TransaksiController::class, 'HapusTransaksi']);
Route::get('transaksi/{id}', [TransaksiController::class, 'TampilUbah']);
Route::post('/ubah/transaksi/{id}', [TransaksiController::class, 'UbahTransaksi']);


// sampah
Route::get('/sampah', [CategoryController::class, 'AllSampah'])->name('Sampah');
Route::get('/pulih/sampah/{id}', [CategoryController::class, 'pulihSampah']);
Route::get('/hapus/sampah/{id}', [CategoryController::class, 'HapusSampah']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
