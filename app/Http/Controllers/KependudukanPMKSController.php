<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KependudukanPMKS;

use DB;

class KependudukanPMKSController extends Controller
{
    public function index($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanPMKS::where('id_kategori', $id_kategori)->with('kecamatan')->get();

        $chart_kecamatan = [];
        $chart_bayi = [];
        $chart_anak = [];
        $chart_apk = [];
        $chart_abh = [];
        $chart_jalan = [];
        $chart_disabilitas = [];
        foreach ($data as $item) {
            $chart_kecamatan[] = ucwords(strtolower($item->kecamatan->nama_kecamatan));
            $chart_bayi[] = $item->bayi_terlantar;
            $chart_anak[] = $item->anak_terlantar;
            $chart_apk[] = $item->anak_perlindungan_khusus;
            $chart_abh[] = $item->anak_berhadapan_hukum;
            $chart_jalan[] = $item->anak_jalanan;
            $chart_disabilitas[] = $item->anak_disabilitas;
        }

        return view('pages.kependudukan-pmks.index')
            ->with('data', $data)
            ->with('chart_kecamatan', $chart_kecamatan)
            ->with('chart_bayi', $chart_bayi)
            ->with('chart_anak', $chart_anak)
            ->with('chart_apk', $chart_apk)
            ->with('chart_abh', $chart_abh)
            ->with('chart_jalan', $chart_jalan)
            ->with('chart_disabilitas', $chart_disabilitas)
            ->with('kategori', $kategori);
    }

    public function create($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $kecamatan = Kecamatan::all();

        return view('pages.kependudukan-pmks.create')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanPMKS::where('id_kategori', $id_kategori)->with('kecamatan')->get();

        return view('pages.kependudukan-pmks.edit')
            ->with('data', $data)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori)
    {
        DB::transaction(function () use($request, $id_kategori) {
            KependudukanPMKS::where('id_kategori', $id_kategori)->forceDelete();
    
            for ($i=0; $i < count($request->id_kecamatan); $i++) { 
                $insert = new KependudukanPMKS;
                $insert->id_kategori = $id_kategori;
                $insert->id_kecamatan = $request->id_kecamatan[$i];
                $insert->bayi_terlantar = $request->bayi_terlantar[$i];
                $insert->anak_terlantar = $request->anak_terlantar[$i];
                $insert->anak_perlindungan_khusus = $request->anak_perlindungan_khusus[$i];
                $insert->anak_berhadapan_hukum = $request->anak_berhadapan_hukum[$i];
                $insert->anak_jalanan = $request->anak_jalanan[$i];
                $insert->anak_disabilitas = $request->anak_disabilitas[$i];
                $insert->save();
            }
        });

        return redirect()->route('kependudukan-pmks.index', $id_kategori);
    }

    public function store(Request $request, $id_kategori)
    {
        for ($i=0; $i < count($request->id_kecamatan); $i++) { 
            $insert = new KependudukanPMKS;
            $insert->id_kategori = $id_kategori;
            $insert->id_kecamatan = $request->id_kecamatan[$i];
            $insert->bayi_terlantar = $request->bayi_terlantar[$i];
            $insert->anak_terlantar = $request->anak_terlantar[$i];
            $insert->anak_perlindungan_khusus = $request->anak_perlindungan_khusus[$i];
            $insert->anak_berhadapan_hukum = $request->anak_berhadapan_hukum[$i];
            $insert->anak_jalanan = $request->anak_jalanan[$i];
            $insert->anak_disabilitas = $request->anak_disabilitas[$i];
            $insert->save();
        }

        return redirect()->route('kependudukan-pmks.index', $id_kategori);
    }
}
