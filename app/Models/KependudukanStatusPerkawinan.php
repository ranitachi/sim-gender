<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanStatusPerkawinan extends Model
{
    use SoftDeletes;
    protected $table='kependudukan_status_perkawinan';
    protected $fillable=['id_kategori','id_kecamatan','tahun','belum_kawin','kawin','cerai_hidup','cerai_mati','created_at','updated_at','deleted_at'];
    
    function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }
    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
}
