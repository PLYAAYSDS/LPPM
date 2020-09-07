<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class kuesioner extends Model
{
    use Authenticatable;
    protected $connection = 'mysql';
    protected $table = 'lppm_kuesioner';
    protected $primarykey = 'kuesioner_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kuesioner', 'kuesioner_id',
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
