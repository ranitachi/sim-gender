<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KependudukanPNS;

use DB;

class KependudukanPNSController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanPNS::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = KependudukanPNS::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_karakteristik = KependudukanPNS::karakteristik();
        $chart_laki = [];
        $chart_perempuan = [];
        foreach ($data as $item) {
            $chart_laki[] = $item->laki;
            $chart_perempuan[] = $item->perempuan;
        }

        return view('pages.kependudukan-pns.index')
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

        $karakteristik = KependudukanPNS::karakteristik();

        return view('pages.kependudukan-pns.create')
            ->with('karakteristik', $karakteristik)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanPNS::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.kependudukan-pns.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            KependudukanPNS::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->karakteristik); $i++) { 
                $insert = new KependudukanPNS;
                $insert->id_kategori = $id_kategori;
                $insert->karakteristik = $request->karakteristik[$i];
                $insert->tahun = $request->tahun;
                $insert->laki = $request->laki[$i];
                $insert->perempuan = $request->perempuan[$i];
                $insert->jumlah = ($request->laki[$i] + $request->perempuan[$i]);
                $insert->save();
            }
        });

        return redirect()->route('kependudukan-pns.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->karakteristik); $i++) { 
            $insert = new KependudukanPNS;
            $insert->id_kategori = $id_kategori;
            $insert->karakteristik = $request->karakteristik[$i];
            $insert->tahun = $request->tahun;
            $insert->laki = $request->laki[$i];
            $insert->perempuan = $request->perempuan[$i];
            $insert->jumlah = ($request->laki[$i] + $request->perempuan[$i]);
            $insert->save();
        }

        return redirect()->route('kependudukan-pns.index', [$id_kategori, $request->tahun]);
    }
}
