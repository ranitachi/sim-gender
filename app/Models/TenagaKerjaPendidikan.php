<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TenagaKerjaPendidikan extends Model
{
    use SoftDeletes;

    protected $table = 'tenagakerja_pendidikan';

    protected $fillable = [ 'id_kategori', 'id_kecamatan', 'bekerja', 'pengangguran_terbuka', 'jumlah_total_bekerja', 'bukan_angkatan_kerja', 'jumlah_total' ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'id_kecamatan');
    }
}
