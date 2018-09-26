<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subyek extends Model
{
    use SoftDeletes;

    protected $table = 'subyek';

    protected $fillable = [ 'nama_subyek','tahun'];

    public function kategori()
    {
        return $this->hasMany('App\Models\Kategori', 'id_subyek');
    }
}
