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
}
