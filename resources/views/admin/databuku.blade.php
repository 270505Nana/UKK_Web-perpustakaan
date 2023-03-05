@extends ('layout.admin')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Buku</h1>
            </div>
          
            </div>
        </div>

        <div class="container">

            <a href="/tambah" class="btn btn-success"> + Tambah Buku</a>
           
            <a href="/export" target = "_blank"  class="btn btn-primary ml-3"> Export Data Buku</a>

            <div width="100%">
                <div class="col-auto">
                    <form action="/daftarbuku" method="GET">
                        <input type="search" name="search" class="form-control mt-4 mb-4 " placeholder="Cari data buku....">
                    </form>
                </div>
            </div>

            <div class="row">

                @if ($message = Session::get('success'))
                <div class="alert alert-success mt-4" role="alert">
                    {{$message}}
                </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun terbit</th>
                            <th scope="col">Kota terbit</th>
                            <th scope="col">Cover buku</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php
                            $no = 1;
                        @endphp
                        @foreach($data_nana as $index =>  $row)
                            <tr>
                                <th scope="row">{{$index + $data_nana->firstItem() }}</th>
                                <td>{{$row->judul_buku}}</td>
                                <td>{{$row->pengarang}}</td>
                                <td>{{$row->penerbit}}</td>
                                <td>{{$row->tahun_terbit}}</td>
                                <td>{{$row->kota_terbit}}</td>
                                <td>
                                @if($row->image)
                                    <div style="width:75px">
                                        <img src="{{ asset('storage/' . $row->image) }}"  class="card-img-top img-fluid mt-3">
                                    </div>
                                @else
                                No image
                                @endif
                                                    </td>
                                <td>
                                    <!-- <a href="/tampilkandata/{{$row->id}}" class="btn btn-info">Detail</a> -->
                                    <a href="/tampilkandata/{{$row->id}}" class="btn btn-info">Edit</a>
                                    <a onclick="return confirm('Hapus data?')" href="/delete/{{$row->id}}" class="btn btn-danger delete" >Hapus</a>
                                    <!-- <a class="btn btn-danger delete" data-id="{{$row->id}}" data-nama="{{$row->nama}}" >Hapus</a> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data_nana->links() }}
            </div>
        </div>
    </div>

  

@endsection

@push('script')

     <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script
    src="https://code.jquery.com/jquery-3.6.0.slim.js"
    integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="
    crossorigin="anonymous">
    </script>


    <!-- SWEETALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    </body>

    <!-- PEMANGGILAN SWEET ALERT -->
    <script>

    $('.delete').click( function(){
        var pegawaiid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        swal({
            title: "Hapus Data?",
            text: "Kamu akan menghapus data pegawai dengan nama "+nama+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/delete/"+pegawaiid+""
                swal("Data berhasil dihapus", {
                icon: "danger",
                });
            } else {
                swal("Data tidak jadi dihapus");
            }
        });
    });
    // delete : diambil dari class button 'hapus'

    </script>

@endpush