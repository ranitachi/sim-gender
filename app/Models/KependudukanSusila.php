<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanSusila extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_susila';

    protected $fillable = ['id_kategori', 'id_kecamatan', 'tahun', 'susila_laki', 'susila_perempuan', 'napza_laki', 'napza_perempuan'];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'id_kecamatan');
    }
}
