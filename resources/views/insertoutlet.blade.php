@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <form action="/outlet/add" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="namaoutlet" id="" value="" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" id="" value="" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="fortelepon">No Hp</label>
                    <input type="text" name="telp" id="" value="" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection