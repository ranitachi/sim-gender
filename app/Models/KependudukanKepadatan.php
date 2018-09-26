<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanKepadatan extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_kepadatan';

    protected $fillable = [ 'id_kategori', 'id_kecamatan', 'persentase_penduduk', 'kepadatan_penduduk'];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'id_kecamatan');
    }
}
