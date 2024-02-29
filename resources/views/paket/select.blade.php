@extends('welcome')
@section ('content')
<div class="card">
    Tabel Paket
    <div class="card-header">
        <a href="/paket/create" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordred">
            <tr>
                <th>No</th>
                <th>Nama Outlet</th>
                <th>Jenis</th>
                <th>Nama Paket</th>
                <th>Harga</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
            @php
              $no=1;
            @endphp
            @foreach ($paket as $paket )
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $paket->namaoutlet }}</td>
                    <td>{{ $paket->jenis }}</td>
                    <td>{{ $paket->namapaket }}</td>
                    <td>{{ $paket->harga }}</td>
                    <td><a href="{{ url('paket/edit/'.$paket->idpaket) }}" ><i class="fas fa-edit" style="color: #ffa200;"></i></a></td>
                    <td><a href="{{ url('paket/hapus/'.$paket->idpaket) }}" onclick="return confirm('Yakin Dihapus?');"><i class="fas fa-trash" style="color: #ff0000;"></i></a></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection