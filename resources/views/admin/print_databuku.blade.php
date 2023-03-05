<!DOCTYPE html>
<html>
    <head>
        <style>
        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #000000;
        color: white;
        }

        h1{
            text-align: center;
        }
        </style>
    </head>
    <body>
        <h1>Data Buku</h1>
        <table id="customers">
            <tr>
                     <th scope="col">No</th>
                     <th scope="col">Judul Buku</th>
                     <th scope="col">Pengarang</th>
                     <th scope="col">Penerbit</th>
                     <th scope="col">Tahun terbit</th>
                     <th scope="col">Kota terbit</th>
                     <th scope="col">Cover buku</th>
            </tr>

            @php
                $no = 1;
            @endphp
            @foreach($data_nana as $row)
              <tr>
                     <td>{{$no++}}</td>
                     <td>{{$row->judul_buku}}</td>
                     <td>{{$row->pengarang}}</td>
                     <td>{{$row->penerbit}}</td>
                     <td>{{$row->tahun_terbit}}</td>
                     <td>{{$row->kota_terbit}}</td>
                     <td><img src="{{ asset('storage/' . $row->image) }}"  class="card-img-top img-fluid mt-3" style="width:75px"></td>
              </tr>
            @endforeach    
        </table>
    </body>
</html>
<script type="text/javascript">
    window.print()
</script>