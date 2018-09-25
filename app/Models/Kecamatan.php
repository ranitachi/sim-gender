<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kecamatan extends Model
{
    use SoftDeletes;
    protected $table='kecamatan';
    protected $fillable=['nama_kecamatan','lat','lng','created_at','updated_at','deleted_at'];
}
