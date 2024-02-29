@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card mb-4">
                <div class="card-body">
                    <label for="exampleFormControlInput1" class="form-label">Kode Invoice</label>
                    <input type="number" name="" id="" class="form-control mt-2" placeholder="{{ $detail [0]['kode_invoice'] }}" readonly><br> 
                    <label for="exampleFormControlInput1" class="form-label">Nama Pelanggan</label>
                    <input type="number" name="" id="" class="form-control mt-2" placeholder="{{ $detail [0]['namamember'] }}" readonly><br> 
                    <label for="exampleFormControlInput1" class="form-label">Telepon</label>
                    <input type="number" id="" name="" class="form-control mt-2" placeholder="{{ $detail [0]['telp'] }}" readonly><br>
                    <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                    <input type="number" id="" name="" class="form-control mt-2" placeholder="{{ $detail [0]['alamat'] }}" readonly><br>
                    <label for="exampleFormControlInput1" class="form-label">Status Pembayaran</label>
                    @if($detail[0]['dibayar'] == 'dibayar')
                        <input type="number" id="dibayar" name="dibayar" class="form-control mt-2" placeholder="Lunas" readonly><br>
                    @else
                        <input type="number" id="belumdibayar" name="belumdibayar" class="form-control mt-2" placeholder="Belum Lunas" readonly><br>
                    @endif

                    <label for="exampleFormControlInput1" class="form-label">Status Order</label>
                    @if ($detail[0]['status'] == 'baru')
                    <input type="number" id="" name="" class="form-control mt-2" placeholder="Baru" readonly><br>
                    @elseif ($detail[0]['status'] == 'proses')
                    <input type="number" id="" name="" class="form-control mt-2" placeholder="Proses" readonly><br>
                    @elseif ($detail[0]['status'] == 'selesai')
                    <input type="number" id="" name="" class="form-control mt-2" placeholder="Selesai" readonly><br>
                    @elseif ($detail[0]['status'] == 'diambil')
                    <input type="number" id="" name="" class="form-control mt-2" placeholder="Diambil" readonly><br>
                    @endif

                    <button id="btnstruk" class="btn btn-primary btn-md btn-block">Print Struk</button>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>     
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>No</th>
                            <th>Paket</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>SubTotal</th>
                        </tr>

                        @php
                            $no=1;
                            $total=0;
                        @endphp

                            @foreach ($detail as $detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $detail->namapaket }}</td>
                                    <td class="text-right">{{ $detail->harga }}</td>
                                    <td class="text-right">{{ $detail->qty }}</td>
                                    
                                    @php
                                    $subtotal = $detail->harga*$detail->qty;
                                    $total += $subtotal;
                                    @endphp

                                    <td class="text-right">{{ $subtotal }}</td>

                                </tr>

                                

                            @endforeach
                            <tr>
                                <td colspan="4">Jumlah</td>
                                <td class="text-right" colspan="2" id="">{{ $total }}</td>
                            </tr>
                            <tr>
                                <td colspan="4">Pajak</td>
                                <td class="text-right" colspan="2" id="">{{ $detail->pajak }}</td>
                            </tr>
                            <tr>
                                <td colspan="4">Diskon</td>
                                <td class="text-right" colspan="2" id="">{{ $detail->diskon }}</td>
                            </tr>
                            <tr>
                                <td colspan="4">Biaya Tambahan</td>
                                <td class="text-right" colspan="2" id="">{{ $detail->biayatambahan }}</td>
                            </tr>
                            @php
                                $keseluruhan = $total + $detail->biayatambahan - $detail->diskon + $detail->pajak;
                            @endphp
                            <tr>
                                <td colspan="4">Keseluruhan</td>
                                <td class="text-right" colspan="2" id="">{{ $keseluruhan }}</td>
                            </tr>
                                
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var btnstruk = document.getElementById('btnstruk');

        btnstruk.addEventListener('click', function(){
        var url = "{{ url('cetakstrukbaru/'.$detail->idtransaksi) }}";

        // Membuka URL dalam tab baru
        window.open(url, '_blank');
        });
    </script>
@endsection