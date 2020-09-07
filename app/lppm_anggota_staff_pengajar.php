<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class lppm_anggota_staff_pengajar extends Model
{
    use Authenticatable;
    protected $connection = 'mysql';
    protected $table = 'lppm_anggota_staff_pengajar';
    protected $primarykey = 'anggota_staff_pengajar_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proposal_penelitian_id', 'anggota_staff_pengajar_id', 'pegawai_id',
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