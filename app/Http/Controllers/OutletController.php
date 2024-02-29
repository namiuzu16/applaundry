<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlets = Outlet::all();
        return view ('outlet',['outlet'=>$outlets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insertoutlet');
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
            'namaoutlet'=>'required',
            'alamat' => 'required',
            'telp'=>'required',
        ]);

        Outlet::create([
            'namaoutlet'=>$data['namaoutlet'],
            'alamat' => $data['alamat'],
            'telp'=>$data['telp'],
        ]);

        alert()->success('Berhasil','Data Berhasil tambah');
        return redirect('outlet');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show($idoutlet)
    {
        Outlet::where('idoutlet','=',$idoutlet)->delete();

        alert()->success('Berhasil','Data Berhasil dihapus');
        return redirect('outlet');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit($idoutlet)
    {
        $outlet = Outlet::where('idoutlet','=',$idoutlet)->first();
        return view('updateoutlet',['outlets'=>$outlet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'namaoutlet'=>'required',
            'alamat' => 'required',
            'telp'=>'required',
        ]);

        Outlet::where('idoutlet',$request->idoutlet)->update([
            'namaoutlet'=>$data['namaoutlet'],
            'alamat' => $data['alamat'],
            'telp'=>$data['telp'],
        ]);

        alert()->success('Berhasil','Data Berhasil diedit');
        return redirect('outlet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        //
    }
}
