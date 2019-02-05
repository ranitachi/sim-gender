<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KependudukanAirMandi;

use DB;

class KependudukanAirMandiController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanAirMandi::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = KependudukanAirMandi::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_karakteristik = KependudukanAirMandi::karakteristik();
        $chart_isi_ulang = [];
        $chart_leding = [];
        $chart_sumur_pompa = [];
        $chart_mata_air_terlindungi = [];
        $chart_mata_air_tidak_terlindungi = [];
        foreach ($data as $item) {
            $chart_isi_ulang[] = $item->isi_ulang;
            $chart_leding[] = $item->leding;
            $chart_sumur_pompa[] = $item->sumur_pompa;
            $chart_mata_air_terlindungi[] = $item->mata_air_terlindungi;
            $chart_mata_air_tidak_terlindungi[] = $item->mata_air_tidak_terlindungi;
        }

        return view('pages.kependudukan-air-mandi.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_karakteristik', $chart_karakteristik)
            ->with('chart_isi_ulang', $chart_isi_ulang)
            ->with('chart_leding', $chart_leding)
            ->with('chart_sumur_pompa', $chart_sumur_pompa)
            ->with('chart_mata_air_terlindungi', $chart_mata_air_terlindungi)
            ->with('chart_mata_air_tidak_terlindungi', $chart_mata_air_tidak_terlindungi)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $karakteristik = KependudukanAirMandi::karakteristik();

        return view('pages.kependudukan-air-mandi.create')
            ->with('karakteristik', $karakteristik)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanAirMandi::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.kependudukan-air-mandi.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            KependudukanAirMandi::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->karakteristik); $i++) { 
                $insert = new KependudukanAirMandi;
                $insert->id_kategori = $id_kategori;
                $insert->karakteristik = $request->karakteristik[$i];
                $insert->tahun = $request->tahun;
                $insert->isi_ulang = $request->isi_ulang[$i];
                $insert->leding = $request->leding[$i];
                $insert->sumur_pompa = $request->sumur_pompa[$i];
                $insert->mata_air_terlindungi = $request->mata_air_terlindungi[$i];
                $insert->mata_air_tidak_terlindungi = $request->mata_air_tidak_terlindungi[$i];
                $insert->save();
            }
        });

        return redirect()->route('kependudukan-air-mandi.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->karakteristik); $i++) { 
            $insert = new KependudukanAirMandi;
            $insert->id_kategori = $id_kategori;
            $insert->karakteristik = $request->karakteristik[$i];
            $insert->tahun = $request->tahun;
            $insert->isi_ulang = $request->isi_ulang[$i];
            $insert->leding = $request->leding[$i];
            $insert->sumur_pompa = $request->sumur_pompa[$i];
            $insert->mata_air_terlindungi = $request->mata_air_terlindungi[$i];
            $insert->mata_air_tidak_terlindungi = $request->mata_air_tidak_terlindungi[$i];
            $insert->save();
        }

        return redirect()->route('kependudukan-air-mandi.index', [$id_kategori, $request->tahun]);
    }
}
