<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\PolitikKorban;

use DB;

class PolitikKorbanController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikKorban::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = PolitikKorban::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_jk = PolitikKorban::jk();
        $chart_orang_tua = [];
        $chart_keluarga = [];
        $chart_suami_istri = [];
        $chart_lainnya = [];
        foreach ($data as $item) {
            $chart_orang_tua[] = $item->orang_tua;
            $chart_keluarga[] = $item->keluarga;
            $chart_suami_istri[] = $item->suami_istri;
            $chart_lainnya[] = $item->lainnya;
        }

        return view('pages.politik-korban.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_jk', $chart_jk)
            ->with('chart_orang_tua', $chart_orang_tua)
            ->with('chart_keluarga', $chart_keluarga)
            ->with('chart_suami_istri', $chart_suami_istri)
            ->with('chart_lainnya', $chart_lainnya)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $jk = PolitikKorban::jk();

        return view('pages.politik-korban.create')
            ->with('jk', $jk)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikKorban::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.politik-korban.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            PolitikKorban::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->jk); $i++) { 
                $insert = new PolitikKorban;
                $insert->id_kategori = $id_kategori;
                $insert->jenis_kelamin = $request->jk[$i];
                $insert->tahun = $request->tahun;
                $insert->orang_tua = $request->orang_tua[$i];
                $insert->keluarga = $request->keluarga[$i];
                $insert->suami_istri = $request->suami_istri[$i];
                $insert->lainnya = $request->lainnya[$i];
                $insert->save();
            }
        });

        return redirect()->route('politik-korban.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->jk); $i++) { 
            $insert = new PolitikKorban;
            $insert->id_kategori = $id_kategori;
            $insert->jenis_kelamin = $request->jk[$i];
            $insert->tahun = $request->tahun;
            $insert->orang_tua = $request->orang_tua[$i];
            $insert->keluarga = $request->keluarga[$i];
            $insert->suami_istri = $request->suami_istri[$i];
            $insert->lainnya = $request->lainnya[$i];
            $insert->save();
        }

        return redirect()->route('politik-korban.index', [$id_kategori, $request->tahun]);
    }
}
