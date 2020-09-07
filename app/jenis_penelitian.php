<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class jenis_penelitian extends Model
{
    use Authenticatable;
    protected $connection = 'mysql';
    protected $table = 'lppm_r_jenis_penelitian';
    protected $primarykey = 'jenis_penelitian_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jenis_penelitian_nama', 'jenis_penelitian_id',
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
