<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanPerceraian extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_perceraian';

    public static function karakteristik()
    {
        return [
            'Poligami Tidak Sehat', 'Krisis Akhlak', 'Cemburu', 'Ekonomi',
            'Tidak Ada Tanggung Jawab', 'Kawin dibawah Umur', 'Kekejaman Jasmani', 'Dihukum',
            'Gangguan Pihak Ketiga', 'Tidak Ada Kerharmonisan'
        ];
    }
}
