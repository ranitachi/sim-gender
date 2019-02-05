<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanLansia extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_lansia';

    protected $fillable = ['id_kategori', 'id_kecamatan', 'tahun', 'terlantar_laki', 'terlantar_perempuan', 
                            'cacat_laki', 'cacat_perempuan'];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'id_kecamatan');
    }
}
