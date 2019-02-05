<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KependudukanDitempati;

use DB;

class KependudukanDitempatiController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanDitempati::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = KependudukanDitempati::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_karakteristik = KependudukanDitempati::karakteristik();
        $chart_milik_sendiri = [];
        $chart_kontrak = [];
        $chart_bebas_sewa = [];
        $chart_lainnya = [];
        foreach ($data as $item) {
            $chart_milik_sendiri[] = $item->milik_sendiri;
            $chart_kontrak[] = $item->kontrak;
            $chart_bebas_sewa[] = $item->bebas_sewa;
            $chart_lainnya[] = $item->lainnya;
        }

        return view('pages.kependudukan-ditempati.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_karakteristik', $chart_karakteristik)
            ->with('chart_milik_sendiri', $chart_milik_sendiri)
            ->with('chart_kontrak', $chart_kontrak)
            ->with('chart_bebas_sewa', $chart_bebas_sewa)
            ->with('chart_lainnya', $chart_lainnya)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $karakteristik = KependudukanDitempati::karakteristik();

        return view('pages.kependudukan-ditempati.create')
            ->with('karakteristik', $karakteristik)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanDitempati::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.kependudukan-ditempati.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            KependudukanDitempati::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->karakteristik); $i++) { 
                $insert = new KependudukanDitempati;
                $insert->id_kategori = $id_kategori;
                $insert->karakteristik = $request->karakteristik[$i];
                $insert->tahun = $request->tahun;
                $insert->milik_sendiri = $request->milik_sendiri[$i];
                $insert->kontrak = $request->kontrak[$i];
                $insert->bebas_sewa = $request->bebas_sewa[$i];
                $insert->lainnya = $request->lainnya[$i];
                $insert->save();
            }
        });

        return redirect()->route('kependudukan-ditempati.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->karakteristik); $i++) { 
            $insert = new KependudukanDitempati;
            $insert->id_kategori = $id_kategori;
            $insert->karakteristik = $request->karakteristik[$i];
            $insert->tahun = $request->tahun;
            $insert->milik_sendiri = $request->milik_sendiri[$i];
            $insert->kontrak = $request->kontrak[$i];
            $insert->bebas_sewa = $request->bebas_sewa[$i];
            $insert->lainnya = $request->lainnya[$i];
            $insert->save();
        }

        return redirect()->route('kependudukan-ditempati.index', [$id_kategori, $request->tahun]);
    }
}
