<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\PolitikPendidikan;

use DB;

class PolitikPendidikanController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikPendidikan::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = PolitikPendidikan::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_partai = PolitikPendidikan::partai();
        $chart_smu = [];
        $chart_d1_d2 = [];
        $chart_s1 = [];
        $chart_s2_s3 = [];
        foreach ($data as $item) {
            $chart_smu[] = $item->smu;
            $chart_d1_d2[] = $item->d1_d2;
            $chart_s1[] = $item->s1;
            $chart_s2_s3[] = $item->s2_s3;
        }

        return view('pages.politik-pendidikan.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_partai', $chart_partai)
            ->with('chart_smu', $chart_smu)
            ->with('chart_d1_d2', $chart_d1_d2)
            ->with('chart_s1', $chart_s1)
            ->with('chart_s2_s3', $chart_s2_s3)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $partai = PolitikPendidikan::partai();

        return view('pages.politik-pendidikan.create')
            ->with('partai', $partai)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikPendidikan::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.politik-pendidikan.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            PolitikPendidikan::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->partai); $i++) { 
                $insert = new PolitikPendidikan;
                $insert->id_kategori = $id_kategori;
                $insert->tahun = $request->tahun;
                $insert->partai = $request->partai[$i];
                $insert->smu = $request->smu[$i];
                $insert->d1_d2 = $request->d1_d2[$i];
                $insert->s1 = $request->s1[$i];
                $insert->s2_s3 = $request->s2_s3[$i];
                $insert->jumlah = ($request->s2_s3[$i] + $request->s1[$i] + $request->d1_d2[$i] + $request->smu[$i]);
                $insert->save();
            }
        });

        return redirect()->route('politik-pendidikan.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->partai); $i++) { 
            $insert = new PolitikPendidikan;
            $insert->id_kategori = $id_kategori;
            $insert->tahun = $request->tahun;
            $insert->partai = $request->partai[$i];
            $insert->smu = $request->smu[$i];
            $insert->d1_d2 = $request->d1_d2[$i];
            $insert->s1 = $request->s1[$i];
            $insert->s2_s3 = $request->s2_s3[$i];
            $insert->jumlah = ($request->s2_s3[$i] + $request->s1[$i] + $request->d1_d2[$i] + $request->smu[$i]);
            $insert->save();
        }

        return redirect()->route('politik-pendidikan.index', [$id_kategori, $request->tahun]);
    }
}
