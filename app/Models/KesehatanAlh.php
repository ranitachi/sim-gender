<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KesehatanAlh extends Model
{
    use SoftDeletes;
    protected $table='kesehatan_alh';
    protected $fillable = ['id_kecamatan','id_kategori','anak_lahir_hidup','penolong','jumlah','created_at','updated_at','deleted_at'];

    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
    function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }
}
