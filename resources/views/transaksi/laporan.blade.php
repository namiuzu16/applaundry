@extends('welcome')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="transaksi" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
            <form action="filter" method="post">
                @csrf
                <table>
                    <tr>
                        <td>Tanggal awal</td>
                        <td>Tanggal Akhir</td>
                        <td>Status Di Bayar</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><input type="date" name="tglawal" class="form-control"></td>
                        <td><input type="date" name="tglakhir" class="form-control"></td>
                        <td>
                            <select name="status" class="form-control">
                                <option value="">Pilih Status</option>
                                <option value="dibayar">Sudah Dibayar</option>
                                <option value="belumdibayar">Belum Dibayar</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-warning">Terapkan Filter</button>
                            <a href="laporan" class="btn btn-primary">Reset Filter</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordred" id="dataTable" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Outlet</th>
                        <th>Member</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Dibayar</th>
                    
                    </tr>
                </thead>
                @php
                    $no=1;
                @endphp
                @foreach ($transaksi as $transaksi )
                <tbody>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $transaksi->namaoutlet }}</td>
                        <td>{{ $transaksi->namamember }}</a></td>
                        <td>{{ $transaksi->kode_invoice }}</td>
                        <td>{{ $transaksi->tgl }}</td>
                        <td>
                            <form action="{{ url('status/'.$transaksi->idtransaksi) }}" method="post">
                                @csrf
                                <select class="form-control" name="status" id="" onchange="this.form.submit()">
                                    <option @selected($transaksi->status=='baru') value="baru">Baru</option>
                                    <option @selected($transaksi->status=='proses') value="proses">Proses</option>
                                    <option @selected($transaksi->status=='selesai') value="selesai">Selesai</option>
                                    <option @selected($transaksi->status=='diambil') value="diambil">Diambil</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            @if ($transaksi->dibayar=='dibayar')
                                Lunas
                            @else
                                <a href="bayar/{{ $transaksi->idtransaksi }}" class="btn btn-warning">Bayar</a>
                            @endif
                        </td>
                        {{-- <td><a href="{{ url('laporan/edit/'.$transaksi->idtransaksi) }}"><i class="fas fa-edit" style="color: #ffa200;"></i></a></td> --}}
                    </tr>
                </tbody>    
                @endforeach
            </table>
        </div>
    </div>
@endsection