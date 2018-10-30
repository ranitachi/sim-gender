<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KesehatanJumlahBblr;
use App\Models\Kategori;
use App\Models\Subyek;
use App\Models\Kecamatan;
use DB;
class KesehatanJumlahBblrController extends Controller
{
    public function index($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);
        $data = KesehatanJumlahBblr::where('id_kategori', $id_kategori)->with('kecamatan')->get();
        $kecamatan=Kecamatan::orderBy('nama_kecamatan','asc')->get();

        $det=array();
        $chart_kecamatan = [];
        foreach($data as $k =>$v)
        {
            $det[$v->id_kecamatan]['bayi_lahir']=$v->bayi_lahir;
            $det[$v->id_kecamatan]['bblr_jumlah']=$v->bblr_jumlah;
            $det[$v->id_kecamatan]['bblr_dirujuk']=$v->bblr_dirujuk;
            $det[$v->id_kecamatan]['gizi_buruk']=$v->gizi_buruk;
            $chart_kecamatan[$v->id_kecamatan] = ucwords(strtolower($v->kecamatan->nama_kecamatan));
        }

        return view('pages.kesehatan-jumlah-bblr.index')
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

        return view('pages.kesehatan-jumlah-bblr.create')
            ->with('kecamatan', $kecamatan)
            
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        
        // $data = KesehatanJumlahBblr::where('id_kategori', $id_kategori)->with('kecamatan')->get();
        $data = KesehatanJumlahBblr::where('id_kategori', $id_kategori)->with('kecamatan')->get();
        $kecamatan=Kecamatan::orderBy('nama_kecamatan','asc')->get();

        $det=array();
        $chart_kecamatan = [];
        foreach($data as $k =>$v)
        {
            $det[$v->id_kecamatan]['bayi_lahir']=$v->bayi_lahir;
            $det[$v->id_kecamatan]['bblr_jumlah']=$v->bblr_jumlah;
            $det[$v->id_kecamatan]['bblr_dirujuk']=$v->bblr_dirujuk;
            $det[$v->id_kecamatan]['gizi_buruk']=$v->gizi_buruk;
            $chart_kecamatan[$v->id_kecamatan] = ucwords(strtolower($v->kecamatan->nama_kecamatan));
        }
        // dd($det);
        return view('pages.kesehatan-jumlah-bblr.edit')
            ->with('data', $data)
            ->with('det', $det)    
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori)
    {
        DB::transaction(function () use($request, $id_kategori) {
            
            KesehatanJumlahBblr::where('id_kategori', $id_kategori)->forceDelete();
    
            $bayi_lahir=$request->bayi_lahir;
            $bblr_jumlah=$request->bblr_jumlah;
            $bblr_dirujuk=$request->bblr_dirujuk;
            $gizi_buruk=$request->gizi_buruk;
            foreach($request->id_kecamatan as $id)
            {   
                $j_bayi_lahir=(is_null($bayi_lahir[$id]) ? 0 : $bayi_lahir[$id]);
                $j_bblr_jumlah=(is_null($bblr_jumlah[$id]) ? 0 : $bblr_jumlah[$id]);
                $j_bblr_dirujuk=(is_null($bblr_dirujuk[$id]) ? 0 : $bblr_dirujuk[$id]);
                $j_gizi_buruk=(is_null($gizi_buruk[$id]) ? 0 : $gizi_buruk[$id]);
                
                $insert = new KesehatanJumlahBblr;
                $insert->id_kategori=$id_kategori;	
                $insert->id_kecamatan=$id;	
                $insert->bayi_lahir= $j_bayi_lahir;
                $insert->bblr_jumlah= $j_bblr_jumlah;
                $insert->bblr_dirujuk= $j_bblr_dirujuk;
                $insert->gizi_buruk= $j_gizi_buruk;
                $insert->save();
            }
        });

        return redirect()->route('kesehatan-jumlah-bblr.index', array($id_kategori));
    }

    public function store(Request $request, $id_kategori)
    {
            $bayi_lahir=$request->bayi_lahir;
            $bblr_jumlah=$request->bblr_jumlah;
            $bblr_dirujuk=$request->bblr_dirujuk;
            $gizi_buruk=$request->gizi_buruk;
            foreach($request->id_kecamatan as $id)
            {   
                $j_bayi_lahir=(is_null($bayi_lahir[$id]) ? 0 : $bayi_lahir[$id]);
                $j_bblr_jumlah=(is_null($bblr_jumlah[$id]) ? 0 : $bblr_jumlah[$id]);
                $j_bblr_dirujuk=(is_null($bblr_dirujuk[$id]) ? 0 : $bblr_dirujuk[$id]);
                $j_gizi_buruk=(is_null($gizi_buruk[$id]) ? 0 : $gizi_buruk[$id]);
                
                $insert = new KesehatanJumlahBblr;
                $insert->id_kategori=$id_kategori;	
                $insert->id_kecamatan=$id;	
                $insert->bayi_lahir= $j_bayi_lahir;
                $insert->bblr_jumlah= $j_bblr_jumlah;
                $insert->bblr_dirujuk= $j_bblr_dirujuk;
                $insert->gizi_buruk= $j_gizi_buruk;
                $insert->save();
            }

        return redirect()->route('kesehatan-jumlah-bblr.index', array($id_kategori));
    }
}
