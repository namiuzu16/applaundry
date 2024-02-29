<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //
    

    public function index()
    {
        return view('login');

    }

    public function postlogin(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3'
        ]);

        $data = $request->only('username', 'password');
        
        if (Auth::attempt($data)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect('/');
            }
            if ($user->role == 'kasir') {
                return redirect('/');
            }
            if ($user->role == 'owner') {
                return redirect('/');
            }
        }

        return back()->with('pesan', 'Password');
    }
    
    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect('admin');
    }


}
