<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangjualController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('index');
});
Route::get('404', function () {
    return view('404');
});
Route::get('blank', function () {
    return view('blank');
});
Route::get('buttons', function () {
    return view('buttons');
});
Route::get('cards', function () {
    return view('cards');
});
Route::get('charts', function () {
    return view('charts');
});
Route::get('forgot-password', function () {
    return view('forgot-password');
});
Route::get('index', function () {
    return view('index');
});
Route::get('users/login', function () {
    return view('users/login');
});
Route::get('register', function () {
    return view('register');
});
Route::get('/tables', [BarangController::class, 'index'])->name('tables');
Route::get('/tablesjual', [BarangjualController::class, 'index'])->name('tablesjual');
Route::get('profile', function () {
    return view('profile');
});
Route::get('settings', function () {
    return view('settings');
});
Route::post('/update_settings', 'SettingsController@update')->name('update.settings');

Route::get('tambahjual', function () {
    return view('tambahjual');
});
Route::get('tambah', function () {
    return view('tambah');
});
Route::get('edit', function () {
    return view('edit');
});
Route::get('editjual', function () {
    return view('editjual');
});

Route::post('/tambah', [BarangController::class, 'store'])->name('nyimpen.barang');
Route::get('/tambah', [BarangController::class, 'create'])->name('barang.create');
Route::put('/edit/{barang}', [BarangController::class, 'update'])->name('updete.barang');
Route::get('/show/{id}', 'App\Http\Controllers\BarangController@show')->name('barang.show');
Route::get('/edit/{id}', 'App\Http\Controllers\BarangController@edit')->name('edit.show');
Route::delete('/hapus/{id}', [BarangController::class, 'destroy'])->name('hapus.barang');

Route::post('/users/tambah', [UserController::class, 'store'])->name('users.store');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users', [UserController::class, 'users'])->name('users.table');
Route::get('/users/edit/{id}',  [UserController::class, 'edit'])->name('users.edit');
Route::get('/users/table', [UserController::class, 'users'])->name('users.table');
Route::get('/users/{id}',  [UserController::class, 'show'])->name('users.show');
Route::delete('/users/hapus/{id}', [UserController::class, 'destroy'])->name('users.hapus');

Route::post('/tambahjual', [BarangjualController::class, 'storejual'])->name('nyimpenjual.barang');
Route::get('/tambahjual', [BarangjualController::class, 'createjual'])->name('barangjual.create');
Route::put('/editjual/{barang}', [BarangjualController::class, 'updatejual'])->name('updetejual.barang');
Route::get('/showjual/{id}', 'App\Http\Controllers\BarangjualController@showjual')->name('barangjual.show');
Route::get('/editjual/{id}', 'App\Http\Controllers\BarangjualController@editjual')->name('editjual.show');
Route::delete('/hapusjual/{id}', [BarangjualController::class, 'destroyjual'])->name('hapusjual.barangjual');

Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('index', [UserController::class, 'index'])->name('index');

Route::middleware (['DisebleRedirect'])->group(function(){
    Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('login', [UserController::class, 'login']);
});
