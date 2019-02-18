<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanGelandangan extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_gelandangan';

    public static function karakteristik()
    {
        return ['Gelandangan', 'Pengemis', 'Eks Napi'];
    }
}
