<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class proposal_penelitian extends Model
{
    use Authenticatable;
    protected $connection = 'mysql';
    protected $table = 'lppm_proposal_penelitian';
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
