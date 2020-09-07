<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $connection = 'mysql2';
    protected $table = 'hrdx_pegawai';
    

}