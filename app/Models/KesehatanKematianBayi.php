<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KesehatanKematianBayi extends Model
{
    use SoftDeletes;
    protected $table='kesehatan_kematian_bayi';
    protected $fillable=['id_kategori','id_kecamatan','jenis','jumlah','persentase','tahun','created_at','updated_at','deleted_at'];

    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
    function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }
}
