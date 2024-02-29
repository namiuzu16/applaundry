<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'idtransaksi',
        'idoutlet',
        'idmember',
        'kode_invoice',
        'tgl',
        'tgl_bayar',
        'biayatambahan',
        'diskon',
        'pajak',
        'status',
        'dibayar',
        'batas_waktu',
        'iduser',
    ];
}
