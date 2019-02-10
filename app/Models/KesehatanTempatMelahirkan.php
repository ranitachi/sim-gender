<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KesehatanTempatMelahirkan extends Model
{
    use SoftDeletes;
    protected $table='kesehatan_tempat_melahirkan';
    protected $fillable=['id_kategori','id_kecamatan','jenis','laki_laki','perempuan','tahun','kuintil_1','kuintil_2','kuintil_3','kuintil_4','kuintil_5','krt_tidak_sekolah','krt_sd','krt_smp','krt_sma','kab_tangerang','created_at','updated_at','deleted_at'];

    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
    function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }
}
