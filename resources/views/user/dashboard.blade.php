@extends('layout_user.navbar')
@section('content')
<div class="container">
    <div class="row">
        @forelse($data_nana as $row)
        <div class="col-md-3 mt-4">

            <div class="card" style="width: 12rem;">
              <img src="{{ asset('storage/'. $row->image) }}" class="card-img-top" alt="{{ $row->judul_buku }}">
              <div class="card-body">
                     <h5 class="card-title"> {{ $row->judul_buku }}</h5>
                     <a href="/detailbuku/{{$row->id}}" class="btn btn-dark">Detail Buku</a>
              </div>
       </div>
        </div> 
        @empty
        <div class="mt-auto">
            <p>Data Buku Kosong!</p>
        </div>
        @endforelse
    </div>
</div>

@endsection('content')