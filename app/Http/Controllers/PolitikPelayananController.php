<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\PolitikPelayanan;

use DB;

class PolitikPelayananController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikPelayanan::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = PolitikPelayanan::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_jk = PolitikPelayanan::jk();
        $chart_penanganan = [];
        $chart_penegakan = [];
        foreach ($data as $item) {
            $chart_penanganan[] = $item->penanganan;
            $chart_penegakan[] = $item->penegakan;
        }

        return view('pages.politik-pelayanan.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_jk', $chart_jk)
            ->with('chart_penanganan', $chart_penanganan)
            ->with('chart_penegakan', $chart_penegakan)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $jk = PolitikPelayanan::jk();

        return view('pages.politik-pelayanan.create')
            ->with('jk', $jk)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikPelayanan::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.politik-pelayanan.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            PolitikPelayanan::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->jk); $i++) { 
                $insert = new PolitikPelayanan;
                $insert->id_kategori = $id_kategori;
                $insert->jenis_kelamin = $request->jk[$i];
                $insert->tahun = $request->tahun;
                $insert->penanganan = $request->penanganan[$i];
                $insert->penegakan = $request->penegakan[$i];
                $insert->save();
            }
        });

        return redirect()->route('politik-pelayanan.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->jk); $i++) { 
            $insert = new PolitikPelayanan;
            $insert->id_kategori = $id_kategori;
            $insert->jenis_kelamin = $request->jk[$i];
            $insert->tahun = $request->tahun;
            $insert->penanganan = $request->penanganan[$i];
            $insert->penegakan = $request->penegakan[$i];
            $insert->save();
        }

        return redirect()->route('politik-pelayanan.index', [$id_kategori, $request->tahun]);
    }
}
