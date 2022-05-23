<?php


use App\Http\Controllers\DashboardPostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardLayananController;
use App\Http\Controllers\DashboardGaleriController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index']);


Route::get('/blog', [PostController::class, 'index']);


Route::get('/blog/{post:slug}', [PostController::class, 'show']);
Route::get('/daftar-wisata', [LayananController::class, 'index']);

Route::get('/pesan', 'PesanController@index');
Route::post('/pesan', 'PesanController@store');
Route::get('/exportpelanggan', 'PelangganController@pelangganexport')->name('exportpelanggan')->middleware('auth');


Route::group(['middleware' => 'revalidate'], function () {


    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

    Route::post('/login', [LoginController::class, 'authenticate']);

    Route::post('/logout', [LoginController::class, 'logout']);

    Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

    Route::get('/dashboard/posts/checkSlug', 'DashboardPostController@checkSlug')->middleware('auth');

    Route::resource('/dashboard/posts', 'DashboardPostController')->middleware('auth');

    Route::resource('/dashboard/galeri', 'DashboardGaleriController')->middleware('auth');

    Route::resource('/dashboard/daftar-wisata', 'DashboardLayananController')->middleware('auth');

    // Route::get('/dashboard/pelanggan-pending', 'PelangganController@index')->middleware('auth');
    Route::get('/dashboard/pelanggan-sukses', 'PelangganController@showSukses')->middleware('auth');
    Route::get('/dashboard/pelanggan-gagal', 'PelangganController@showGagal')->middleware('auth');
    Route::resource('/dashboard/pelanggan-pending', 'PelangganController')->middleware('auth');
});
