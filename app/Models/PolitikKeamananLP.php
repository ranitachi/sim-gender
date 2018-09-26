<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolitikKeamananLP extends Model
{
    use SoftDeletes;

    protected $table = 'politikkeamanan_lp';

    protected $fillable = [ 'id_kategori', 'jenis', 'laki_laki', 'perempuan' ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }
}
