<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Outlet;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    function index()
    {
        $outlets = Outlet::all();

        $users = User::join('outlets','users.idoutlet','=','outlets.idoutlet')
                    ->select (['users.*','outlets.*'])
                    ->get();
        return view ('user.select',['user'=>$users,'outlets'=>$outlets]);
    }
    
    public function create()
    {
        $outlets = Outlet::all();
        $users = User::all();
        return view('user.insert',['user'=>$users,'outlets'=>$outlets]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'namauser' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'namauser' => $data['namauser'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'idoutlet' => $request->idoutlet,
            'role' => $request->role,
        ]);

        alert()->success('Berhasil','Data Berhasil ditambah');
        return redirect('user');
    }

    public function edit($id)
    {
        $paket = Paket::all();
        $outlets = Outlet::all();
        $users = User::where('id',$id)->first();
        return view('user.update',['user'=>$users,'outlets'=>$outlets,'paket'=>$paket]);
    }
    
    public function update(Request $request,$id)
    {
        if (isset($request->password)) {
            User::where('id',$id)->update([
                'namauser' => $request->namauser,
                'username' => $request->username,
                'password' => bcrypt($request['password']),
                'idoutlet' => $request->idoutlet,
                'role' => $request->role,
            ]);
        } else {
            User::where('id',$id)->update([
                'namauser' => $request->namauser,
                'username' => $request->username,
                'idoutlet' => $request->idoutlet,
                'role' => $request->role,
            ]);
        }

        alert()->success('Berhasil','Data Berhasil diedit');
        return redirect('user');
    }

    public function hapus($id)
    {
        $users = User::where('id',$id)->get();
        $role = User::where('role',$users[0]['role']);
        $jumlah = $role->count();

        if ($jumlah == 1) {
            session()->flash('pesan','Data yang dihapus hanya ada satu');
        } else {
            User::where('id',$id)->delete();
        }
        
        alert()->success('Berhasil','Data Berhasil dihapus');
        return redirect('user');
    }
        
}
