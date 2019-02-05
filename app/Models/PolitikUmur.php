<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolitikUmur extends Model
{
    use SoftDeletes;

    protected $table = 'politik_umur';

    public static function jk()
    {
        return ['Laki-Laki', 'Perempuan'];
    }
}
