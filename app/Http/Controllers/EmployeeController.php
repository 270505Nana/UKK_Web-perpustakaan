<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){

       $data_nana = Employee::all();
       return view('datapegawai',compact('data_nana'));
    }

    public function tambahpegawai(){
        return view ('tambahdata');
    }

    public function insertdata(Request $request){
        Employee::create($request->all());
        return redirect()->route('pegawai')->with('success','Data Berhasil di Tambahkan');
    }
}
