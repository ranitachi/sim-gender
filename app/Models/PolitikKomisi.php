<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolitikKomisi extends Model
{
    use SoftDeletes;

    protected $table = 'politik_komisi';

    public static function karakteristik()
    {
        return [
            'Komisi I - Bidang Pemerintahan Hukum & HAM', 
            'Komisi II - Bidang Perekonomian dan Kesejahteraan',
            'Komisi III - Bidang Keuangan',
            'Komisi IV - Bidang Pembanguan'
        ];
    }
}
