<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\Auth;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idtransaksi)
    {
        $user = Auth::user();
    
            $detail = Transaksi::join('detail_transaksis','transaksis.idtransaksi','=','detail_transaksis.idtransaksi')
                    ->join('pakets','detail_transaksis.idpaket','=','pakets.idpaket')
                    ->join('members','transaksis.idmember','=','members.idmember')
                    ->join('outlets','transaksis.idoutlet','=','outlets.idoutlet')
                    ->where('transaksis.idoutlet',$user->idoutlet)
                    ->where('transaksis.idtransaksi',$idtransaksi)
                    ->select('transaksis.*','detail_transaksis.*','pakets.*','members.*','outlets.*')
                    ->get();
    
            return view('transaksi.detail',['detail'=>$detail]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function show(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailTransaksi $detailTransaksi)
    {
        //
    }

    public function detail($idtransaksi)
    {
        $auth = Auth::user();

        $transaksi = Transaksi::where('idtransaksi', $idtransaksi)->first();
        $alamat = Outlet::where('idoutlet', $auth->idoutlet)->first();
        $member = Member::where('idmember',$transaksi->idmember)->first();

        $struks = DetailTransaksi::join('transaksis', 'detail_transaksis.idtransaksi', '=', 'transaksis.idtransaksi')
            ->join('pakets', 'detail_transaksis.idpaket', '=', 'pakets.idpaket')
            ->where('transaksis.idtransaksi', $transaksi->idtransaksi)
            ->select(['detail_transaksis.*', 'pakets.*', 'transaksis.*'])
            ->get();

        return view('transaksi.struk',compact('member', 'struks', 'alamat', 'transaksi'));
    }
}
