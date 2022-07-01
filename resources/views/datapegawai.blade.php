<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   


    <title>CRUD LARAVEL | 8</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Data Pegawai</h1>

    <div class="container">

    <a href="/tambahpegawai" class="btn btn-success"> + Tambah Pegawai</a>
    <a href="/export" class="btn btn-primary"> Export Data Pegawai</a>

    <div width="100%">
        <div class="col-auto">
            <form action="/pegawai" method="GET">
                <input type="search" name="search" class="form-control mt-4" placeholder="Cari data pegawai....">
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
                        <th scope="col">NAMA</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No.Telepon</th>
                        <th scope="col">Dibuat</th>
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
                            <td>{{$row->nama}}</td>
                            <td>{{$row->jeniskelamin}}</td>
                            <td>{{$row->notelpon}}</td>
                            <td>{{$row->created_at->format('D M Y') }}</td>
                            <td>
                                <a href="/tampilkandata/{{$row->id}}" class="btn btn-info">Edit</a>
                                <a class="btn btn-danger delete" data-id="{{$row->id}}" data-nama="{{$row->nama}}" >Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data_nana->links() }}
        </div>
    </div>

    

    <!-- Optional JavaScript; choose one of the two! -->

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
    
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  <!-- PEMANGGILAN SWEET ALERT -->
  <script>
    // swal("Good job!", "You clicked the button!", "success");

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
                icon: "success",
                });
            } else {
                swal("Data tidak jadi dihapus");
            }
        });
    });
    // delete : diambil dari class button 'hapus'
    
  </script>
</html>