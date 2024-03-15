<?php

namespace App\Models;

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_pelanggan',
        'total_harga',
        'bayar',
        'kembalian',
    ];

    protected $hidden = [];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }

    public function transaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::class, 'id_transaksi');
    }
}