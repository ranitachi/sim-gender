<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KependudukanPerempuan;

use DB;

class KependudukanPerempuanController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanPerempuan::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->with('kecamatan')
            ->get();

        $tahun_tersedia = KependudukanPerempuan::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_kecamatan = [];
        $chart_ekonomi = [];
        $chart_psikologis = [];
        foreach ($data as $item) {
            $chart_kecamatan[] = ucwords(strtolower($item->kecamatan->nama_kecamatan));
            $chart_ekonomi[] = $item->ekonomi;
            $chart_psikologis[] = $item->psikologis;
        }

        return view('pages.kependudukan-perempuan.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_kecamatan', $chart_kecamatan)
            ->with('chart_ekonomi', $chart_ekonomi)
            ->with('chart_psikologis', $chart_psikologis)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $kecamatan = Kecamatan::all();

        return view('pages.kependudukan-perempuan.create')
            ->with('kecamatan', $kecamatan)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanPerempuan::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->with('kecamatan')
            ->get();

        return view('pages.kependudukan-perempuan.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            KependudukanPerempuan::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->id_kecamatan); $i++) { 
                $insert = new KependudukanPerempuan;
                $insert->id_kategori = $id_kategori;
                $insert->id_kecamatan = $request->id_kecamatan[$i];
                $insert->tahun = $request->tahun;
                $insert->ekonomi = $request->ekonomi[$i];
                $insert->psikologis = $request->psikologis[$i];
                $insert->save();
            }
        });

        return redirect()->route('kependudukan-perempuan.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->id_kecamatan); $i++) { 
            $insert = new KependudukanPerempuan;
            $insert->id_kategori = $id_kategori;
            $insert->id_kecamatan = $request->id_kecamatan[$i];
            $insert->tahun = $request->tahun;
            $insert->ekonomi = $request->ekonomi[$i];
            $insert->psikologis = $request->psikologis[$i];
            $insert->save();
        }

        return redirect()->route('kependudukan-perempuan.index', [$id_kategori, $request->tahun]);
    }
}
