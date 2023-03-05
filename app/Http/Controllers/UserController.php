<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use PDF;

class UserController extends Controller
{
      public function dashboard(Request $request){

       
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
             return view('user/dashboard',compact('data_nana'));

     
      }

      
      
      public function detail($id){
            $data_nana = Buku::find($id);
    
            return view('user/detail_buku', compact('data_nana'));
        }
}
