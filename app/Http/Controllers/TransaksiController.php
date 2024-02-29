<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::User();
        $pakets = Paket::where('idoutlet',$user->idoutlet)->get();
        $members = Member::all();
        return view ('transaksi.tampil',['pakets'=>$pakets,'members'=>$members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $user = Auth::User();
        $idoutlet = $user->idoutlet;
        $idmember = $request->idmember;
        // dd($idmember);
        $kode_invoice = date('YmdHis');
        $tgl = now();
        $batas_waktu = date('Y-m-d',strtotime('+3 days', strtotime($tgl)));
        $tambahan = $request->biayatambahan;
        $diskon = $request->diskon;
        $total = $request->total;
        $pajak = $request->pajak;
        $dibayar = $request->dibayar;
        $status = "baru";
        $subtotal = 0;
        // dd($batas_waktu);
        foreach (session('cart') as $cart) {
            $subtotal += $cart['jumlah']*$cart['harga'];
        }
        $pajak = 0.11*$subtotal;
        if ($dibayar > $total) {
            $tgl_bayar = now();
            $dibayar = "dibayar";
        }else{
            $tgl_bayar = null;
            $dibayar = "belumdibayar";
        }
        $data = [
            'idoutlet' =>$idoutlet,
            'idmember' =>$idmember,
            'kode_invoice' =>$kode_invoice,
            'tgl' => $tgl,
            'batas_waktu' =>$batas_waktu,
            'tgl_bayar' => $tgl_bayar,
            'biayatambahan' =>$tambahan,
            'diskon' => $diskon,
            'pajak' =>$pajak,
            'status' =>$status,
            'dibayar' =>$dibayar,
            'iduser' =>$user->id,
            
        ];
        Transaksi::create($data);
        $idtransaksi = Transaksi::latest()->first();
        // $idtransaksi = Transaksi::all();


        // dd($data);

        $sesi = session()->get('cart');
        // dd($sesi);
        foreach (session('cart') as $cart) {
            $datatransaksi = [
                'idtransaksi' =>$idtransaksi->idtransaksi,
                'idpaket' =>$cart['idpaket'],
                'qty' =>$cart['jumlah'],
                'keterangan' => null
            ];
            DetailTransaksi::create($datatransaksi);
        }

        session()->forget('cart');
        return redirect('transaksi/struk');
        // return redirect('transaksi');
        // $member = Member::where('idmember',$idmember)->first();
        // $transaksi = Transaksi::where('idtransaksi',$idtransaksi)->first();
        // $detailtransaksi = DetailTransaksi::join('pakets','detail_transaksis.idpaket','=','pakets.idpaket')->select(['pakets.*','detail_transaksis.*'])->where('idtransaksi',$idtransaksi)->get();
        // return view('transaksi.struk',['members'=>$member,'transaksi'=>$transaksi,'detailtransaksi'=>$detailtransaksi]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function addcart(Request $request)
    {
        $idpaket = $request->idpaket;
        $jumlah = $request->jumlah;
        $paket = Paket::where('idpaket',$idpaket)->first();
        $cart = session()->get('cart',[]);
        if (isset($cart[$idpaket])) {
            $cart[$idpaket]['jumlah'] = $jumlah;
        }else{
            $cart[$idpaket]=[
                'idpaket'=>$idpaket,
                'namapaket'=>$paket->namapaket,
                'jumlah'=>$jumlah,
                'harga'=>$paket->harga
            ];
        }
        session()->put('cart',$cart);
        alert()->success('Berhasil','Data Berhasil Ditambahkan');
        return redirect('transaksi');
    }

    public function tambah($idpaket){
        $cart = session()->get('cart');
        $cart[$idpaket]['jumlah']++;
        session()->put('cart',$cart);

        return redirect('transaksi');
    }

    public function kurang($idpaket){
        $cart = session()->get('cart');
        if ($cart[$idpaket]['jumlah'] > 1) {
            $cart[$idpaket]['jumlah']--;
            session()->put('cart',$cart);
        }else{
            unset($cart[$idpaket]);
            session()->put('cart',$cart);
        }

        return redirect('transaksi');
    }

    public function hapuscart($idpaket)
    {
        $cart = session()->get('cart');
        if (isset($cart[$idpaket])) {
            unset($cart[$idpaket]);
            session()->put('cart',$cart);
        }

        alert()->success('Berhasil','Data Berhasil Dihapus');
        return redirect('transaksi');

    }

    public function struk()
    {
        $auth = Auth::user();
        $transaksi = Transaksi::latest()->first();
        $alamat = Outlet::where('idoutlet', $auth->idoutlet)->first();
        $member = Member::where('idmember', $transaksi->idmember)->first();

        $struks = DetailTransaksi::join('transaksis', 'detail_transaksis.idtransaksi', '=', 'transaksis.idtransaksi')
            ->join('pakets', 'detail_transaksis.idpaket', '=', 'pakets.idpaket')
            ->where('transaksis.idtransaksi', $transaksi->idtransaksi)
            ->select(['detail_transaksis.*', 'pakets.*', 'transaksis.*'])
            ->get();

        // dd($struks);

        return view('transaksi.struk', compact('member', 'struks', 'alamat', 'transaksi'));
    }

    public function laporan()
    {
        $user = Auth::User();
        if ($user->role=="kasir") {
            $transaksi = Transaksi::join('outlets','transaksis.idoutlet','=','outlets.idoutlet')
            ->join('members','transaksis.idmember','members.idmember')
            ->select(['transaksis.*','outlets.namaoutlet','members.namamember'])
            ->where('transaksis.idoutlet',$user->idoutlet)
            ->get();
        } else {
            $transaksi = Transaksi::join('outlets','transaksis.idoutlet','=','outlets.idoutlet')
            ->join('members','transaksis.idmember','members.idmember')
            ->select(['transaksis.*','outlets.namaoutlet','members.namamember'])
            ->get();
        }
        
        return view('transaksi.laporan',['transaksi'=>$transaksi]);
    }

    // public function detail()
    // {
    //     $transaksi = Transaksi::join('outlets','transaksis.idoutlet','=','outlets.idoutlet');
    //     $members = Member::all();

    //     return view('transaksi.detail',['members'=> $members,'transaksi'=>$transaksi]);
    // }
 
    public function status(Request $request, $idtransaksi)
    {
        Transaksi::where('idtransaksi',$idtransaksi)->update([
            'status'=>$request->status
        ]);
        return redirect('laporan');
    }

    public function bayar($idtransaksi)
    {
        $master = Transaksi::join('members','transaksis.idmember','=','members.idmember')->select(['transaksis.*','members.*'])->where('idtransaksi',$idtransaksi)->first();
        $detailtransaksi = DetailTransaksi::join('pakets','detail_transaksis.idpaket','=','pakets.idpaket')->select(['pakets.*','detail_transaksis.*'])->where('idtransaksi',$master->idtransaksi)->get();
        return view('transaksi.bayar1',['master'=>$master,'detailtransaksi'=>$detailtransaksi]);
    }

    public function updatebayar($idtransaksi)
    {
        $data = ['dibayar'=>'dibayar'];
        Transaksi::where('idtransaksi',$idtransaksi)->update($data);
        return redirect('laporan');
    }

    public function filter(Request $request)
    {
        $tglawal = $request->tglawal;
        $tglakhir = $request->tglakhir;
        $status = $request->status;
        $where = "";
        if ($tglawal != null && $tglakhir != null) {
            $where = "left(tgl,10) between '$tglawal' and '$tglakhir'";
        }
        
        if ($status != null) {
            if (!empty($where)) {
                $where = $where." and dibayar = '$status'";
            }else{
                $where = $where."dibayar = '$status'";
            }
        }
       
        if ($tglawal == null && $tglakhir == null && $status== null) {
            return redirect('laporan');
        }

        $user = Auth::User();

        // $user = Auth::User();
        if ($user->role=="kasir") {
            $transaksi = Transaksi::join('outlets','transaksis.idoutlet','=','outlets.idoutlet')
            ->join('members','transaksis.idmember','members.idmember')
            ->select(['transaksis.*','outlets.namaoutlet','members.namamember'])
            ->where('transaksis.idoutlet',$user->idoutlet)
            ->whereRaw($where)
            ->get();
        } else {
            $transaksi = Transaksi::join('outlets','transaksis.idoutlet','=','outlets.idoutlet')
            ->join('members','transaksis.idmember','members.idmember')
            ->select(['transaksis.*','outlets.namaoutlet','members.namamember'])
            ->whereRaw($where)
            ->get();
        }
        
        // return view('transaksi.laporan',['transaksi'=>$transaksi]);

        // if ($user->role=="kasir") {
        //     $transaksi = Transaksi::join('outlets','transaksis.idoutlet','=','outlets.idoutlet')
        //     ->join('members','transaksis.idmember')
        //     ->select(['transaksis.*','outlets.namaoutlet','members.namamember'])
        //     ->where('transaksis.idoutlet',$user->idoutlet)
        //     ->whereRaw($where)
        //     ->get();
        // } else {
        //     $transaksi = Transaksi::join('outlets','transaksis.idoutlet','=','outlets.idoutlet')
        //     ->join('members','transaksis.idmember')
        //     ->select(['transaksis.*','outlets.namaoutlet','members.namamember'])
        //     ->whereRaw($where)
        //     ->get();
        // }
        return view('transaksi.laporan',['transaksi'=>$transaksi]);
        
    }

}
 