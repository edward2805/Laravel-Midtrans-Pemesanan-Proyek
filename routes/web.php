<?php

use App\Models\Post;
use App\Models\Barang;
use App\Models\category;
use App\Models\Pesanan;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\OngkirController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\CetakLaporanController;


use App\Http\Livewire\Bayar;

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


Route::get('/', [ BarangController::class, 'index' ]);

Route::resource('/DetHome', DetailBarangController::class)->middleware('auth');

Route::get('/barang/{Barang:slug}', [ BarangController::class, 'tampil' ]);

Route::get('/categories', function() {
    return view('categories', [
        "active" => "Home",
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

Route::get('/kategori/{category:slug}', function(category $category){
    return view('kategori', [
        "active" => "Home",
        'title' => $category->name,
        'barangs' => $category->barangs,
        'category' => $category->name
    ]);
} );



Route::get('/about', function () {
    return view('about' ,[
        "title" => "About",
        "active" => "About"
    ]);
});

Route::get('/blog', function () {
    return view('blog' ,[
        "title" => "Blog",
        "active" => "Blog"
    ]);
});





Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);





// // route pada dashboard

Route::resource('/dashboardAdmin', AdminController::class)->except('show')->middleware('admin');

Route::get('/dashboard/post/checkSlug', [DashboardController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard', DashboardController::class)->middleware('auth');
Route::get('/hapus/{id}', [DashboardController::class, 'hapusData'])->middleware('auth');
Route::get('/tampiledit/{id}', [DashboardController::class, 'tampiledit'])->middleware('auth');
Route::post('/editdata/{id}', [DashboardController::class, 'ngedit'])->middleware('auth');
Route::resource('/dahsboard/detail', DetailTransaksiController::class)->middleware('auth');

Route::get('/dashboard/detail/cetakpdf', [CetakLaporanController::class, 'cetak']);

// route pada pemesanan barang user
Route::get('/pesan/{Barang:id}', [PesanController::class, 'index'])->middleware('user');
Route::post('/pesan/{Barang:id}', [PesanController::class, 'pesan'])->middleware('auth');
Route::get('check-out', [PesanController::class, 'check_out'])->middleware('user');
Route::delete('check-out/{id}', [PesanController::class, 'delete']);
Route::get('konfirmasi-check-out', [PesanController::class, 'konfirmasi']);

// history pemesanan 

Route::get('/history', [HistoryController::class, 'index'])->middleware('auth');
Route::get('/bayar/{id}', [HistoryController::class, 'bayar'])->middleware('auth');
Route::get('/status/{id}', [HistoryController::class, 'status'])->middleware('auth');


// route profile
Route::get('profil', [ProfilController::class, 'index'])->middleware('auth');
Route::post('profil', [ProfilController::class, 'update']);