@extends('welcome')
@section('content')
<div class="card">
    Tabel Outlet
    <div class="card-header">
        <a href="outlet/create" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordred">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
            @php
              $no=1;
            @endphp
            @foreach ($outlet as $outlet )
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $outlet->namaoutlet }}</td>
                    <td>{{ $outlet->alamat }}</td>
                    <td>{{ $outlet->telp }}</td>
                    <td><a href="{{ url('outlet/edit/'.$outlet->idoutlet) }}"><i class="fas fa-edit" style="color: #ffa200;"></i></a></td>
                    <td><a href="{{ url('outlet/hapus/'.$outlet->idoutlet) }}" onclick="return confirm('Yakin Dihapus?');"><i class="fas fa-trash" style="color: #ff0000;"></a></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection