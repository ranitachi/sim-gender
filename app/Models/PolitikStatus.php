<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolitikStatus extends Model
{
    use SoftDeletes;

    protected $table = 'politik_status';

    public static function jk()
    {
        return ['Laki-Laki', 'Perempuan'];
    }
}
