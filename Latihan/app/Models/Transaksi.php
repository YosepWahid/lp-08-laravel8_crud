<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;


    protected $fillable = [
        'nama_pembeli',
        'nama_penerima',
        'harga_barang',
        'uang_terima',
        'uang_kembali',
    ];
}
