<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanMiskin extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_miskin';

    protected $fillable = ['id_kategori', 'id_kecamatan', 'tahun', 'hampir_miskin', 'miskin', 'sangat_miskin', 'jumlah'];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'id_kecamatan');
    }
}
