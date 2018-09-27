<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KesehatanJumlahDokter;
use App\Models\Kategori;
use App\Models\Subyek;
use App\Models\Kecamatan;
use DB;
class KesehatanJumlahDokterController extends Controller
{
    public function index($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);
        $data = KesehatanJumlahDokter::where('id_kategori', $id_kategori)->get();
        $kecamatan=Kecamatan::orderBy('nama_kecamatan','asc')->get();
        $unit_kerja=array('Puskesmas','Rumah Sakit');
        $det=array();
        $chart_kecamatan = [];
        foreach($data as $k =>$v)
        {
            $det[str_slug($v->unit_kerja)]['dokter_spesialis']=$v->dokter_spesialis;
            $det[str_slug($v->unit_kerja)]['dokter_umum']=$v->dokter_umum;
            $det[str_slug($v->unit_kerja)]['dokter_gigi']=$v->dokter_gigi;
            $chart_kecamatan[$v->unit_kerja] = ucwords(strtolower($v->unit_kerja));
        }

        return view('pages.kesehatan-jumlah-dokter.index')
            ->with('data', $data)
            ->with('unit_kerja', $unit_kerja)
            ->with('chart_kecamatan', $chart_kecamatan)
            ->with('det', $det)  
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function create($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);
        $kecamatan = Kecamatan::all();
        $unit_kerja=array('Puskesmas','Rumah Sakit');
        return view('pages.kesehatan-jumlah-dokter.create')
            ->with('kecamatan', $kecamatan)
            ->with('unit_kerja', $unit_kerja)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);
        $data = KesehatanJumlahDokter::where('id_kategori', $id_kategori)->get();
        $kecamatan=Kecamatan::orderBy('nama_kecamatan','asc')->get();
        $unit_kerja=array('Puskesmas','Rumah Sakit');
        $det=array();
        foreach($data as $k =>$v)
        {
            $det[str_slug($v->unit_kerja)]['dokter_spesialis']=$v->dokter_spesialis;
            $det[str_slug($v->unit_kerja)]['dokter_umum']=$v->dokter_umum;
            $det[str_slug($v->unit_kerja)]['dokter_gigi']=$v->dokter_gigi;
            $chart_kecamatan[$v->unit_kerja] = ucwords(strtolower($v->unit_kerja));
        }
        // dd($det);
        return view('pages.kesehatan-jumlah-dokter.edit')
            ->with('data', $data)
            ->with('det', $det)    
            ->with('unit_kerja', $unit_kerja)    
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori)
    {
        DB::transaction(function () use($request, $id_kategori) {
            
            KesehatanJumlahDokter::where('id_kategori', $id_kategori)->forceDelete();
    
            foreach($request->unit_kerja as $k=>$v)
            {
                $insert=new KesehatanJumlahDokter;
                $insert->unit_kerja=$v;
                $insert->id_kategori=$id_kategori;
                $insert->dokter_spesialis=$request->dokter_spesialis[str_slug($v)];
                $insert->dokter_umum=$request->dokter_umum[str_slug($v)];
                $insert->dokter_gigi=$request->dokter_gigi[str_slug($v)];
                $insert->save();
            }
        });

        return redirect()->route('kesehatan-jumlah-dokter.index', array($id_kategori));
    }

    public function store(Request $request, $id_kategori)
    {
        // dd($request->all(0));
        foreach($request->unit_kerja as $k=>$v)
        {
            $insert=new KesehatanJumlahDokter;
            $insert->unit_kerja=$v;
            $insert->id_kategori=$id_kategori;
            $insert->dokter_spesialis=$request->dokter_spesialis[str_slug($v)];
            $insert->dokter_umum=$request->dokter_umum[str_slug($v)];
            $insert->dokter_gigi=$request->dokter_gigi[str_slug($v)];
            $insert->save();
        }

        return redirect()->route('kesehatan-jumlah-dokter.index', array($id_kategori));
    }
}
