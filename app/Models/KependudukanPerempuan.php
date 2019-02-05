<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanPerempuan extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_perempuan';

    protected $fillable = ['id_kategori', 'id_kecamatan', 'tahun', 'ekonomi', 'psikologis'];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'id_kecamatan');
    }
}
