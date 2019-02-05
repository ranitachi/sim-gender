<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanBalita extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_balita';

    protected $fillable = ['id_kategori', 'id_kecamatan', 'tahun', 
                            'balita_l', 'balita_p', 'terlantar_l', 'terlantar_l',
                            'bermasalah_l', 'bermasalah_p' ];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'id_kecamatan');
    }
}
