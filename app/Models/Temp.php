<?php

namespace App\Models;

use App\Http\Controllers\ProdukController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temp extends Model
{
    use HasFactory;

    protected $table = 'temp';

    protected $fillable = [
        'id_produk',
        'jumlah',
    ];

    protected $hidden = [];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk','id');
    }
}