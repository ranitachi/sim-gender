<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendidikanJumlahMurid extends Model
{
    use SoftDeletes;
    protected $table='pendidikan_jumlah_murid';
    protected $fillable=['id_kategori','tahun','id_kecamatan','jenjang','jumlah_laki','jumlah_perempuan','created_at','updated_at','deleted_at'];
    
    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'id_kecamatan');
    }
}
