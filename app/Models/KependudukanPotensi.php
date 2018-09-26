<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanPotensi extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_potensi';

    protected $fillable = [ 
        'id_kategori', 'id_kecamatan', 'korban_tindak_kekerasan', 'pekerja_migran_terlantar', 
        'penyandang_disabilitas', 'korban_trafficking'
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
