<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendidikanDitamatkan extends Model
{
    use SoftDeletes;
    protected $table='pendidikan_ditamatkan';
    protected $fillable=['id_kategori','id_kecamatan','bawah_sd','sd','smp','sma','pt','jumlah','created_at','updated_at','deleted_at'];

    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
    function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }
}
