<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Outlet;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakets = Paket::join('outlets','pakets.idoutlet','=','outlets.idoutlet')->select(['pakets.*','outlets.*'])->paginate(4);
        $outlets = Outlet::all();
        
        return view('Paket.select',['outlet'=>$outlets,'paket'=>$pakets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlets = Outlet::all();
        $paket = Paket::all();

        return view('paket.insert',compact('outlets','paket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            
            'jenis'=>'required',
            'namapaket' => 'required',
            'harga' => 'required',
        ]);

        Paket::create([
            'idoutlet'=>$request->idoutlet,
            'jenis'=>$data['jenis'],
            'namapaket' => $data['namapaket'],
            'harga' => $data['harga'],
        ]);

        alert()->success('Berhasil','Data Berhasil tambah');

        return redirect('paket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit($idpaket)
    {
        $outlets = Outlet::all();
        $paket = Paket::where('idpaket',$idpaket)->first();
        return view('paket.update',compact('outlets','paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idpaket)
    {
        $data = $request->validate([
            'idoutlet' => 'required',
            'jenis'=>'required',
            'namapaket' => 'required',
            'harga' => 'required',
        ]);

        Paket::where('idpaket',$idpaket)->update([
            'idoutlet'=>$data['idoutlet'],
            'jenis'=>$data['jenis'],
            'namapaket' => $data['namapaket'],
            'harga' => $data['harga'],
        ]);

        alert()->success('Berhasil','Data Berhasil dirubah');

        return redirect('paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpaket)
    {
        Paket::where('idpaket','=',$idpaket)->delete();

        alert()->success('Berhasil','Data Berhasil dihapus');

        return redirect('paket');
    }
}
