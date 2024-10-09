<?php

use App\Models\Cart;
use App\Models\Iklan;
use App\Models\Barang;
use App\Models\Berita;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\dataController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\dataPenjualController;
use App\Http\Controllers\iotController;
use App\Http\Controllers\lamaranSayaController;
use App\Http\Controllers\permintaanLamaranController;
use App\Http\Controllers\dataLamaranController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
        'nama_barang' => Barang::all(),
        'iklans' => Iklan::all(),
        'berita'=>Berita::all()

    ]);
});

Route::get('/katalog', function () {
    return view('katalog', [
        'title' => 'Katalog',

    ]);
});

Route::get('/home', function () {
    return view('home', [
        'title' => 'Home',
        'nama_barang' => Barang::all(),
        'iklans' => Iklan::all(),
        'berita'=>Berita::all()
    ]);
});

Route::get('/cari_kerja', [BarangController::class, 'index'])->name('cari_kerja.fetch');

Route::get('/tentang_kami', function () {
    return view('tentang_kami', [
        'title' => 'Tentang Kami'
    ]);
});

Route::get('/detail_kerja/{barang:slug}', [BarangController::class, 'show']);
Route::post('/detail_kerja/{barang:slug}', [BarangController::class, 'store']);

Route::get('/cart', [CartController::class, 'index']);

Route::get('/berita', function () {
    return view('menu_berita', [
        'title' => 'Berita',
        'berita'=>Berita::all()
    ]);
});



// LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

//Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::Post('/register', [RegisterController::class, 'store']);

//Logout
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');





Route::resource('/dashboard/tambah_penjual', dataPenjualController::class)->middleware('auth');


//iklan

Route::resource('/dashboard/iklan', IklanController::class)->middleware('auth');

//Cart
Route::resource('/pembeli/cart', CartController::class)->middleware('auth');

//Berita
Route::resource('/dashboard/berita', BeritaController::class)->middleware('auth');

//Order
Route::resource('/pembeli/order',OrderItemController::class)->middleware('auth');

Route::resource('/pembeli/edit_profile', OrderItemController::class)->middleware('auth');

Route::delete('/cart{cart}',[CartController::class,'destroy']);

//dasbhboard admin
Route::resource('/dashboard_admin/data', dataController::class);

// Route::get('/dashboardadmin', function () {
//     return view('dashboardadmin.layout.main');
// });



//NEW
//dasbhboard admin
Route::resource('/dashboard_admin/data', dataController::class)->middleware('auth');;


//PEMBERI KERJA
Route::resource('/dashboard_admin/beri_pekerjaan', DashboardController::class)->middleware('auth');
Route::resource('/dashboard_admin/lamaran_saya', lamaranSayaController::class)->middleware('auth');
Route::resource('/dashboard_admin/permintaan_lamaran', permintaanLamaranController::class)->middleware('auth');
//ADMIN
Route::resource('dashboard_admin2/data_user', adminDashboardController::class);
Route::resource('dashboard_admin2/data_lamaran', dataLamaranController::class);
