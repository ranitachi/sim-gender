<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KependudukanPNS extends Model
{
    use SoftDeletes;

    protected $table = 'kependudukan_pns';

    public static function karakteristik()
    {
        return [
            'Sekertariat Daerah', 
            'Sekertariat DPRD', 
            'Badan Kepegawaian Pengembangan SDM',
            'Badan Pengelola Keuangan Daerah',
            'Badan Perencanaan Pembangunan Daerah',
            'Badan Pendapatan Daerah',
            'Badan Penanggulangan Bencana Daerah',
            'Inspektorat Kabupaten Tangerang',
            'Satuan Polisi Pamong Praja',
            'Dinas Pendidikan',
            'Dinas Kesehatan',
            'Dinas Tenaga Kerja',
            'Dinas Komunikasi dan Informatika',
            'Dinas Sosial',
            'Dinas Tata Ruang dan Bangunan',
            'Dinas Perhubungan',
            'Dinas Koperasi dan Usaha Mikro',
            'Dinas Perikanan',
            'Dinas Perindustrian dan Perdagangan',
            'Dinas Pertanian dan Ketahanan Pangan',
            'Dinas Lingkungan Hidup dan Kebersihan',
            'Dinas Pemberdayaan Perempuan dan Perlindungan Anak',
            'Dinas Perpustakaan dan Arsip',
            'Dinas Pengendalian Penduduk dan Keluarga Berencana',
            'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu',
            'Dinas Bina Marga dan Sumber Daya Air',
            'Dinas Kependudukan dan Catatan Sipil',
            'Dinas Pemuda, Olahraga, Kebudayaan dan Pariwisata',
            'Dinas Pemberdayaan Masyarakat dan Pemerintahan Desa',
            'Dinas Perumahan, Pemukiman dan Pemakaman',
            'KPU',
            'Kesbangpol',
            'Rumah Sakit Umum Kabupaten Tangerang',
            'RSUD Balaraja Kabupaten Tangerang',
            'Kecamatan Tigaraksa',
            'Kecamatan Cisoka',
            'Kecamatan Jayanti',
            'Kecamatan Jambe',
            'Kecamatan Balaraja',
            'Kecamatan Sukamulya',
            'Kecamatan Kresek',
            'Kecamatan Gunung Kaler',
            'Kecamatan Mekar Baru',
            'Kecamatan Kemiri',
            'Kecamatan Kronjo',
            'Kecamatan Mauk',
            'Kecamatan Pakuhaji',
            'Kecamatan Pasar Kemis',
            'Kecamatan Rajeg',
            'Kecamatan Sukadiri',
            'Kecamatan Sepatan',
            'Kecamatan Sepatan Timur',
            'Kecamatan Sindang Jaya',
            'Kecamatan Teluknaga',
            'Kecamatan Kosambi',
            'Kecamatan Panongan',
            'Kecamatan Cikupa',
            'Kecamatan Curug',
            'Kecamatan Kelapa Dua',
            'Kecamatan Pagedangan',
            'Kecamatan Cisauk',
            'Kecamatan Legok'
        ];
    }
}
