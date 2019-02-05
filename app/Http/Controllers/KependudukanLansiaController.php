<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KependudukanLansia;

use DB;

class KependudukanLansiaController extends Controller
{
    public function index($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanLansia::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->with('kecamatan')
            ->get();

        $tahun_tersedia = KependudukanLansia::select('tahun')->groupby('tahun')->get()->pluck('tahun');

        $chart_kecamatan = [];
        $chart_terlantar_laki = [];
        $chart_terlantar_perempuan = [];
        $chart_cacat_laki = [];
        $chart_cacat_perempuan = [];
        foreach ($data as $item) {
            $chart_kecamatan[] = ucwords(strtolower($item->kecamatan->nama_kecamatan));
            $chart_terlantar_laki[] = $item->terlantar_laki;
            $chart_terlantar_perempuan[] = $item->terlantar_perempuan;
            $chart_cacat_laki[] = $item->cacat_laki;
            $chart_cacat_perempuan[] = $item->cacat_perempuan;
        }

        return view('pages.kependudukan-lansia.index')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('tahun_tersedia', $tahun_tersedia)
            ->with('chart_kecamatan', $chart_kecamatan)
            ->with('chart_terlantar_laki', $chart_terlantar_laki)
            ->with('chart_terlantar_perempuan', $chart_terlantar_perempuan)
            ->with('chart_cacat_laki', $chart_cacat_laki)
            ->with('chart_cacat_perempuan', $chart_cacat_perempuan)
            ->with('kategori', $kategori);
    }
    
    public function create($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $kecamatan = Kecamatan::all();

        return view('pages.kependudukan-lansia.create')
            ->with('kecamatan', $kecamatan)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori, $tahun)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanLansia::where('id_kategori', $id_kategori)
            ->where('tahun', $tahun)
            ->with('kecamatan')
            ->get();

        return view('pages.kependudukan-lansia.edit')
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori, $tahun)
    {
        DB::transaction(function () use($request, $id_kategori, $tahun) {
            KependudukanLansia::where('id_kategori', $id_kategori)->where('tahun', $tahun)->forceDelete();
    
            for ($i=0; $i < count($request->id_kecamatan); $i++) { 
                $insert = new KependudukanLansia;
                $insert->id_kategori = $id_kategori;
                $insert->id_kecamatan = $request->id_kecamatan[$i];
                $insert->tahun = $request->tahun;
                $insert->terlantar_laki = $request->terlantar_laki[$i];
                $insert->terlantar_perempuan = $request->terlantar_perempuan[$i];
                $insert->cacat_laki = $request->cacat_laki[$i];
                $insert->cacat_perempuan = $request->cacat_perempuan[$i];
                $insert->save();
            }
        });

        return redirect()->route('kependudukan-lansia.index', [$id_kategori, $tahun]);
    }

    public function store(Request $request, $id_kategori, $tahun)
    {
        for ($i=0; $i < count($request->id_kecamatan); $i++) { 
            $insert = new KependudukanLansia;
            $insert->id_kategori = $id_kategori;
            $insert->id_kecamatan = $request->id_kecamatan[$i];
            $insert->tahun = $request->tahun;
            $insert->terlantar_laki = $request->terlantar_laki[$i];
            $insert->terlantar_perempuan = $request->terlantar_perempuan[$i];
            $insert->cacat_laki = $request->cacat_laki[$i];
            $insert->cacat_perempuan = $request->cacat_perempuan[$i];
            $insert->save();
        }

        return redirect()->route('kependudukan-lansia.index', [$id_kategori, $request->tahun]);
    }
}
