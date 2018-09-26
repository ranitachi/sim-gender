<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KependudukanKepadatan;

use DB;

class KependudukanKepadatanController extends Controller
{
    public function index($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanKepadatan::where('id_kategori', $id_kategori)->with('kecamatan')->get();

        $chart_kecamatan = [];
        $chart_persentase = [];
        $chart_kepadatan = [];
        foreach ($data as $item) {
            $chart_kecamatan[] = ucwords(strtolower($item->kecamatan->nama_kecamatan));
            $chart_persentase[] = $item->persentase_penduduk;
            $chart_kepadatan[] = $item->kepadatan_penduduk;
        }

        return view('pages.kependudukan-kepadatan.index')
            ->with('data', $data)
            ->with('chart_kecamatan', $chart_kecamatan)
            ->with('chart_persentase', $chart_persentase)
            ->with('chart_kepadatan', $chart_kepadatan)
            ->with('kategori', $kategori);
    }

    public function create($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $kecamatan = Kecamatan::all();

        return view('pages.kependudukan-kepadatan.create')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = KependudukanKepadatan::where('id_kategori', $id_kategori)->with('kecamatan')->get();

        return view('pages.kependudukan-kepadatan.edit')
            ->with('data', $data)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori)
    {
        DB::transaction(function () use($request, $id_kategori) {
            KependudukanKepadatan::where('id_kategori', $id_kategori)->forceDelete();
    
            for ($i=0; $i < count($request->id_kecamatan); $i++) { 
                $insert = new KependudukanKepadatan;
                $insert->id_kategori = $id_kategori;
                $insert->id_kecamatan = $request->id_kecamatan[$i];
                $insert->persentase_penduduk = $request->persentase_penduduk[$i];
                $insert->kepadatan_penduduk = $request->kepadatan_penduduk[$i];
                $insert->save();
            }
        });

        return redirect()->route('kependudukan-kepadatan.index', $id_kategori);
    }

    public function store(Request $request, $id_kategori)
    {
        for ($i=0; $i < count($request->id_kecamatan); $i++) { 
            $insert = new KependudukanKepadatan;
            $insert->id_kategori = $id_kategori;
            $insert->id_kecamatan = $request->id_kecamatan[$i];
            $insert->persentase_penduduk = $request->persentase_penduduk[$i];
            $insert->kepadatan_penduduk = $request->kepadatan_penduduk[$i];
            $insert->save();
        }

        return redirect()->route('kependudukan-kepadatan.index', $id_kategori);
    }
}
