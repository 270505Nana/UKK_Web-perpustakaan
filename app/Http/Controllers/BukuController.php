<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use PDF;

class BukuController extends Controller
{
    public function daftarbuku(Request $request){

        if ($request->has('search')) {
            $data_nana = Buku::where('judul_buku','LIKE','%'.$request->search.'%')
                                ->orWhere('pengarang', 'like', '%'.$request->search.'%')
                                ->orWhere('penerbit', 'like', '%'.$request->search.'%')->paginate(5);
                                
            Session::put('halaman_url',request()->fullUrl());
            // halaman_url manggil mana ya
        }else {
            
            $data_nana = Buku::paginate(5);
            Session::put('halaman_url',request()->fullUrl());
        }

    //   menampilkan halaman datapegawai
       return view('admin/databuku',compact('data_nana'));
    }

    public function tambah(){
        return view ('admin/tambahdata');
    }

    public function insertdata(Request $request){

        $validatedData = $request->validate([
            'judul_buku' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahun_terbit' => 'required|max:255',
            'kota_terbit' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses upload image
        $path = $request->file('image')->store('post-buku');

        // Simpan data buku ke database
        $buku = new Buku;
        $buku->judul_buku = $validatedData['judul_buku'];
        $buku->pengarang = $validatedData['pengarang'];
        $buku->penerbit = $validatedData['penerbit'];
        $buku->tahun_terbit = $validatedData['tahun_terbit'];
        $buku->kota_terbit = $validatedData['kota_terbit'];
        $buku->image = $path;
        $buku->save();

        return redirect()->route('daftarbuku')->with('success','Data Berhasil di Tambahkan');
    }

    public function tampilkandata($id){
        $data_nana = Buku::find($id);
        // dd($data_nana);

        return view('admin/edit_databuku', compact('data_nana'));
    }

    public function updatedata(Request $request, $id){
        $data_nana = Buku::find($id);
        
        $rules = ([
            'judul_buku' => 'max:255',
            'pengarang' => 'max:255',
            'penerbit' => 'max:255',
            'tahun_terbit' => 'max:255',
            'kota_terbit' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validatedData = $request->validate($rules);
        
        if ($request->file('image')) {
            if($request->oldImage){
                Buku::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-buku');
        }

        Buku::where('id', $data_nana->id)
                    ->update($validatedData);

        return redirect('/daftarbuku')->with('success', 'Data buku berhasil diubah!!');
    }

    public function delete($id){
        $data_nana = Buku :: find($id);
        $data_nana->delete();

        return redirect()->route('daftarbuku')->with('success','Data Berhasil di Hapus');
    }

    public function export(){
        $data_nana = Buku::all();
        return view('admin/print_databuku', compact('data_nana'));
    }
}
