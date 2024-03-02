<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProdukController;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[AuthController::class,'index']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout']);


Route::middleware('hakadmin')->group(function(){
    Route::get('/admindashboard',[AdminController::class,'index']);

    Route::get('/produk',[ProdukController::class,'index']);
    Route::post('/produk/store',[ProdukController::class,'store']);
    Route::get('/produk/delete/{id}',[ProdukController::class,'delete']);
    Route::get('/produk/edit/{id}',[ProdukController::class,'edit']);
    Route::post('/produk/update/{id}',[ProdukController::class,'update']);

    Route::get('/kategori',[KategoriController::class,'index']);
    Route::post('/kategori/store',[KategoriController::class,'store']);
    Route::get('/kategori/edit/{id_kategori_produk}',[KategoriController::class,'edit']);
    Route::post('/kategori/update/{id_kategori_produk}',[KategoriController::class,'update']);

    Route::get('/pembelian',[PembelianController::class,'index']);
    Route::get('/keranjang/tambah/{id}',[PembelianController::class,'addkeranjang']);
    Route::get('/carts',[PembelianController::class,'carts']);
    Route::post('/belisekarang',[PembelianController::class,'beli']);
    Route::get('/pilih/{id}',[PembelianController::class,'pilih']);
    Route::post('/tambahstok/{id}',[PembelianController::class,'addstok']);
    Route::get('/laporan/pembelian',[PembelianController::class,'laporanpembelian']);
    Route::get('/laporan/pembelian/search', [PembelianController::class, 'search'])->name('laporan.pembelian.search');
    Route::get('/cetak/pembelian',[PembelianController::class,'cetakPDF'])->name('laporan.pembelian.cetak');
   
    Route::get('/petugas/create',[PetugasController::class,'create']);
    Route::post('/petugas/store',[PetugasController::class,'store']);
});

Route::middleware('hakpetugas')->group(function()
{
    Route::get('/petugas',[PetugasController::class,'index']);
    Route::get('/tabproduk',[PetugasController::class,'tabproduk']);

    Route::post('/diskon/create',[DiskonController::class,'create']);
});

Route::middleware('ceklogin')->group(function()
{
    Route::get('/cart',[PenjualanController::class,'cart']);
    Route::delete('/cart/{id_produk}',[PenjualanController::class,'removeFromCart'])->name('removeFromCart');
    Route::post('/addToCart/{id}',[PenjualanController::class,'addToCart']);
    Route::get('/addToCart/{id}',[PenjualanController::class,'addToCart1']);
    Route::post('/checkout',[PenjualanController::class,'checkout']);
    Route::get('/autocomplete',[PenjualanController::class,'autocomplete'])->name('autocomplete');

    Route::get('/penjualan',[PenjualanController::class,'index']);
    Route::get('/cari',[PenjualanController::class,'cari']);
    Route::get('/invoice/cetak',[PenjualanController::class,'cetak_pdf'])->name('invoice.cetak');
    
    Route::get('/diskon',[DiskonController::class,'index']);

    Route::get('/laporan/penjualan',[PenjualanController::class,'laporanpenjualan']);
    Route::get('/laporan/search', [PenjualanController::class, 'search'])->name('laporan.search');
    Route::get('/cetak',[PenjualanController::class,'cetakPDF'])->name('laporan.cetak');
    
    Route::get('/pelanggan',[PelangganController::class,'index']);
    Route::post('/pelanggan/create',[PelangganController::class,'store']);
    Route::get('/pelanggan/edit/{id}',[PelangganController::class,'edit']);
    Route::post('/pelanggan/update/{id}',[PelangganController::class,'update']);
    Route::delete('/pelanggan/delete/{id}',[PelangganController::class,'delete']);
    
    Route::get('/laporan/penjualan/petugas',[PetugasController::class,'laporanpenjualan']);
    Route::get('/laporan/penjualan/search', [PetugasController::class, 'search'])->name('laporan.penjualan.search');
    Route::get('/cetak/laporan',[PetugasController::class,'cetakPDF'])->name('laporan.penjualan.cetak');
});












