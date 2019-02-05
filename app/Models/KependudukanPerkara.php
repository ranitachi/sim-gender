<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanPerkara extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_perkara';

    protected $fillable = ['id_kategori', 'id_kecamatan', 'tahun', 'perkara'];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'id_kecamatan');
    }
}
