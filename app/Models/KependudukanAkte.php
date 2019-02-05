<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanAkte extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_akte';

    public static function karakteristik()
    {
        return [
            'Akte Kelahiran', 'Akte Perkawinan', 'Akte Perceraian', 'Akte Kematian',
            'Akte Pengesahan Anak', 'Akte Pengakuan Anak'
        ];
    }
}
