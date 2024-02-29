@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <form action="/user/add" method="post">
                @csrf
                <div class="mt-2">
                    <label class="form-label" for="">Nama</label>
                    <input class="form-control" value="{{ old('namauser') }}" type="text" name="namauser" id="">
                    <span class="text-danger">
                        @error('namauser')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="">Username</label>
                    <input class="form-control" value="{{ old('username') }}" type="text" name="username" id="">
                    <span class="text-danger">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="">Password</label>
                    <input class="form-control" value="{{ old('password') }}" type="password" name="password" id="">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3 mt-3">
                    <label class="form-label" for="">Outlet</label><br>
                    <select class="form-select" name="idoutlet">
                        <option value="" disable selected>Daftar Outlet</option>
                        @foreach ($outlets as $outlet )
                            <option value="{{ $outlet->idoutlet }}">{{ $outlet->namaoutlet }}</option>
                        @endforeach
                    </select>
                </div>
               
                <div class="mt-2 mb-5">
                    <label class="form-label" for="">Role</label><br>
                    <select class="form-select" name="role" id="">
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                        <option value="owner">Owner</option>
                    </select>
                </div>
        
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection