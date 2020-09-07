<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $connection = 'mysql2';
    protected $table = 'hrdx_dosen';
    

        public function namaDosen()
    {
        return $this->belongsTo('App\Pegawai','pegawai_id','pegawai_id');
    }
}
