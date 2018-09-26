<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KesehatanDisabilitas extends Model
{
    use SoftDeletes;

    protected $table = 'kesehatan_disabilitas';

    protected $fillable = [ 'id_kategori', 'jenis', 'integer', 'jumlah' ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }
}
