<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TenagaKerjaIndikator;

class TenagaKerjaController extends Controller
{
    public function indikator($id_kategori)
    {
        $data = TenagaKerjaIndikator::where('id_kategori', $id_kategori)->firstOrFail();

        return $data;
    }
}
