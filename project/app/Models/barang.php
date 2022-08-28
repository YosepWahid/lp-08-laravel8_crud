<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'category_barang',
        'harga_barang',
        'penjelasan_barang',
        'gambar_barang'
    ];
}
