<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class produk_tersertifikasi extends Model 
{
    protected $connection = 'mysql';
    protected $table = 'lppm_luaran';
    protected $id = 'luaran_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //belum ada id penelitian
    protected $fillable = [
        'luaran_tahun', 'luaran_nama', 'luaran_lembaga', 'luaran_nomor'
    ];

}