<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\PolitikStatus;

use DB;

class PolitikStatusController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikStatus::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = PolitikStatus::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_jk = PolitikStatus::jk();
        $chart_tidak_bekerja = [];
        $chart_bekerja = [];
        foreach ($data as $item) {
            $chart_tidak_bekerja[] = $item->tidak_bekerja;
            $chart_bekerja[] = $item->bekerja;
        }

        return view('pages.politik-status.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_jk', $chart_jk)
            ->with('chart_tidak_bekerja', $chart_tidak_bekerja)
            ->with('chart_bekerja', $chart_bekerja)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $jk = PolitikStatus::jk();

        return view('pages.politik-status.create')
            ->with('jk', $jk)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikStatus::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.politik-status.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            PolitikStatus::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->jk); $i++) { 
                $insert = new PolitikStatus;
                $insert->id_kategori = $id_kategori;
                $insert->jenis_kelamin = $request->jk[$i];
                $insert->tahun = $request->tahun;
                $insert->tidak_bekerja = $request->tidak_bekerja[$i];
                $insert->bekerja = $request->bekerja[$i];
                $insert->save();
            }
        });

        return redirect()->route('politik-status.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->jk); $i++) { 
            $insert = new PolitikStatus;
            $insert->id_kategori = $id_kategori;
            $insert->jenis_kelamin = $request->jk[$i];
            $insert->tahun = $request->tahun;
            $insert->tidak_bekerja = $request->tidak_bekerja[$i];
            $insert->bekerja = $request->bekerja[$i];
            $insert->save();
        }

        return redirect()->route('politik-status.index', [$id_kategori, $request->tahun]);
    }
}
