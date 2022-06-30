<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');

// Route ke Form tambah pegawai
Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');

// Route untuk mengirim datanya ke database, setelah user insert data
Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');
// insert data -> post

