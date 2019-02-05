<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KependudukanMilikSendiri;

use DB;

class KependudukanMilikSendiriController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanMilikSendiri::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = KependudukanMilikSendiri::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_karakteristik = KependudukanMilikSendiri::karakteristik();
        $chart_shm_art = [];
        $chart_shm_non_art = [];
        $chart_shgb = [];
        $chart_lainnya = [];
        $chart_tidak_punya = [];
        foreach ($data as $item) {
            $chart_shm_art[] = $item->shm_art;
            $chart_shm_non_art[] = $item->shm_non_art;
            $chart_shgb[] = $item->shgb;
            $chart_lainnya[] = $item->lainnya;
            $chart_tidak_punya[] = $item->tidak_punya;
        }

        return view('pages.kependudukan-milik-sendiri.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_karakteristik', $chart_karakteristik)
            ->with('chart_shm_art', $chart_shm_art)
            ->with('chart_shm_non_art', $chart_shm_non_art)
            ->with('chart_shgb', $chart_shgb)
            ->with('chart_lainnya', $chart_lainnya)
            ->with('chart_tidak_punya', $chart_tidak_punya)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $karakteristik = KependudukanMilikSendiri::karakteristik();

        return view('pages.kependudukan-milik-sendiri.create')
            ->with('karakteristik', $karakteristik)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanMilikSendiri::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.kependudukan-milik-sendiri.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            KependudukanMilikSendiri::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->karakteristik); $i++) { 
                $insert = new KependudukanMilikSendiri;
                $insert->id_kategori = $id_kategori;
                $insert->karakteristik = $request->karakteristik[$i];
                $insert->tahun = $request->tahun;
                $insert->shm_art = $request->shm_art[$i];
                $insert->shm_non_art = $request->shm_non_art[$i];
                $insert->shgb = $request->shgb[$i];
                $insert->lainnya = $request->lainnya[$i];
                $insert->tidak_punya = $request->tidak_punya[$i];
                $insert->save();
            }
        });

        return redirect()->route('kependudukan-milik-sendiri.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->karakteristik); $i++) { 
            $insert = new KependudukanMilikSendiri;
            $insert->id_kategori = $id_kategori;
            $insert->karakteristik = $request->karakteristik[$i];
            $insert->tahun = $request->tahun;
            $insert->shm_art = $request->shm_art[$i];
            $insert->shm_non_art = $request->shm_non_art[$i];
            $insert->shgb = $request->shgb[$i];
            $insert->lainnya = $request->lainnya[$i];
            $insert->tidak_punya = $request->tidak_punya[$i];
            $insert->save();
        }

        return redirect()->route('kependudukan-milik-sendiri.index', [$id_kategori, $request->tahun]);
    }
}
