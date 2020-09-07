<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class bidang_penelitian extends Model
{
    use Authenticatable;
    protected $connection = 'mysql';
    protected $table = 'lppm_r_bidang_penelitian';
    protected $primarykey = 'bidang_penelitian_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bidang_penelitian_nama', 'bidang_penelitian_id',
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
