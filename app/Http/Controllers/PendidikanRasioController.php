<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendidikanRasio;
use App\Models\Kategori;
use App\Models\Subyek;
use App\Models\Kecamatan;
use DB;
class PendidikanRasioController extends Controller
{
    public function index($jenjang,$id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);
        $jjg=explode('-',$jenjang);
        $data = PendidikanRasio::where('id_kategori', $id_kategori)->where('jenjang','like',$jenjang)->with('kecamatan')->get();
        $kecamatan=Kecamatan::orderBy('nama_kecamatan','asc')->get();

        $det=array();
        $chart_kecamatan = [];
        foreach($data as $k =>$v)
        {
            $det[$v->id_kecamatan]['jumlah_siswa']=$v->jumlah_siswa;
            $det[$v->id_kecamatan]['jumlah_sekolah']=$v->jumlah_sekolah;
            $det[$v->id_kecamatan]['rasio']=$v->rasio;
            $chart_kecamatan[$v->id_kecamatan] = ucwords(strtolower($v->kecamatan->nama_kecamatan));
        }

        return view('pages.pendidikan-rasio.index')
            ->with('data', $data)
            ->with('chart_kecamatan', $chart_kecamatan)
            ->with('det', $det)
            ->with('jenjang', $jenjang)
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function create($jenjang,$id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $kecamatan = Kecamatan::all();

        return view('pages.pendidikan-rasio.create')
            ->with('kecamatan', $kecamatan)
            ->with('jenjang', $jenjang)
            ->with('kategori', $kategori);
    }

    public function edit($jenjang,$id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $jjg=explode('-',$jenjang);
        // $data = PendidikanRasio::where('id_kategori', $id_kategori)->where('jenjang','like',$jenjang)->with('kecamatan')->get();
        $data = PendidikanRasio::where('id_kategori', $id_kategori)->where('jenjang','like',$jenjang)->with('kecamatan')->get();
        $kecamatan=Kecamatan::orderBy('nama_kecamatan','asc')->get();

        $det=array();
        foreach($data as $k =>$v)
        {
            $det[$v->id_kecamatan]['jumlah_siswa']=$v->jumlah_siswa;
            $det[$v->id_kecamatan]['jumlah_sekolah']=$v->jumlah_sekolah;
            $det[$v->id_kecamatan]['rasio']=$v->rasio;
            $chart_kecamatan[$v->id_kecamatan] = ucwords(strtolower($v->kecamatan->nama_kecamatan));
        }
        // dd($det);
        return view('pages.pendidikan-rasio.edit')
            ->with('data', $data)
            ->with('det', $det)
            ->with('jenjang', $jenjang)
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $jenjang,$id_kategori)
    {
        DB::transaction(function () use($request, $id_kategori,$jenjang) {
            
            PendidikanRasio::where('id_kategori', $id_kategori)->where('jenjang','like',$jenjang)->forceDelete();
    
            $jlh_siswa=$request->jumlah_siswa[$jenjang];
            $jlh_sekolah=$request->jumlah_sekolah[$jenjang];
            foreach($request->id_kecamatan as $id)
            {   
                $j_siswa=(is_null($jlh_siswa[$id]) ? 0 : $jlh_siswa[$id]);
                $j_sekolah=(is_null($jlh_sekolah[$id]) ? 0 : $jlh_sekolah[$id]);
                $insert = new PendidikanRasio;
                $insert->id_kategori=$id_kategori;	
                $insert->id_kecamatan=$id;	
                $insert->jenjang=$jenjang;
                $insert->jumlah_siswa= $j_siswa;
                $insert->jumlah_sekolah= $j_sekolah;
                $rasio= ($j_siswa / ($j_sekolah==0 ? 1 : $j_sekolah));
                $insert->rasio=$rasio;
                $insert->save();
            }
        });

        return redirect()->route('pendidikan-rasio.index', array($jenjang,$id_kategori));
    }

    public function store(Request $request, $jenjang,$id_kategori)
    {
        // dd($request->all());
        // for ($i=0; $i < count($request->id_kecamatan); $i++) { 
        $jlh_siswa=$request->jumlah_siswa[$jenjang];
        $jlh_sekolah=$request->jumlah_sekolah[$jenjang];
        foreach($request->id_kecamatan as $id)
        {   
            $j_siswa=(is_null($jlh_siswa[$id]) ? 0 : $jlh_siswa[$id]);
            $j_sekolah=(is_null($jlh_sekolah[$id]) ? 0 : $jlh_sekolah[$id]);
            $insert = new PendidikanRasio;
            $insert->id_kategori=$id_kategori;	
            $insert->id_kecamatan=$id;	
            $insert->jenjang=$jenjang;
            $insert->jumlah_siswa= $j_siswa;
            $insert->jumlah_sekolah= $j_sekolah;
            $rasio= ($j_siswa / ($j_sekolah==0 ? 1 : $j_sekolah));
            $insert->rasio=$rasio;
            $insert->save();
        }
        // }

        return redirect()->route('pendidikan-rasio.index', array($jenjang,$id_kategori));
    }
}
