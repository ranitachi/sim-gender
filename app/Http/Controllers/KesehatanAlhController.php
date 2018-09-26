<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KesehatanAlh;
use App\Models\Kategori;
use App\Models\Subyek;
use App\Models\Kecamatan;
use DB;
class KesehatanAlhController extends Controller
{
    public function index($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);
        
        $data = KesehatanAlh::where('id_kategori', $id_kategori)->with('kecamatan')->get();
        $kecamatan=Kecamatan::orderBy('nama_kecamatan','asc')->get();

        $det=array();
        $chart_kecamatan = [];
        foreach($data as $k =>$v)
        {
            $det[$v->id_kecamatan]['jumlah_alh']=$v->anak_lahir_hidup;
            $det[$v->id_kecamatan]['jumlah_penolong']=$v->penolong;
            $det[$v->id_kecamatan]['jumlah']=$v->jumlah;
            $chart_kecamatan[$v->id_kecamatan] = ucwords(strtolower($v->kecamatan->nama_kecamatan));
        }

        return view('pages.kesehatan-alh.index')
            ->with('data', $data)
            ->with('chart_kecamatan', $chart_kecamatan)
            ->with('det', $det)  
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function create($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $kecamatan = Kecamatan::all();

        return view('pages.kesehatan-alh.create')
            ->with('kecamatan', $kecamatan)
            
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        
        // $data = KesehatanAlh::where('id_kategori', $id_kategori)->with('kecamatan')->get();
        $data = KesehatanAlh::where('id_kategori', $id_kategori)->with('kecamatan')->get();
        $kecamatan=Kecamatan::orderBy('nama_kecamatan','asc')->get();

        $det=array();
         foreach($data as $k =>$v)
        {
            $det[$v->id_kecamatan]['jumlah_alh']=$v->anak_lahir_hidup;
            $det[$v->id_kecamatan]['jumlah_penolong']=$v->penolong;
            $det[$v->id_kecamatan]['jumlah']=$v->jumlah;
            $chart_kecamatan[$v->id_kecamatan] = ucwords(strtolower($v->kecamatan->nama_kecamatan));
        }
        // dd($det);
        return view('pages.kesehatan-alh.edit')
            ->with('data', $data)
            ->with('det', $det)    
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori)
    {
        DB::transaction(function () use($request, $id_kategori) {
            
            KesehatanAlh::where('id_kategori', $id_kategori)->forceDelete();
    
            $jlh_alh=$request->jumlah_alh;
            $jlh_penolong=$request->jumlah_penolong;
            foreach($request->id_kecamatan as $id)
            {   
                $j_alh=(is_null($jlh_alh[$id]) ? 0 : $jlh_alh[$id]);
                $j_penolong=(is_null($jlh_penolong[$id]) ? 0 : $jlh_penolong[$id]);
                $insert = new KesehatanAlh;
                $insert->id_kategori=$id_kategori;	
                $insert->id_kecamatan=$id;	
                $insert->anak_lahir_hidup= $j_alh;
                $insert->penolong= $j_penolong;
                $insert->jumlah= $j_penolong+$j_alh;
                $insert->save();
            }
        });

        return redirect()->route('kesehatan-alh.index', array($id_kategori));
    }

    public function store(Request $request, $id_kategori)
    {
        $jlh_alh=$request->jumlah_alh;
            $jlh_penolong=$request->jumlah_penolong;
            foreach($request->id_kecamatan as $id)
            {   
                $j_alh=(is_null($jlh_alh[$id]) ? 0 : $jlh_alh[$id]);
                $j_penolong=(is_null($jlh_penolong[$id]) ? 0 : $jlh_penolong[$id]);
                $insert = new KesehatanAlh;
                $insert->id_kategori=$id_kategori;	
                $insert->id_kecamatan=$id;	
                $insert->anak_lahir_hidup= $j_alh;
                $insert->penolong= $j_penolong;
                $insert->jumlah= $j_penolong+$j_alh;
                $insert->save();
            }
        // }

        return redirect()->route('kesehatan-alh.index', array($id_kategori));
    }
}
