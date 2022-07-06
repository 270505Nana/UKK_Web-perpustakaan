<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use PDF;

class EmployeeController extends Controller
{
    public function index(Request $request){

        if ($request->has('search')) {
            $data_nana = Employee::where('nama','LIKE','%'.$request->search.'%')->paginate(5);
            Session::put('halaman_url',request()->fullUrl());
        }else {
            
            $data_nana = Employee::paginate(5);
            Session::put('halaman_url',request()->fullUrl());
        }

       return view('datapegawai',compact('data_nana'));
    }

    public function tambahpegawai(){
        return view ('tambahdata');
    }

    public function insertdata(Request $request){
        $data_nana = Employee::create($request->all());
        // if ($request->hasFile('foto')) {
        //     $request->file('foto')->move('fotopegawai/'. $request->file('foto')->getClientOriginalName());
        //     $data_nana->foto = $request->file('foto')->getClientOriginalName();
        //     $data_nana->save();
        // }

        // form validation
        $this->validate($request,[
            'nama' => 'required|max:25|min:7',
            'notelpon' => 'required|max:15|min:11',
        ]);

        return redirect()->route('pegawai')->with('success','Data Berhasil di Tambahkan');
    }

    public function tampilkandata($id){
        $data_nana = Employee::find($id);
        // dd($data_nana);

        return view('tampildata', compact('data_nana'));
    }

    public function updatedata(Request $request, $id){
        $data_nana = Employee::find($id);
        $data_nana->update($request->all());

        if (session('halaman_url')) {
            return Redirect(session('halaman_url'))->with('success','Data Berhasil di Ubah');
        }

        return redirect()->route('pegawai')->with('success','Data Berhasil di Ubah');
    }

    public function delete($id){
        $data_nana = Employee :: find($id);
        $data_nana->delete();

        return redirect()->route('pegawai')->with('success','Data Berhasil di Hapus');
    }

    public function export(){
        $data_nana = Employee::all();
        return view('datapegawai-pdf', compact('data_nana'));

        // from here-pdf tools and also use PDF; top
        // view()->share('data_nana',$data_nana);
        // $pdf_nana = PDF::loadview('datapegawai-pdf');
        // return $pdf_nana->downlaod();
    }
}
