<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KependudukanSusila;

use DB;

class KependudukanSusilaController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanSusila::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->with('kecamatan')
            ->get();

        $tahun_tersedia = KependudukanSusila::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_kecamatan = [];
        $chart_susila_laki = [];
        $chart_susila_perempuan = [];
        $chart_napza_laki = [];
        $chart_napza_perempuan = [];
        foreach ($data as $item) {
            $chart_kecamatan[] = ucwords(strtolower($item->kecamatan->nama_kecamatan));
            $chart_susila_laki[] = $item->susila_laki;
            $chart_susila_perempuan[] = $item->susila_perempuan;
            $chart_napza_laki[] = $item->napza_laki;
            $chart_napza_perempuan[] = $item->napza_perempuan;
        }

        return view('pages.kependudukan-susila.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_kecamatan', $chart_kecamatan)
            ->with('chart_susila_laki', $chart_susila_laki)
            ->with('chart_susila_perempuan', $chart_susila_perempuan)
            ->with('chart_napza_laki', $chart_napza_laki)
            ->with('chart_napza_perempuan', $chart_napza_perempuan)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $kecamatan = Kecamatan::all();

        return view('pages.kependudukan-susila.create')
            ->with('kecamatan', $kecamatan)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanSusila::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->with('kecamatan')
            ->get();

        return view('pages.kependudukan-susila.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            KependudukanSusila::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->id_kecamatan); $i++) { 
                $insert = new KependudukanSusila;
                $insert->id_kategori = $id_kategori;
                $insert->id_kecamatan = $request->id_kecamatan[$i];
                $insert->tahun = $request->tahun;
                $insert->susila_laki = $request->susila_laki[$i];
                $insert->susila_perempuan = $request->susila_perempuan[$i];
                $insert->napza_laki = $request->napza_laki[$i];
                $insert->napza_perempuan = $request->napza_perempuan[$i];
                $insert->save();
            }
        });

        return redirect()->route('kependudukan-susila.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->id_kecamatan); $i++) { 
            $insert = new KependudukanSusila;
            $insert->id_kategori = $id_kategori;
            $insert->id_kecamatan = $request->id_kecamatan[$i];
            $insert->tahun = $request->tahun;
            $insert->susila_laki = $request->susila_laki[$i];
            $insert->susila_perempuan = $request->susila_perempuan[$i];
            $insert->napza_laki = $request->napza_laki[$i];
            $insert->napza_perempuan = $request->napza_perempuan[$i];
            $insert->save();
        }

        return redirect()->route('kependudukan-susila.index', [$id_kategori, $request->tahun]);
    }
}
