<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;



class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('member',['member'=>$members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addmember');
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
            'namamember'=>'required',
            'alamat' => 'required',
            'jk' => 'required',
            'telp'=>'required',
        ]);

        Member::create([
            'namamember'=>$data['namamember'],
            'alamat' => $data['alamat'],
            'jk' => $data['jk'],
            'telp'=>$data['telp'],
        ]);
        alert()->success('Berhasil','Data Berhasil tambah');

        return redirect('member');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($idmember)
    {
        Member::where('idmember','=',$idmember)->delete();

        alert()->success('Berhasil','Data Berhasil hapus');
        return redirect('member');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($idmember)
    {
        $member = Member::where('idmember','=',$idmember)->first();
        return view('updatemember',['members'=>$member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $data = $request->validate([
            'namamember'=>'required',
            'alamat' => 'required',
            'jk' => 'required',
            'telp'=>'required',
        ]);

        Member::where('idmember',$request->idmember)->update([
            'namamember'=>$data['namamember'],
            'alamat' => $data['alamat'],
            'jk' => $data['jk'],
            'telp'=>$data['telp'],
        ]);
        alert()->success('Berhasil','Data Berhasil edit');

        return redirect('member');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
