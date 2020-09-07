<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class lppm_luaran_anggota_pegawai extends Model 
{
    use Authenticatable;
    protected $connection = 'mysql';
    protected $table = 'lppm_luaran_anggota_pegawai';
    protected $primarykey = 'lppm_luaran_anggota_pegawai_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'luaran_id', 'pegawai_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}