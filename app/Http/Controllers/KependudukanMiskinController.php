<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KependudukanMiskin;

use DB;

class KependudukanMiskinController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanMiskin::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->with('kecamatan')
            ->get();

        $tahun_tersedia = KependudukanMiskin::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_kecamatan = [];
        $chart_hampir_miskin = [];
        $chart_miskin = [];
        $chart_sangat_miskin = [];
        foreach ($data as $item) {
            $chart_kecamatan[] = ucwords(strtolower($item->kecamatan->nama_kecamatan));
            $chart_hampir_miskin[] = $item->hampir_miskin;
            $chart_miskin[] = $item->miskin;
            $chart_sangat_miskin[] = $item->sangat_miskin;
        }

        return view('pages.kependudukan-miskin.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_kecamatan', $chart_kecamatan)
            ->with('chart_hampir_miskin', $chart_hampir_miskin)
            ->with('chart_miskin', $chart_miskin)
            ->with('chart_sangat_miskin', $chart_sangat_miskin)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $kecamatan = Kecamatan::all();

        return view('pages.kependudukan-miskin.create')
            ->with('kecamatan', $kecamatan)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanMiskin::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->with('kecamatan')
            ->get();

        return view('pages.kependudukan-miskin.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            KependudukanMiskin::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->id_kecamatan); $i++) { 
                $insert = new KependudukanMiskin;
                $insert->id_kategori = $id_kategori;
                $insert->id_kecamatan = $request->id_kecamatan[$i];
                $insert->tahun = $request->tahun;
                $insert->hampir_miskin = $request->hampir_miskin[$i];
                $insert->miskin = $request->miskin[$i];
                $insert->sangat_miskin = $request->sangat_miskin[$i];
                $insert->jumlah = ($request->hampir_miskin[$i] + $request->miskin[$i] + $request->sangat_miskin[$i]);
                $insert->save();
            }
        });

        return redirect()->route('kependudukan-miskin.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->id_kecamatan); $i++) { 
            $insert = new KependudukanMiskin;
            $insert->id_kategori = $id_kategori;
            $insert->id_kecamatan = $request->id_kecamatan[$i];
            $insert->tahun = $request->tahun;
            $insert->hampir_miskin = $request->hampir_miskin[$i];
            $insert->miskin = $request->miskin[$i];
            $insert->sangat_miskin = $request->sangat_miskin[$i];
            $insert->jumlah = ($request->hampir_miskin[$i] + $request->miskin[$i] + $request->sangat_miskin[$i]);
            $insert->save();
        }

        return redirect()->route('kependudukan-miskin.index', [$id_kategori, $request->tahun]);
    }
}
