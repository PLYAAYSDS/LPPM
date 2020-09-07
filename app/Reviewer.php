<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    use Authenticatable;
    protected $connection = 'mysql';
    protected $table = 'lppm_reviewer';
    protected $primaryKey = 'reviewer_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dosen_id', 'proposal_penelitian_id',
    ];
}