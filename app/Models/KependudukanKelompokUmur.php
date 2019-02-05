<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanKelompokUmur extends Model
{
    use SoftDeletes;
    protected $table='kependudukan_kelompok_umur';
    protected $fillable=['id_kategori','tahun','laki_laki','persen_laki_laki','perempuan','persen_perempuan','kelompok_umur','created_at','updated_at','deleted_at'];

    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
}
