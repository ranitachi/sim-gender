<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KependudukanBalita;

use DB;

class KependudukanBalitaController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanBalita::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->with('kecamatan')
            ->get();

        $tahun_tersedia = KependudukanBalita::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_kecamatan = [];
        $chart_balita_l = [];
        $chart_balita_p = [];
        $chart_terlantar_l = [];
        $chart_terlantar_p = [];
        $chart_bermasalah_l = [];
        $chart_bermasalah_p = [];
        foreach ($data as $item) {
            $chart_kecamatan[] = ucwords(strtolower($item->kecamatan->nama_kecamatan));
            $chart_balita_l[] = $item->balita_l;
            $chart_balita_p[] = $item->balita_p;
            $chart_terlantar_l[] = $item->terlantar_l;
            $chart_terlantar_p[] = $item->terlantar_p;
            $chart_bermasalah_l[] = $item->bermasalah_l;
            $chart_bermasalah_p[] = $item->bermasalah_p;
        }

        return view('pages.kependudukan-balita.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_kecamatan', $chart_kecamatan)
            ->with('chart_balita_l', $chart_balita_l)
            ->with('chart_balita_p', $chart_balita_p)
            ->with('chart_terlantar_l', $chart_terlantar_l)
            ->with('chart_terlantar_p', $chart_terlantar_p)
            ->with('chart_bermasalah_l', $chart_bermasalah_l)
            ->with('chart_bermasalah_p', $chart_bermasalah_p)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $kecamatan = Kecamatan::all();

        return view('pages.kependudukan-balita.create')
            ->with('kecamatan', $kecamatan)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanBalita::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->with('kecamatan')
            ->get();

        return view('pages.kependudukan-balita.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            KependudukanBalita::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->id_kecamatan); $i++) { 
                $insert = new KependudukanBalita;
                $insert->id_kategori = $id_kategori;
                $insert->id_kecamatan = $request->id_kecamatan[$i];
                $insert->tahun = $request->tahun;
                $insert->balita_l = $request->balita_l[$i];
                $insert->balita_p = $request->balita_p[$i];
                $insert->terlantar_l = $request->terlantar_l[$i];
                $insert->terlantar_p = $request->terlantar_p[$i];
                $insert->bermasalah_l = $request->bermasalah_l[$i];
                $insert->bermasalah_p = $request->bermasalah_p[$i];
                $insert->save();
            }
        });

        return redirect()->route('kependudukan-balita.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->id_kecamatan); $i++) { 
            $insert = new KependudukanBalita;
            $insert->id_kategori = $id_kategori;
            $insert->id_kecamatan = $request->id_kecamatan[$i];
            $insert->tahun = $request->tahun;
            $insert->balita_l = $request->balita_l[$i];
            $insert->balita_p = $request->balita_p[$i];
            $insert->terlantar_l = $request->terlantar_l[$i];
            $insert->terlantar_p = $request->terlantar_p[$i];
            $insert->bermasalah_l = $request->bermasalah_l[$i];
            $insert->bermasalah_p = $request->bermasalah_p[$i];
            $insert->save();
        }

        return redirect()->route('kependudukan-balita.index', [$id_kategori, $request->tahun]);
    }
}
