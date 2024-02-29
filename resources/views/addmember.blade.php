@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <form action="/member/add" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="namamember" id="" value="" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" id="" value="" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label><br>
                    <input type="radio" name="jk" value="L" required>
                    <label for="jk">Laki-laki</label><br>
                    <input type="radio" name="jk" value="P" required>
                    <label for="jk">Perempuan</label><br>
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