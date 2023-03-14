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

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

// --------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('/dashboard_user', [UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/detailbuku/{id}', [UserController::class, 'detail'])->name('detail')->middleware('auth');
// --------------------------------------------------------------------------------------------------------------------------------------------------
Route::get('/dashboard', function () {

    $data_nana = Buku::count();
    return view('welcome',compact('data_nana'));
})->middleware('auth');

Route::get('/daftarbuku', [BukuController::class, 'daftarbuku'])->name('daftarbuku')->middleware('auth');
Route::get('/tambah', [BukuController::class, 'tambah'])->name('tambah')->middleware('auth');
Route::post('/insertdata', [BukuController::class, 'insertdata'])->name('insertdata')->middleware('auth');
Route::get('/tampilkandata/{id}', [BukuController::class, 'tampilkandata'])->name('tampilkandata')->middleware('auth');
Route::post('/updatedata/{id}', [BukuController::class, 'updatedata'])->name('updatedata')->middleware('auth');
Route::get('/delete/{id}', [BukuController::class, 'delete'])->name('delete')->middleware('auth');
Route::get('/export', [BukuController::class, 'export'])->name('export');
// --------------------------------------------------------------------------------------------------------------------------------------------------
// Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');