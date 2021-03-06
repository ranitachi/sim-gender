<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolitikKawin extends Model
{
    use SoftDeletes;

    protected $table = 'politik_kawin';

    public static function jk()
    {
        return ['Laki-Laki', 'Perempuan'];
    }
}
