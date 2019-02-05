<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendidikanAngkaPutusSekolah extends Model
{
    use SoftDeletes;
    protected $table='pendidikan_angka_putus_sekolah';
    protected $fillable=['id_kategori','tahun','id_kecamatan','jenjang','laki_laki','perempuan','persentase','created_at','updated_at','deleted_at'];

    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
    function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }
}
