<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class penilaian_laporan_akhir extends Model
{
    use Authenticatable;
    protected $connection = 'mysql';
    protected $table = 'lppm_penilaian_laporan_akhir';
    protected $primaryKey = 'penilaian_laporan_akhir_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lppm_penilaian',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}