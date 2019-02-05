<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\PolitikTingkat;

use DB;

class PolitikTingkatController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikTingkat::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        $tahun_tersedia = PolitikTingkat::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_jk = PolitikTingkat::jk();
        $chart_ts = [];
        $chart_sd = [];
        $chart_sltp = [];
        $chart_slta = [];
        $chart_pt = [];
        foreach ($data as $item) {
            $chart_ts[] = $item->tidak_sekolah;
            $chart_sd[] = $item->sd;
            $chart_sltp[] = $item->sltp;
            $chart_slta[] = $item->slta;
            $chart_pt[] = $item->pt;
        }

        return view('pages.politik-tingkat.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_jk', $chart_jk)
            ->with('chart_ts', $chart_ts)
            ->with('chart_sd', $chart_sd)
            ->with('chart_sltp', $chart_sltp)
            ->with('chart_slta', $chart_slta)
            ->with('chart_pt', $chart_pt)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $jk = PolitikTingkat::jk();

        return view('pages.politik-tingkat.create')
            ->with('jk', $jk)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PolitikTingkat::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->get();

        return view('pages.politik-tingkat.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            PolitikTingkat::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->jk); $i++) { 
                $insert = new PolitikTingkat;
                $insert->id_kategori = $id_kategori;
                $insert->jenis_kelamin = $request->jk[$i];
                $insert->tahun = $request->tahun;
                $insert->tidak_sekolah = $request->tidak_sekolah[$i];
                $insert->sd = $request->sd[$i];
                $insert->sltp = $request->sltp[$i];
                $insert->slta = $request->slta[$i];
                $insert->pt = $request->pt[$i];
                $insert->save();
            }
        });

        return redirect()->route('politik-tingkat.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->jk); $i++) { 
            $insert = new PolitikTingkat;
            $insert->id_kategori = $id_kategori;
            $insert->jenis_kelamin = $request->jk[$i];
            $insert->tahun = $request->tahun;
            $insert->tidak_sekolah = $request->tidak_sekolah[$i];
            $insert->sd = $request->sd[$i];
            $insert->sltp = $request->sltp[$i];
            $insert->slta = $request->slta[$i];
            $insert->pt = $request->pt[$i];
            $insert->save();
        }

        return redirect()->route('politik-tingkat.index', [$id_kategori, $request->tahun]);
    }
}
