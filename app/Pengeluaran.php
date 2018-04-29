<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'user_id','nama_barang','harga',
    ];
}
