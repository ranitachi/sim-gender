<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendidikanRasio extends Model
{
    use SoftDeletes;
    protected $table='pendidikan_rasio';
    protected $fillable=['id_kategori','id_kecamatan','jenjang','jumlah_siswa','jumlah_sekolah','rasio','created_at','updated_at','deleted_at'];

    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
    function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }
}
