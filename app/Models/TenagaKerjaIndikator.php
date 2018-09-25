<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TenagaKerjaIndikator extends Model
{
    use SoftDeletes;

    protected $table = 'tenagakerja_indikator';

    protected $fillable = [ 'id_kategori', 'karakteristik', 'laki_laki', 'perempuan', 'jumlah' ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }
}
