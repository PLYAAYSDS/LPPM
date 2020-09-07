<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class dokumen_proposal extends Model
{
    use Authenticatable;
    protected $connection = 'mysql';
    protected $table = 'lppm_dokumen_proposal_penelitian';
    protected $primarykey = 'dokumen_proposal_penelitian_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dokumen_proposal_penelitian', 'proposal_penelitian_id',
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
