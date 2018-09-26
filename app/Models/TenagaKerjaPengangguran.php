<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TenagaKerjaPengangguran extends Model
{
    use SoftDeletes;

    protected $table = 'tenagakerja_pengangguran';

    protected $fillable = [ 'id_kategori', 'id_kecamatan', 'jumlah', 'persentase', 'tpt_persentase' ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'id_kecamatan');
    }
}
