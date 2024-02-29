@extends('welcome')
@section ('content')
<div class="card">
    Tabel User
    <div class="card-header">
        <a href="/user/create" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordred">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                
                <th>Outlet</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
            @php
              $no=1;
            @endphp
            @foreach ($user as $user )
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $user->namauser }}</td>
                    <td>{{ $user->username }}</td>
                    
                    <td>{{ $user->namaoutlet }}</td>
                    <td>{{ $user->role }}</td>
                    <td><a href="{{ url('user/edit/'.$user->id) }}" ><i class="fas fa-edit" style="color: #ffa200;"></i></a></td>
                    <td><a href="{{ url('user/hapus/'.$user->id) }}" onclick="return confirm('Yakin Dihapus?');"><i class="fas fa-trash" style="color: #ff0000;"></i></a></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection