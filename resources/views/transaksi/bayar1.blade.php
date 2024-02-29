@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Data Member
                </div>
                <div class="card-body">
                    <table class="50%">
                        <tr>
                            <td>Member</td>
                            <td>:</td>
                            <td>{{ $master->namamember }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $master->alamat }}</td>
                        </tr>
                        <tr>
                            <td>No Hp</td>
                            <td>:</td>
                            <td>{{ $master->telp }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">Data Transaksi</div>
                <div class="card-body">
                    <form action="{{ url('/bayar/updatebayar/'. $master->idtransaksi) }}" method="post" >
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Paket</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                            </tr>
                            @php
                                $no= 1;
                                $total = 0;
                            @endphp
                            @foreach ($detailtransaksi as $detailtransaksi )
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $detailtransaksi->namapaket }}</td>
                                    <td>{{ $detailtransaksi->qty }}</td>
                                    <td>{{ $detailtransaksi->harga }}</td>
                                    <td>{{ $detailtransaksi->harga *$detailtransaksi->qty }}</td>
                                </tr>
                                @php
                                    $total += $detailtransaksi->harga* $detailtransaksi->qty
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-right font-weight-bold">Jumlah Total</td>
                                <td>{{ $total }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right font-weight-bold">Biaya Tambahan</td>
                                <td>{{ $master->biayatambahan }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right font-weight-bold">Pajak</td>
                                <td>{{ $master->pajak }}</td>
                            </tr> 
                            <tr>
                                <td colspan="4" class="text-right font-weight-bold">Diskon</td>
                                <td>{{ $master->diskon }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right font-weight-bold">Harus Dibayar</td>
                                <td><input class="form-control" type="text" name="bayar" id="total" value="{{ $total + $master->biayatambahan + $master->pajak - $master->diskon }}" readonly></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right font-weight-bold">Uang Bayar</td>
                                <td><input class="form-control" type="number" name="dibayar" id="bayar"></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right font-weight-bold">Kembalian</td>
                                <td><input class="form-control" type="number" name="kembali" id="kembali"></td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block disabled" id="btnbayar">Bayar</button>
                                    {{-- <a href=  >Bayar</a> --}}
                                </td>
                            </tr>
                        </table>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#bayar').keyup(function(){
                var total = $('#total').val();
                var bayar = $(this).val();
                var kembali = parseInt(bayar)-parseInt(total);
                $('#kembali').val(kembali);
                if (kembali>0) {
                    $('#btnbayar').removeClass('disabled');
                } else {
                    $('#btnbayar').addClass('disabled');
                }
            });
        })
    </script>
@endsection