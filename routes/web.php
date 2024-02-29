<?php

// use App\Models\Outlet;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//login
Route::get('admin',[AuthController::class,'index']);
Route::post('postlogin',[AuthController::class,'postlogin']);
Route::get ('logout',[AuthController::class,'logout']);



Route::group(['middleware'=>['auth']],function(){

    //dashboard
    Route::get('/',[FrontController::class,'index']);

    //member
    Route::get('member',[MemberController::class,'index']);
    Route::get('member/create',[MemberController::class,'create']);
    Route::post('member/add',[MemberController::class,'store']);
    Route::get('member/hapus/{id}',[MemberController::class,'show']);
    Route::get('member/edit/{id}',[MemberController::class,'edit']);
    Route::post('member/update',[MemberController::class,'update']);
    
    //outlet
    Route::get('outlet',[OutletController::class,'index']);
    Route::get('outlet/create',[OutletController::class,'create']);
    Route::post('outlet/add',[OutletController::class,'store']);
    Route::get('outlet/hapus/{id}',[OutletController::class,'show']);
    Route::get('outlet/edit/{id}',[OutletController::class,'edit']);
    Route::post('outlet/update',[OutletController::class,'update']);
    
    //paket
    Route::get('paket',[PaketController::class,'index']);
    Route::get('paket/create',[PaketController::class,'create']);
    Route::post('paket/add',[PaketController::class,'store']);
    Route::get('paket/hapus/{id}',[PaketController::class,'destroy']);
    Route::get('paket/edit/{id}',[PaketController::class,'edit']);
    Route::post('paket/update/{idpaket}',[PaketController::class,'update']);
    
    //user(admin)
    Route::get('user',[UserController::class,'index']);
    Route::get('user/create',[UserController::class,'create']);
    Route::post('user/add',[UserController::class,'store']);
    Route::get('user/hapus/{id}',[UserController::class,'hapus']);
    Route::get('user/edit/{id}',[UserController::class,'edit']);
    Route::post('user/update/{id}',[UserController::class,'update']);
    
    //transaksi
    Route::get('transaksi',[TransaksiController::class,'index']);
    Route::post('transaksi/store',[TransaksiController::class,'store']);
    Route::get('addtransaksi',[TransaksiController::class,'addcart']);
    Route::get('tambah/{id}', [TransaksiController::class, 'tambah']);
    Route::get('kurang/{id}', [TransaksiController::class,'kurang']);
    Route::get('hapuscart/{id}',[TransaksiController::class,'hapuscart']);
    Route::get('transaksi/struk',[TransaksiController::class,'struk']);
    Route::post('status/{id}',[TransaksiController::class,'status']);
    Route::get('laporan',[TransaksiController::class,'laporan']);
    Route::get('bayar/{id}',[TransaksiController::class,'bayar']);
    Route::post('bayar/updatebayar/{id}',[TransaksiController::class,'updatebayar']);
    Route::get('detail',[TransaksiController::class,'detail']);
    Route::post('filter',[TransaksiController::class,'filter']);
    Route::get('detail/{id}', [DetailTransaksiController::class, 'index'] );
    Route::get('cetakstrukbaru/{id}', [DetailTransaksiController::class, 'detail']);
});

