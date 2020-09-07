<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class lppm_proposal extends Model
{
    use Authenticatable;
    protected $connection = 'mysql';
    protected $table = 'lppm_proposal';
    protected $primaryKey = 'proposal_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proposal_id',
    ];
}
