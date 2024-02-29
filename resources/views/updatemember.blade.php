@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <form action="/member/update" method="post">
                @csrf
                <input type="hidden" name="idmember" value="{{ $members->idmember }}">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="namamember" id="namamember" value="{{ $members->namamember }}" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="{{ $members->alamat }}" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label><br>
                    <input type="radio" name="jk" {{ $members->jk=='L'? 'checked':'' }} value="L" required>
                    <label for="jk">Laki-laki</label><br>
                    <input type="radio" name="jk" {{ $members->jk=='P'? 'checked':'' }} value="P" required>
                    <label for="jk">Perempuan</label><br>
                </div>
                <div class="form-group">
                    <label for="fortelepon">No Hp</label>
                    <input type="text" name="telp" id="telp" value="{{ $members->telp }}" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection