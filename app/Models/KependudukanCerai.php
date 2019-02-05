<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanCerai extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_cerai';

    protected $fillable = ['id_kategori', 'id_kecamatan', 'tahun', 'talak', 'gugat', 'pengesahan', 'lain_lain', 'jumlah'];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'id_kecamatan');
    }
}
