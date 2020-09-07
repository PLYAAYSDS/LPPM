<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class publikasi_forum_ilmiah extends Model 
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
        'luaran_tahun', 'luaran_jenis', 'luaran_nama','luaran_nama_forum', 'luaran_institusi_penyelenggara', 'luaran_tempat_pelaksanaan'
        ,'luaran_isbn'
    ];

}