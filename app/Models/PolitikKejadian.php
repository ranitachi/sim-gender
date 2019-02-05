<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolitikKejadian extends Model
{
    use SoftDeletes;

    protected $table = 'politik_kejadian';

    public static function jk()
    {
        return ['Laki-Laki', 'Perempuan'];
    }
}
