@extends('layout_user.navbar')
@section('content')
<div class="container mt-4">
     
       <div class="card border-secondary mb-3" style="max-width: 30rem;">
              <div class="card-header">DETAIL BUKU</div>
                     <div class="col-md-6 mt-3">
                            <img src="{{asset('storage/' . $data_nana->image) }}" class="img-fluid rounded-start">
                     </div>

                     <div class="card-body text-secondary">
                     <h2 class="card-title">{{$data_nana->judul_buku}}</h2>
                     <h7 class="card-text">Pengarang : {{$data_nana->pengarang}}</h7>
                     <br>
                     <h7 class="card-text">Penerbit : {{$data_nana->penerbit}}</h7>
                     <br>
                     <h7 class="card-text">Tahun terbit : {{$data_nana->tahun_terbit}}</h7>
                     <br>
                     <h7 class="card-text">Kota terbit : {{$data_nana->kota_terbit}}</h7>
                     <br>
                     <a class="btn btn-dark mt-4" href="/dashboard_user" >Kembali</a>
              </div>
       </div>
</div>

@endsection('content')