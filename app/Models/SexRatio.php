<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SexRatio extends Model
{
    use SoftDeletes;
    protected $table='sex_ratio';
    protected $fillable=['id_kategori','id_kecamatan','tahun','laki_laki','perempuan','jumlah','sex_ratio','created_at','updated_at','deleted_at'];
    
    function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }
    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
}
