<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KependudukanCerai;

use DB;

class KependudukanCeraiController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanCerai::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->with('kecamatan')
            ->get();

        $tahun_tersedia = KependudukanCerai::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_kecamatan = [];
        $chart_talak = [];
        $chart_gugat = [];
        $chart_pengesahan = [];
        $chart_lain_lain = [];
        foreach ($data as $item) {
            $chart_kecamatan[] = ucwords(strtolower($item->kecamatan->nama_kecamatan));
            $chart_talak[] = $item->talak;
            $chart_gugat[] = $item->gugat;
            $chart_pengesahan[] = $item->pengesahan;
            $chart_lain_lain[] = $item->lain_lain;
        }

        return view('pages.kependudukan-cerai.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_kecamatan', $chart_kecamatan)
            ->with('chart_talak', $chart_talak)
            ->with('chart_gugat', $chart_gugat)
            ->with('chart_pengesahan', $chart_pengesahan)
            ->with('chart_lain_lain', $chart_lain_lain)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $kecamatan = Kecamatan::all();

        return view('pages.kependudukan-cerai.create')
            ->with('kecamatan', $kecamatan)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanCerai::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->with('kecamatan')
            ->get();

        return view('pages.kependudukan-cerai.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            KependudukanCerai::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->id_kecamatan); $i++) { 
                $insert = new KependudukanCerai;
                $insert->id_kategori = $id_kategori;
                $insert->id_kecamatan = $request->id_kecamatan[$i];
                $insert->tahun = $request->tahun;
                $insert->talak = $request->talak[$i];
                $insert->gugat = $request->gugat[$i];
                $insert->pengesahan = $request->pengesahan[$i];
                $insert->lain_lain = $request->lain_lain[$i];
                $insert->jumlah = ($request->talak[$i] + $request->gugat[$i] + $request->pengesahan[$i] + $request->lain_lain[$i]);
                $insert->save();
            }
        });

        return redirect()->route('kependudukan-cerai.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->id_kecamatan); $i++) { 
            $insert = new KependudukanCerai;
            $insert->id_kategori = $id_kategori;
            $insert->id_kecamatan = $request->id_kecamatan[$i];
            $insert->tahun = $request->tahun;
            $insert->talak = $request->talak[$i];
            $insert->gugat = $request->gugat[$i];
            $insert->pengesahan = $request->pengesahan[$i];
            $insert->lain_lain = $request->lain_lain[$i];
            $insert->jumlah = ($request->talak[$i] + $request->gugat[$i] + $request->pengesahan[$i] + $request->lain_lain[$i]);
            $insert->save();
        }

        return redirect()->route('kependudukan-cerai.index', [$id_kategori, $request->tahun]);
    }
}
