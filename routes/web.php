<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
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

    $data_nana = Employee::count();
    $data_nana_cewe = Employee::where('jeniskelamin','cewe')->count();
    $data_nana_cowo = Employee::where('jeniskelamin','cowo')->count();
    return view('welcome',compact('data_nana','data_nana_cewe','data_nana_cowo'));
});

Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');

// Route ke Form tambah pegawai
Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');

// Route untuk mengirim datanya ke database, setelah user insert data
Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');
// insert data -> post

// Route menampilkan data, ketika klik edit
Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');

// Untuk mengirim data yang diedit
Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');
// update data -> post

// Delete data
Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');

// Export data pegawai 
Route::get('/export', [EmployeeController::class, 'export'])->name('export');