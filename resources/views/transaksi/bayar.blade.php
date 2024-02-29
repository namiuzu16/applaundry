@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="member">Member</label>
                        <input type="text" name="member" id="member" class="form-control" 
                        value="{{ $master->nama }}" @readonly(true)>
                    </div>
                    <div class="form-group">
                        <label for="member">Alamat </label>
                        <input type="text" name="alamat" id="alamat" class="form-control" 
                        value="{{ $master->alamat }}" @readonly(true)>
                    </div>
                    <div class="form-group">
                        <label for="member">Nomer Telp </label>
                        <input type="text" name="telp" id="telp" class="form-control" 
                        value="{{ $master->telp }}" @readonly(true)>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-boordered">
                        <thead>
                        <tr>    
                            <th>No</th>
                            <th>Paket</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Sub Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                                $total=0;
                            @endphp
                            @foreach ($details as $detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $detail->namapaket }}</td>
                                    <td>{{ $detail->harga }}</td>
                                    <td>{{ $detail->harga *$detail->qty }}</td>
                                </tr>
                                @php
                                    $total += $detail->harga * $detail->qty
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="2">Jumlah</td>
                                <td colspan="3">{{ $total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="tambahan">
                        Biaya Tambahan</label>
                        <input type="number" 
                        name="biaya tambahan" 
                        id="biaya tambahan" class="form-control" 
                        value="{{ $master->biayatambahan }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tambahan">
                        Diskon</label>
                        <input type="number" 
                        name="diskon" 
                        id="diskon" class="form-control" 
                        value="{{ $master->diskon }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tambahan">
                        Pajak</label>
                        <input type="number" 
                        name="pajak" 
                        id="pajak" class="form-control" 
                        value="{{ $master->pajak }}" readonly>
                     </div>
                    <div class="form-group">
                        <label for="tambahan">
                        Total</label>
                        <input type="number" 
                        name="total" 
                        id="subtotal" class="form-control" 
                        value="{{ $total + $master->biayatambahan + $master->pajak - $master->diskon }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tambahan">
                        Bayar</label>
                        <input type="number" 
                        name="bayar" 
                        id="bayar" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="tambahan">
                        Kembali</label>
                        <input type="number" 
                        name="kembali" 
                        id="kembali" class="form-control" >
                    </div>
            </div>
            <a href="/bayar/update" class="btn btn-primary">Bayar</a>
        </div>
@endsection