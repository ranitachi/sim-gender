<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KesehatanJumlahDokter extends Model
{
    use SoftDeletes;
    protected $table='kesehatan_jumlah_dokter';
    protected $fillable = ['unit_kerja','id_kecamatan','id_kategori','dokter_spesialis','dokter_umum','dokter_gigi','created_at','updated_at','deleted_at'];

    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
    function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }
}
