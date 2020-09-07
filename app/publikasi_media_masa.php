<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class publikasi_media_masa extends Model 
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
        'luaran_tahun', 'luaran_tanggal_publikasi', 'luaran_jenis','luaran_jenis_media', 'luaran_nama', 'luaran_volume'
        ,'luaran_nomor', 'luaran_halaman_awal', 'luaran_halaman_akhir', 'luaran_url'
    ];

}