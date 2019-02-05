<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanAngkaIndex extends Model
{
    protected $table='kependudukan_angka_index';
    protected $fillable=['id_kategori','tahun','id_kabupaten','nama_wilayah','ipm','ipg','idg','created_at','updated_at','deleted_at'];

    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
    
    function kabupaten()
    {
        return $this->belongsTo('App\Models\KabupatenKota','id_kabupaten');
    }
}
