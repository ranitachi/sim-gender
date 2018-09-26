<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanPMKS extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_pmks';

    protected $fillable = [ 
        'id_kategori', 'id_kecamatan', 'bayi_terlantar', 'anak_terlantar', 'anak_perlindungan_khusus',
        'anak_berhadapan_hukum', 'anak_jalanan', 'anak_disabilitas'
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'id_kecamatan');
    }
}
