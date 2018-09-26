<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendidikanSekolah extends Model
{
    use SoftDeletes;
    protected $table='pendidikan_sekolah';
    protected $fillable=['id_kategori','id_kecamatan','jenjang','angka_masuk_kasar_l','angka_masuk_kasar_p','created_at','updated_at','deleted_at'];

    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
    function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }
}
