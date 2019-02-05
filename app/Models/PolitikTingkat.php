<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolitikTingkat extends Model
{
    use SoftDeletes;

    protected $table = 'politik_tingkat';

    public static function jk()
    {
        return ['Laki-Laki', 'Perempuan'];
    }
}
