<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendidikanRasioMuridGuru extends Model
{
    use SoftDeletes;
    protected $table='pendidikan_rasio_murid_guru';
    protected $fillable=['id_kategori','tahun','id_kecamatan','jenjang','jumlah_murid','jumlah_guru','rasio','created_at','updated_at','deleted_at'];

    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
    function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }
}
