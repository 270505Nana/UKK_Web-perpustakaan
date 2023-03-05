@extends('layout.admin')

@section('content')

    <body>
        <h1 class="text-center mb-4"> Tambah Data Buku</h1>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/insertdata" method="POST" enctype="multipart/form-data">
                                @csrf
                              
                                <!-- judul buku -->
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Judul buku</label>
                                    <input type="text" name="judul_buku" class="form-control" value="{{ old('judul_buku') }}" >
                                    @error('judul_buku')
                                        <div class="alert alert-danger mt-4">{{ $message }}</div>
                                    @enderror
                                </div>
                              
                                <!-- pengarang buku -->
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pengarang buku</label>
                                    <input type="text" name="pengarang" class="form-control" value="{{ old('pengarang') }}">
                                    @error('pengarang')
                                        <div class="alert alert-danger mt-4">{{ $message }}</div>
                                    @enderror
                                </div>
                              
                                <!-- penerbit buku -->
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Penerbit buku</label>
                                    <input type="text" name="penerbit" class="form-control"value="{{ old('penerbit') }}" >
                                    @error('penerbit')
                                        <div class="alert alert-danger mt-4">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- tahun terbit -->
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tahun terbit</label>
                                    <input name="tahun_terbit" type="number" class="form-control" value="{{ old('tahun_terbit') }}">
                                    @error('tahun_terbit')
                                        <div class="alert alert-danger mt-4">{{ $message }}</div>
                                    @enderror
                                </div>

                                
                                <!-- kota terbit buku -->
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kota Terbit buku</label>
                                    <input type="text" name="kota_terbit" class="form-control" value="{{ old('kota_terbit') }}">
                                    @error('kota_terbit')
                                        <div class="alert alert-danger mt-4">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- gambar -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image buku</label>
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>

                                <button type="submit" class="btn btn-primary mb-5">Submit</button>
                                <a href="/daftarbuku" class="btn btn-warning mb-5"> Batal </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->
    </body>
@endsection