@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <form action="/paket/add" method="post">
                @csrf
                <div class="mb-3">
                    <select class="form-select" name="idoutlet">
                        <option value="" disable selected>Daftar Outlet</option>
                        @foreach ($outlets as $outlet )
                            <option value="{{ $outlet->idoutlet }}">{{ $outlet->namaoutlet }}</option>
                        @endforeach
                    </select>
                </div>
            
                    
                <div class="form-group">
                    <label for="">Jenis</label><br>
                    <input type="radio" name="jenis" value="kiloan" required>
                    <label for="jenis">kiloan</label><br>
                    <input type="radio" name="jenis"  value="selimut" required>
                    <label for="jenis">selimut</label><br>
                    <input type="radio" name="jenis" value="bedcover" required>
                    <label for="jenis">bedcover</label><br>
                    <input type="radio" name="jenis" value="kaos" required>
                    <label for="jenis">kaos</label><br>
                    <input type="radio" name="jenis" value="lain" required>
                    <label for="jenis">lain-lain</label><br>
                </div>
                <div class="form-group">
                    <label for="">Nama Paket</label>
                    <input type="text" name="namapaket" id="namapaket" value="" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="fortelepon">Harga</label>
                    <input type="number" name="harga" id="harga" value="" required class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection