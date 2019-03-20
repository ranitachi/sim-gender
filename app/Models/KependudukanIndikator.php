<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanIndikator extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_indikator';

    public static function karakteristik()
    {
        return [
            'PDRB Atas Dasar Harga Berlaku (Triliun Rupiah)', 
            'PDRB Atas Dasar Harga Konstan (Triliun Rupiah)', 
            'Pertumbuhan Ekonomi (LPE)',
            'Indeks Pembangunan Manusia (IPM)',
            'Angka Harapan Hidup (AHH)',
            'Tingkat Pengangguran (%)',
            'PDRB Perkapita Pertahun (Juta Rupiah)',
            'Harapan Lama Sekolah (%)',
            'Rata-rata Lama Sekolah (Tahun)',
            'Pengeluaran Perkapita Setahun (Ribuan Rupiah)',
            'Persentase Penduduk Miskin',
            'Garis Kemiskinan Perkapita/Bulan (Rupiah)',
        ];
    }
}
