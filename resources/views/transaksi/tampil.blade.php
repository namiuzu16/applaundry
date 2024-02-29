@extends('welcome')
@section ('content')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <form action="addtransaksi" method="get">
                    @csrf
                    
                    <select name="idpaket" id="" class="form-control">
                        <option value="">==Pilih Paket==</option>
                        @foreach ($pakets as $paket )
                            <option value="{{ $paket->idpaket }}">{{ $paket->namapaket }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="jumlah" id="" class="form-control mt-2" placeholder="Jumlah">
                    <button type="submit" class="btn btn-primary mt-2">Tambah</button>
                    
                </form>
                <form action="transaksi/store" method="post">
                    @csrf
                    <label for="">Member : </label>
                    <select name="idmember" id="" class="form-control ">
                        <option value="">==Pilih Member==</option>
                        @foreach ($members as $member )
                            <option value="{{ $member->idmember }}">{{ $member->namamember }}</option>
                        @endforeach
                    </select>
                    <label for="">Biaya Tambahan</label>
                    <input id="tambahan" type="number" name="biayatambahan" class="form-control " placeholder="Biaya tambahan">
                    <label for="">Diskon</label>
                    <input id="diskon" type="number" name="diskon" class="form-control " placeholder="Diskon">
                    <label for="">Total</label>
                    <input id="total" type="number" name="total" class="form-control " placeholder="Total">
                    <label for="">Bayar Sekarang</label>
                    <input id="dibayar" type="number" name="dibayar" class="form-control " placeholder="Uang Bayar">
                    <label for="">Kembali</label>
                    <input id="kembali" type="number" name="kembali" class="form-control " placeholder="Kembalian" value="0" disabled>
                    <button type="submit" id="btntrans" class="btn btn-success mt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-7 ml-5">
        <table class="table table-borderes table-striped">
            <tr>
                <th>No</th>
                <th>Paket</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Sub Total</th>
                <th>Aksi</th>
            </tr>
            @php
                $no=1;
                $total=0;
            @endphp
            @if (session()->has('cart'))
                @foreach (session('cart') as $cart )
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $cart['namapaket'] }}</td>
                        <td>
                            <a href="kurang/{{ $cart['idpaket'] }}">[-]</a>
                            {{ $cart['jumlah'] }}
                            <a href="tambah/{{ $cart['idpaket'] }}">[+]</a>
                        </td>   
                        <td>{{ $cart['harga'] }}</td>
                        <td>{{ $cart['harga']*$cart['jumlah'] }}</td>
                        <td><a href="hapuscart/{{ $cart['idpaket'] }}" onclick="return confirm('Yakin Dihapus?');"><i class="fas fa-trash" style="color: #ff0000;"></a></td>
                    </tr>
                    @php
                        $total +=$cart['harga']*$cart['jumlah']
                    @endphp
                @endforeach
            @endif
            <tr>
                <td colspan="4">Jumlah</td>
                <td colspan="2" id="subtotal" >{{ $total }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        var sub = $('#subtotal').text();
        $('#diskon').keyup(function(){

            var tambahan = $('#tambahan').val();
            var diskon = $('#diskon').val();
            var pajak = 11/100*parseInt(sub);
            var total = parseInt(sub) + parseInt(tambahan) - parseInt(diskon) + pajak;
            $('#total').val(total);
        });

        $('#dibayar').keyup(function(){
            var total = $('#total').val();
            var bayar = $('#dibayar').val();
            $('#kembali').val(parseInt(bayar)-parseInt(total));
        });
    })
    var btntrans = document.getElementById('btntrans');

    btn.addEventListener('click', function() {
        var url = "{{ url('transaksi/struk') }}";
        window.open(url, '_blank');
    });
</script>
@endsection