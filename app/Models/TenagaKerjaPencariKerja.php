<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TenagaKerjaPencariKerja extends Model
{
    use SoftDeletes;

    protected $table = 'tenagakerja_pencarikerja';

    protected $fillable = [ 'id_kategori', 'pendidikan_tertinggi', 'laki_laki', 'perempuan', 'jumlah' ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }
}
