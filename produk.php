<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produk';
    protected $primarykey = 'id';

    public function produktoko()
    {
    	return $this->belongsTo('App\toko', 'id_toko', 'id');
    }

    public function kategori()
    {
    	return $this->belongsTo('App\kategori', 'kategori_id', 'id');
    }
}
