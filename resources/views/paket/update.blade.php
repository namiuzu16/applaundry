@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <form action="{{ url('paket/update/'.$paket->idpaket) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Outlet</label>
                    <select name="idoutlet" class="form-select" id="">
                            @foreach ($outlets as $outlet)
                                <option @selected($outlet->idoutlet==$paket->idoutlet) value="{{ $outlet->idoutlet }}">{{ $outlet->namaoutlet }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Jenis</label><br>
                    <input type="radio" name="jenis" {{ $paket->jenis=='kiloan'? 'checked':'' }} value="kiloan" required>
                    <label for="jenis">kiloan</label><br>
                    <input type="radio" name="jenis" {{ $paket->jenis=='selimut'? 'checked':'' }} value="selimut" required>
                    <label for="jenis">selimut</label><br>
                    <input type="radio" name="jenis" {{ $paket->jenis=='bedcover'? 'checked':'' }} value="bedcover" required>
                    <label for="jenis">bedcover</label><br>
                    <input type="radio" name="jenis" {{ $paket->jenis=='kaos'? 'checked':'' }} value="kaos" required>
                    <label for="jenis">kaos</label><br>
                    <input type="radio" name="jenis" {{ $paket->jenis=='lain'? 'checked':'' }} value="lain" required>
                    <label for="jenis">lain-lain</label><br>
                </div>
                <div class="form-group">
                    <label for="">Nama Paket</label>
                    <input type="text" name="namapaket" id="namapaket" value="{{ $paket->namapaket}}" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="fortelepon">Harga</label>
                    <input type="number" name="harga" id="harga" value="{{ $paket->harga }}" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection