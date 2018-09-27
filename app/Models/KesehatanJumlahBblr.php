<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KesehatanJumlahBblr extends Model
{
    use SoftDeletes;
    protected $table='kesehatan_jumlah_bblr';
    protected $fillable = ['id_kecamatan','id_kategori','bayi_lahir','bblr_jumlah','bblr_dirujuk','gizi_buruk','created_at','updated_at','deleted_at'];

    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
    function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }
}
