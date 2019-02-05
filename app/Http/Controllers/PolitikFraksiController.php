<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\PolitikFraksi;

use DB;

class PolitikFraksiController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikFraksi::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = PolitikFraksi::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_partai = PolitikFraksi::partai();
        $chart_laki = [];
        $chart_perempuan = [];
        foreach ($data as $item) {
            $chart_laki[] = $item->laki;
            $chart_perempuan[] = $item->perempuan;
        }

        return view('pages.politik-fraksi.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_partai', $chart_partai)
            ->with('chart_laki', $chart_laki)
            ->with('chart_perempuan', $chart_perempuan)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $partai = PolitikFraksi::partai();

        return view('pages.politik-fraksi.create')
            ->with('partai', $partai)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikFraksi::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.politik-fraksi.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            PolitikFraksi::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->partai); $i++) { 
                $insert = new PolitikFraksi;
                $insert->id_kategori = $id_kategori;
                $insert->tahun = $request->tahun;
                $insert->partai = $request->partai[$i];
                $insert->laki = $request->laki[$i];
                $insert->perempuan = $request->perempuan[$i];
                $insert->jumlah = ($request->laki[$i] + $request->perempuan[$i]);
                $insert->save();
            }
        });

        return redirect()->route('politik-fraksi.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->partai); $i++) { 
            $insert = new PolitikFraksi;
            $insert->id_kategori = $id_kategori;
            $insert->tahun = $request->tahun;
            $insert->partai = $request->partai[$i];
            $insert->laki = $request->laki[$i];
            $insert->perempuan = $request->perempuan[$i];
            $insert->jumlah = ($request->laki[$i] + $request->perempuan[$i]);
            $insert->save();
        }

        return redirect()->route('politik-fraksi.index', [$id_kategori, $request->tahun]);
    }
}
