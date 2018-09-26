<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TenagaKerjaLapangan extends Model
{
    use SoftDeletes;

    protected $table = 'tenagakerja_lapangan';

    protected $fillable = [ 'id_kategori', 'lapangan_pekerjaan', 'laki_laki', 'perempuan', 'jumlah' ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }
}
