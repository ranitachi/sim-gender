<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\TenagaKerjaIndikator;
use DB;

class TenagaKerjaIndikatorController extends Controller
{
    public function index($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = TenagaKerjaIndikator::where('id_kategori', $id_kategori)->get();

        $chart_puk = null;
        $chart_tpak = null;
        $chart_tkk = null;
        $chart_tpt = null;
        foreach ($data as $item) {
            if ($item->karakteristik=="Penduduk Usia Kerja") {
                $chart_puk[] = $item->laki_laki;
                $chart_puk[] = $item->perempuan;
            }

            if ($item->karakteristik=="Tingkat Partisipasi Angkatan Kerja (%)") {
                $chart_tpak[] = $item->laki_laki;
                $chart_tpak[] = $item->perempuan;
            }

            if ($item->karakteristik=="Tingkat Kesempatan Kerja (%)") {
                $chart_tkk[] = $item->laki_laki;
                $chart_tkk[] = $item->perempuan;
            }

            if ($item->karakteristik=="Tingkat Pengangguran Terbuka (%)") {
                $chart_tpt[] = $item->laki_laki;
                $chart_tpt[] = $item->perempuan;
            }
        }

        return view('pages.tenagakerja-indikator.index')
            ->with('data', $data)
            ->with('chart_puk', $chart_puk)
            ->with('chart_tpak', $chart_tpak)
            ->with('chart_tkk', $chart_tkk)
            ->with('chart_tpt', $chart_tpt)
            ->with('kategori', $kategori);
    }

    public function create($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = TenagaKerjaIndikator::where('id_kategori', $id_kategori)->get();

        return view('pages.tenagakerja-indikator.create')
            ->with('data', $data)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori)
    {
        
    }

    public function update(Request $request, $id_kategori)
    {
    }
    
    public function store(Request $request, $id_kategori)
    {
        for ($i=0; $i < count($request->karakteristik); $i++) { 
            $insert = new TenagaKerjaIndikator;
            $insert->id_kategori = $id_kategori;
            $insert->karakteristik = $request->karakteristik[$i];
            $insert->laki_laki = $request->laki_laki[$i];
            $insert->perempuan = $request->perempuan[$i];
            $insert->jumlah = $request->jumlah[$i];
            $insert->save();
        }

        return redirect()->route('tenagakerja-indikator.index', $id_kategori);
    }
}
