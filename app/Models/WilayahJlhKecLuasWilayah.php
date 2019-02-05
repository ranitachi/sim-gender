<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WilayahJlhKecLuasWilayah extends Model
{
    use SoftDeletes;
    protected $table='wilayah_jlh_kec_luas_wilayah';
    protected $fillable=['id_kecamatan','jumlah_desa','id_kategori','jumlah_kelurahan','luas_wilayah','tahun','created_at','updated_at','deleted_at'];

    function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }
    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
}
