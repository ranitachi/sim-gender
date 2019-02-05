<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use SoftDeletes;

    protected $table = 'kategori';

    protected $fillable = [ 'id_subyek', 'judul', 'sumber_data', 'url_route' ];

    public function subyek()
    {
        return $this->belongsTo('App\Models\Subyek', 'id_subyek');
    }
}
