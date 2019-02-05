<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\PolitikKawin;

use DB;

class PolitikKawinController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikKawin::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = PolitikKawin::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_jk = PolitikKawin::jk();
        $chart_belum_kawin = [];
        $chart_kawin = [];
        $chart_cerai = [];
        foreach ($data as $item) {
            $chart_belum_kawin[] = $item->belum_kawin;
            $chart_kawin[] = $item->kawin;
            $chart_cerai[] = $item->cerai;
        }

        return view('pages.politik-kawin.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_jk', $chart_jk)
            ->with('chart_belum_kawin', $chart_belum_kawin)
            ->with('chart_kawin', $chart_kawin)
            ->with('chart_cerai', $chart_cerai)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $jk = PolitikKawin::jk();

        return view('pages.politik-kawin.create')
            ->with('jk', $jk)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikKawin::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.politik-kawin.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            PolitikKawin::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->jk); $i++) { 
                $insert = new PolitikKawin;
                $insert->id_kategori = $id_kategori;
                $insert->jenis_kelamin = $request->jk[$i];
                $insert->tahun = $request->tahun;
                $insert->belum_kawin = $request->belum_kawin[$i];
                $insert->kawin = $request->kawin[$i];
                $insert->cerai = $request->cerai[$i];
                $insert->save();
            }
        });

        return redirect()->route('politik-kawin.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->jk); $i++) { 
            $insert = new PolitikKawin;
            $insert->id_kategori = $id_kategori;
            $insert->jenis_kelamin = $request->jk[$i];
            $insert->tahun = $request->tahun;
            $insert->belum_kawin = $request->belum_kawin[$i];
            $insert->kawin = $request->kawin[$i];
            $insert->cerai = $request->cerai[$i];
            $insert->save();
        }

        return redirect()->route('politik-kawin.index', [$id_kategori, $request->tahun]);
    }
}
