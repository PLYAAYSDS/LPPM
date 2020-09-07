<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class tujuan_sosial_ekonomi extends Model
{
    use Authenticatable;
    protected $connection = 'mysql';
    protected $table = 'lppm_r_tujuan_sosial_ekonomi';
    protected $primaryKey = 'proposal_penelitian_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proposal', 'proposal_penelitian_id',
    ];
}
