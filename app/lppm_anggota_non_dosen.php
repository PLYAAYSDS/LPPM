<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class lppm_anggota_non_dosen extends Model
{
    use Authenticatable;
    protected $connection = 'mysql';
    protected $table = 'lppm_anggota_non_dosen';
    protected $primarykey = 'anggota_non_dosen_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proposal_penelitian_id', 'anggota_non_dosen_id', 'dim_id',
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