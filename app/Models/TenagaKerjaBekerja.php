<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TenagaKerjaBekerja extends Model
{
    use SoftDeletes;

    protected $table = 'tenagakerja_bekerja';

    protected $fillable = [ 'id_kategori', 'status_pekerjaan_utama', 'laki_laki', 'perempuan', 'jumlah' ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }
}
