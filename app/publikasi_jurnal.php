<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class publikasi_jurnal extends Model 
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
        'luaran_tahun', 'luaran_tipe', 'luaran_jenis', 'luaran_nama', 'luaran_p_issn', 'luaran_e_issn'
        ,'luaran_volume', 'luaran_nomor', 'luaran_halaman_awal', 'luaran_halaman_akhir', 'luaran_url', 'luaran_file'
    ];

}