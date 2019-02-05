<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanSampling extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_sampling';

    public static function karakteristik()
    {
        return [
            'Laki-Laki', 'Perempuan',
            'Kuintil 1', 'Kuintil 2', 'Kuintil 3', 'Kuintil 4', 'Kuintil 5',
            'Tidak Sekolah/Tidak Tamat SD', 'SD/Sederajat', 'SMP/Sederajat',
            'SMA ke Atas', 'Kabupaten Tangerang'
        ];
    }
}
