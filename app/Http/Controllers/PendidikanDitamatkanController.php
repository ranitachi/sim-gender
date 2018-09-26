<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendidikanDitamatkan;
use App\Models\Kategori;
use App\Models\Subyek;
use App\Models\Kecamatan;
use DB;

class PendidikanDitamatkanController extends Controller
{
    public function index($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);
        $data = PendidikanDitamatkan::where('id_kategori', $id_kategori)->with('kecamatan')->get();
        $kecamatan=Kecamatan::orderBy('nama_kecamatan','asc')->get();

        $det=array();
        $chart_kecamatan = [];
        foreach($data as $k=>$v)
        {
            $det[$v->id_kecamatan]['bawah_sd']=$v->bawah_sd;
            $det[$v->id_kecamatan]['sd']=$v->sd;
            $det[$v->id_kecamatan]['smp']=$v->smp;
            $det[$v->id_kecamatan]['sma']=$v->sma;
            $det[$v->id_kecamatan]['pt']=$v->pt;
            $chart_kecamatan[$v->id_kecamatan] = ucwords(strtolower($v->kecamatan->nama_kecamatan));
        }

        // $chart_kecamatan = [];
        // $chart_persentase = [];
        // $chart_kepadatan = [];
        // foreach ($data as $item) {
        //     $chart_kecamatan[] = ucwords(strtolower($item->kecamatan->nama_kecamatan));
        //     $chart_persentase[] = $item->persentase_penduduk;
        //     $chart_kepadatan[] = $item->kepadatan_penduduk;
        // }

        return view('pages.pendidikan-ditamatkan.index')
            ->with('det', $det)
            ->with('chart_kecamatan', $chart_kecamatan)
            ->with('data', $data)
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function create($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $kecamatan = Kecamatan::all();

        return view('pages.pendidikan-ditamatkan.create')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $data = PendidikanDitamatkan::where('id_kategori', $id_kategori)->with('kecamatan')->get();
        $kecamatan=Kecamatan::orderBy('nama_kecamatan','asc')->get();

        $det=array();
        foreach($data as $k=>$v)
        {
            $det[$v->id_kecamatan]['bawah_sd']=$v->bawah_sd;
            $det[$v->id_kecamatan]['sd']=$v->sd;
            $det[$v->id_kecamatan]['smp']=$v->smp;
            $det[$v->id_kecamatan]['sma']=$v->sma;
            $det[$v->id_kecamatan]['pt']=$v->pt;
        }

        return view('pages.pendidikan-ditamatkan.edit')
            ->with('data', $data)
            ->with('det', $det)
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori)
    {
        DB::transaction(function () use($request, $id_kategori) {
            PendidikanDitamatkan::where('id_kategori', $id_kategori)->forceDelete();
            $req_jumlah=$request->jumlah;
        // for ($i=0; $i < count($request->id_kecamatan); $i++) { 
            foreach($request->id_kecamatan as $id)
            {   
                
                $jumlah=$req_jumlah['bawah_sd'][$id] + $req_jumlah['sd'][$id] + $req_jumlah['smp'][$id] + $req_jumlah['sma'][$id] + $req_jumlah['pt'][$id];;
                
                $insert = new PendidikanDitamatkan;
                $insert->id_kategori=$id_kategori;	
                $insert->id_kecamatan=$id;	
                $insert->bawah_sd=is_null($req_jumlah['bawah_sd'][$id]) ? 0 : $req_jumlah['bawah_sd'][$id];
                $insert->sd=is_null($req_jumlah['sd'][$id]) ? 0 : $req_jumlah['sd'][$id];
                $insert->smp=is_null($req_jumlah['smp'][$id]) ? 0 : $req_jumlah['smp'][$id];
                $insert->sma=is_null($req_jumlah['sma'][$id]) ? 0 : $req_jumlah['sma'][$id];
                $insert->pt=is_null($req_jumlah['pt'][$id]) ? 0 : $req_jumlah['pt'][$id];
                $insert->jumlah=$jumlah;
                $insert->save();
                
                
            }
        });

        return redirect()->route('pendidikan-ditamatkan.index', array($id_kategori));
    }

    public function store(Request $request, $id_kategori)
    {
        // dd($request->all());
        $req_jumlah=$request->jumlah;
        // for ($i=0; $i < count($request->id_kecamatan); $i++) { 
        foreach($request->id_kecamatan as $id)
        {   
            // id_kategori id_kecamatan bawah_sd sd smp sma pt jumlah
            $jumlah=$req_jumlah['bawah_sd'][$id] + $req_jumlah['sd'][$id] + $req_jumlah['smp'][$id] + $req_jumlah['sma'][$id] + $req_jumlah['pt'][$id];;
            
            $insert = new PendidikanDitamatkan;
            $insert->id_kategori=$id_kategori;	
            $insert->id_kecamatan=$id;	
            $insert->bawah_sd=is_null($req_jumlah['bawah_sd'][$id]) ? 0 : $req_jumlah['bawah_sd'][$id];
            $insert->sd=is_null($req_jumlah['sd'][$id]) ? 0 : $req_jumlah['sd'][$id];
            $insert->smp=is_null($req_jumlah['smp'][$id]) ? 0 : $req_jumlah['smp'][$id];
            $insert->sma=is_null($req_jumlah['sma'][$id]) ? 0 : $req_jumlah['sma'][$id];
            $insert->pt=is_null($req_jumlah['pt'][$id]) ? 0 : $req_jumlah['pt'][$id];
            $insert->jumlah=$jumlah;
            $insert->save();
            
            
        }
        // }

        return redirect()->route('pendidikan-ditamatkan.index', array($id_kategori));
    }
}
