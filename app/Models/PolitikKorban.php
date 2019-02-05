<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolitikKorban extends Model
{
    use SoftDeletes;

    protected $table = 'politik_korban';

    public static function jk()
    {
        return ['Laki-Laki', 'Perempuan'];
    }
}
