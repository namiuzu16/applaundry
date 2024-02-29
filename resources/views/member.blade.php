@extends('welcome')
@section('content')
<div class="card">
    Tabel Member
    <div class="card-header">
        <a href="member/create" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordred">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>JK</th>
                <th>Telp</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
            @php
              $no=1;
            @endphp
            @foreach ($member as $member )
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $member->namamember }}</td>
                    <td>{{ $member->alamat }}</td>
                    <td>{{ $member->jk }}</td>
                    <td>{{ $member->telp }}</td>
                    <td><a href="{{ url('member/edit/'.$member->idmember) }}"><i class="fas fa-edit" style="color: #ffa200;"></i></a></td>
                    <td><a href="{{ url('member/hapus/'.$member->idmember) }}" onclick="return confirm('Yakin Dihapus?');"><i class="fas fa-trash" style="color: #ff0000;"></a></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection