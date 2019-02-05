<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolitikPelayanan extends Model
{
    use SoftDeletes;

    protected $table = 'politik_pelayanan';

    public static function jk()
    {
        return ['Laki-Laki', 'Perempuan'];
    }
}
