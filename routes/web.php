<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Models\Buku;
// location controller

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

Route::get('/dashboard_user', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/detailbuku/{id}', [UserController::class, 'detail'])->name('detail');



Route::get('/', function () {

    $data_nana = Buku::count();
    return view('welcome',compact('data_nana'));
})->middleware('auth');
// pegawai
Route::get('/daftarbuku', [BukuController::class, 'daftarbuku'])->name('daftarbuku')->middleware('auth');

// Route ke Form tambah buku
Route::get('/tambah', [BukuController::class, 'tambah'])->name('tambah')->middleware('auth');

// Route untuk mengirim datanya ke database, setelah user insert data
Route::post('/insertdata', [BukuController::class, 'insertdata'])->name('insertdata')->middleware('auth');
// insert data -> post

// Route menampilkan data, ketika klik edit
Route::get('/tampilkandata/{id}', [BukuController::class, 'tampilkandata'])->name('tampilkandata')->middleware('auth');

// Untuk mengirim data yang diedit
Route::post('/updatedata/{id}', [BukuController::class, 'updatedata'])->name('updatedata')->middleware('auth');
// update data -> post

// Delete data
Route::get('/delete/{id}', [BukuController::class, 'delete'])->name('delete');

// Export data pegawai 
Route::get('/export', [BukuController::class, 'export'])->name('export');

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');

// Register
Route::get('/register', [LoginController::class, 'register'])->name('register');

// Register -> send data
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

// login -> send data
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

// Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');