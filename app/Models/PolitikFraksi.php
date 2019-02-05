<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolitikFraksi extends Model
{
    use SoftDeletes;

    protected $table = 'politik_fraksi';

    public static function partai()
    {
        return [
            'Golkar', 'PDI Perjuangan', 'Partai Demokrat', 'PPP', 'Partai Gerindra',
            'Partai Kebangkitan Bangsa', 'Partai Amanat Nasional', 'Partai Nasdem', 
            'Partai Hanura', 'Partai Keadilan Sejahtera', 'Partai Bulan Bintang', 
            'PKPI'
        ];
    }
}
