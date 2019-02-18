<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KependudukanGelandangan;

use DB;

class KependudukanGelandanganController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanGelandangan::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = KependudukanGelandangan::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_karakteristik = KependudukanGelandangan::karakteristik();
        $chart_laki = [];
        $chart_perempuan = [];
        foreach ($data as $item) {
            $chart_laki[] = $item->laki;
            $chart_perempuan[] = $item->perempuan;
        }

        return view('pages.kependudukan-gelandangan.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_karakteristik', $chart_karakteristik)
            ->with('chart_laki', $chart_laki)
            ->with('chart_perempuan', $chart_perempuan)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $karakteristik = KependudukanGelandangan::karakteristik();

        return view('pages.kependudukan-gelandangan.create')
            ->with('karakteristik', $karakteristik)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanGelandangan::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.kependudukan-gelandangan.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            KependudukanGelandangan::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->karakteristik); $i++) { 
                $insert = new KependudukanGelandangan;
                $insert->id_kategori = $id_kategori;
                $insert->karakteristik = $request->karakteristik[$i];
                $insert->tahun = $request->tahun;
                $insert->laki = $request->laki[$i];
                $insert->perempuan = $request->perempuan[$i];
                $insert->jumlah = ($request->laki[$i] + $request->perempuan[$i]);
                $insert->save();
            }
        });

        return redirect()->route('kependudukan-gelandangan.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->karakteristik); $i++) { 
            $insert = new KependudukanGelandangan;
            $insert->id_kategori = $id_kategori;
            $insert->karakteristik = $request->karakteristik[$i];
            $insert->tahun = $request->tahun;
            $insert->laki = $request->laki[$i];
            $insert->perempuan = $request->perempuan[$i];
            $insert->jumlah = ($request->laki[$i] + $request->perempuan[$i]);
            $insert->save();
        }

        return redirect()->route('kependudukan-gelandangan.index', [$id_kategori, $request->tahun]);
    }
}
