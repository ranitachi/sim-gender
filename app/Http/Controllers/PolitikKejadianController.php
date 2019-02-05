<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\PolitikKejadian;

use DB;

class PolitikKejadianController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikKejadian::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = PolitikKejadian::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_jk = PolitikKejadian::jk();
        $chart_rumah_tangga = [];
        $chart_tempat_kerja = [];
        $chart_lainnya = [];
        foreach ($data as $item) {
            $chart_rumah_tangga[] = $item->rumah_tangga;
            $chart_tempat_kerja[] = $item->tempat_kerja;
            $chart_lainnya[] = $item->lainnya;
        }

        return view('pages.politik-kejadian.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_jk', $chart_jk)
            ->with('chart_rumah_tangga', $chart_rumah_tangga)
            ->with('chart_tempat_kerja', $chart_tempat_kerja)
            ->with('chart_lainnya', $chart_lainnya)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $jk = PolitikKejadian::jk();

        return view('pages.politik-kejadian.create')
            ->with('jk', $jk)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikKejadian::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.politik-kejadian.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            PolitikKejadian::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->jk); $i++) { 
                $insert = new PolitikKejadian;
                $insert->id_kategori = $id_kategori;
                $insert->jenis_kelamin = $request->jk[$i];
                $insert->tahun = $request->tahun;
                $insert->rumah_tangga = $request->rumah_tangga[$i];
                $insert->tempat_kerja = $request->tempat_kerja[$i];
                $insert->lainnya = $request->lainnya[$i];
                $insert->save();
            }
        });

        return redirect()->route('politik-kejadian.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->jk); $i++) { 
            $insert = new PolitikKejadian;
            $insert->id_kategori = $id_kategori;
            $insert->jenis_kelamin = $request->jk[$i];
            $insert->tahun = $request->tahun;
            $insert->rumah_tangga = $request->rumah_tangga[$i];
            $insert->tempat_kerja = $request->tempat_kerja[$i];
            $insert->lainnya = $request->lainnya[$i];
            $insert->save();
        }

        return redirect()->route('politik-kejadian.index', [$id_kategori, $request->tahun]);
    }
}
