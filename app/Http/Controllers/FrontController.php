<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $users =User::all();
        return view('welcome',['users'=>$users]);
    }
}
