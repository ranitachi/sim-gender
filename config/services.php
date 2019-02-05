<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'kelompok_umur' => ['0-4','5-10','10-14','15-19','20-24','25-29','30-34','35-39','40-44','45-49','50-54','55-59','60-64','65-69','70-74','75'],
   
    'kelompok_usia' => ['5-6','7-12','13-15	','16-18'],

    'jenjang_apm' => ['sd'=>'SD','smp'=>'SMP','sma'=>'SMA'],
   
    'jenis_sakit_rata' => ['angka_kesakitan'=>'Angka Kesakitan','rata_rata'=>'Rata-Rata Lama Sakit (Hari)'],
    
    'jenjang' => ['paud'=>'PAUD','sd_mi'=>'SD/MI','smp_mts'=>'SMP/MTS','sma_smk'=>'SMA/SMK'],
    
    'jenjang2' => ['paud'=>'PAUD','tk_ra'=>'TK/RA','sd_mi'=>'SD/MI','smp_mts'=>'SMP/MTS','sma_smk'=>'SMA/SMK'],
    
    'status_sekolah' => [
                'tidak_sekolah'=>'Tidak/belum pernah bersekolah',
                'sekolah_sd'=>'SD/sederajat',             
                'sekolah_smp'=>'SMP/sederajat',
                'sekolah_sma'=>'SMA/sederajat',
                'tidak_lagi'=>'Tidak bersekolah lagi'],
    
    'jenis_huruf' => ['latin'=>'HURUF LATIN','arab'=>'HURUF ARAB','lainnya'=>'HURUF LAINNYA','buta'=>'BUTA HURUF'],

];
