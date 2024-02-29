@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <form action="/outlet/update" method="post">
                @csrf
                <input type="hidden" name="idoutlet" value="{{ $outlets->idoutlet }}">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="namaoutlet" id="namaoutlet" value="{{ $outlets->namaoutlet }}" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="{{ $outlets->alamat }}" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="fortelepon">No Hp</label>
                    <input type="text" name="telp" id="telp" value="{{ $outlets->telp }}" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection