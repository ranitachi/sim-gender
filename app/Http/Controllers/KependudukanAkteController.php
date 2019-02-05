<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KependudukanAkte;

use DB;

class KependudukanAkteController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanAkte::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = KependudukanAkte::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_karakteristik = KependudukanAkte::karakteristik();
        $chart_jumlah = [];
        foreach ($data as $item) {
            $chart_jumlah[] = $item->jumlah;
        }

        return view('pages.kependudukan-akte.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_karakteristik', $chart_karakteristik)
            ->with('chart_jumlah', $chart_jumlah)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $karakteristik = KependudukanAkte::karakteristik();

        return view('pages.kependudukan-akte.create')
            ->with('karakteristik', $karakteristik)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanAkte::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.kependudukan-akte.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            KependudukanAkte::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->karakteristik); $i++) { 
                $insert = new KependudukanAkte;
                $insert->id_kategori = $id_kategori;
                $insert->jenis_akte = $request->karakteristik[$i];
                $insert->tahun = $request->tahun;
                $insert->jumlah = $request->jumlah[$i];
                $insert->save();
            }
        });

        return redirect()->route('kependudukan-akte.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->karakteristik); $i++) { 
            $insert = new KependudukanAkte;
            $insert->id_kategori = $id_kategori;
            $insert->jenis_akte = $request->karakteristik[$i];
            $insert->tahun = $request->tahun;
            $insert->jumlah = $request->jumlah[$i];
            $insert->save();
        }

        return redirect()->route('kependudukan-akte.index', [$id_kategori, $request->tahun]);
    }
}
