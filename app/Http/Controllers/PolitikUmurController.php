<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\PolitikUmur;

use DB;

class PolitikUmurController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikUmur::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = PolitikUmur::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_jk = PolitikUmur::jk();
        $chart_17 = [];
        $chart_25 = [];
        $chart_59 = [];
        $chart_60 = [];
        foreach ($data as $item) {
            $chart_17[] = $item->umur_17;
            $chart_25[] = $item->umur_24;
            $chart_59[] = $item->umur_59;
            $chart_60[] = $item->umur_60;
        }

        return view('pages.politik-umur.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_jk', $chart_jk)
            ->with('chart_17', $chart_17)
            ->with('chart_25', $chart_25)
            ->with('chart_59', $chart_59)
            ->with('chart_60', $chart_60)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $jk = PolitikUmur::jk();

        return view('pages.politik-umur.create')
            ->with('jk', $jk)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikUmur::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.politik-umur.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            PolitikUmur::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->jk); $i++) { 
                $insert = new PolitikUmur;
                $insert->id_kategori = $id_kategori;
                $insert->jenis_kelamin = $request->jk[$i];
                $insert->tahun = $request->tahun;
                $insert->umur_17 = $request->umur_17[$i];
                $insert->umur_24 = $request->umur_24[$i];
                $insert->umur_59 = $request->umur_59[$i];
                $insert->umur_60 = $request->umur_60[$i];
                $insert->save();
            }
        });

        return redirect()->route('politik-umur.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->jk); $i++) { 
            $insert = new PolitikUmur;
            $insert->id_kategori = $id_kategori;
            $insert->jenis_kelamin = $request->jk[$i];
            $insert->tahun = $request->tahun;
            $insert->umur_17 = $request->umur_17[$i];
            $insert->umur_24 = $request->umur_24[$i];
            $insert->umur_59 = $request->umur_59[$i];
            $insert->umur_60 = $request->umur_60[$i];
            $insert->save();
        }

        return redirect()->route('politik-umur.index', [$id_kategori, $request->tahun]);
    }
}
