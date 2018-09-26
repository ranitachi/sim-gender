<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendidikanSekolah;
use App\Models\Kategori;
use App\Models\Subyek;
use App\Models\Kecamatan;
use DB;
class PendidikanSekolahController extends Controller
{
    public function index($jenjang,$id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);
        $jjg=explode('-',$jenjang);
        // $data = PendidikanSekolah::where('id_kategori', $id_kategori)->where('jenjang','like',$jenjang)->with('kecamatan')->get();
        $data = PendidikanSekolah::where('id_kategori', $id_kategori)->whereIn('jenjang',$jjg)->with('kecamatan')->get();
        $kecamatan=Kecamatan::orderBy('nama_kecamatan','asc')->get();

        $det=array();
        foreach($data as $k =>$v)
        {
            $det[$v->id_kecamatan][$v->jenjang]['L']=$v->angka_masuk_kasar_l;
            $det[$v->id_kecamatan][$v->jenjang]['P']=$v->angka_masuk_kasar_p;
        }

        return view('pages.pendidikan-sekolah.index')
            ->with('data', $data)
            ->with('det', $det)
            ->with('jenjang', $jenjang)
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function create($jenjang,$id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $kecamatan = Kecamatan::all();

        return view('pages.pendidikan-sekolah.create')
            ->with('kecamatan', $kecamatan)
            ->with('jenjang', $jenjang)
            ->with('kategori', $kategori);
    }

    public function edit($jenjang,$id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $jjg=explode('-',$jenjang);
        // $data = PendidikanSekolah::where('id_kategori', $id_kategori)->where('jenjang','like',$jenjang)->with('kecamatan')->get();
        $data = PendidikanSekolah::where('id_kategori', $id_kategori)->whereIn('jenjang',$jjg)->with('kecamatan')->get();
        $kecamatan=Kecamatan::orderBy('nama_kecamatan','asc')->get();

        $det=array();
        foreach($data as $k =>$v)
        {
            $det[$v->id_kecamatan][$v->jenjang]['L']=$v->angka_masuk_kasar_l;
            $det[$v->id_kecamatan][$v->jenjang]['P']=$v->angka_masuk_kasar_p;
        }
        // dd($det);
        return view('pages.pendidikan-sekolah.edit')
            ->with('data', $data)
            ->with('det', $det)
            ->with('jenjang', $jenjang)
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $jenjang,$id_kategori)
    {
        DB::transaction(function () use($request, $id_kategori,$jenjang) {
            $jjg=explode('-',$jenjang);
            PendidikanSekolah::where('id_kategori', $id_kategori)->whereIn('jenjang',$jjg)->forceDelete();
    
            $pr=$request->angka_masuk_p;
            $lk=$request->angka_masuk_l;
            foreach($request->id_kecamatan as $id)
            {   
                // id_kategori	id_kecamatan	jenjang	angka_masuk_kasar_l	angka_masuk_kasar_p
                foreach($lk as $jjg => $det)
                {
                    $insert = new PendidikanSekolah;
                    $insert->id_kategori=$id_kategori;	
                    $insert->id_kecamatan=$id;	
                    $insert->jenjang=$jjg;	
                    $insert->angka_masuk_kasar_l = is_null($det[$id]) ? 0 : $det[$id];	
                    $insert->angka_masuk_kasar_p = is_null($pr[$jjg][$id]) ? 0 : $pr[$jjg][$id];
                    $insert->save();
                }
            }
        });

        return redirect()->route('pendidikan-sekolah.index', array($jenjang,$id_kategori));
    }

    public function store(Request $request, $jenjang,$id_kategori)
    {
        // dd($request->all());
        // for ($i=0; $i < count($request->id_kecamatan); $i++) { 
        $pr=$request->angka_masuk_p;
        $lk=$request->angka_masuk_l;
        foreach($request->id_kecamatan as $id)
        {   
            // id_kategori	id_kecamatan	jenjang	angka_masuk_kasar_l	angka_masuk_kasar_p
            foreach($lk as $jjg => $det)
            {
                $insert = new PendidikanSekolah;
                $insert->id_kategori=$id_kategori;	
                $insert->id_kecamatan=$id;	
                $insert->jenjang=$jjg;	
                $insert->angka_masuk_kasar_l = is_null($det[$id]) ? 0 : $det[$id];	
                $insert->angka_masuk_kasar_p = is_null($pr[$jjg][$id]) ? 0 : $pr[$jjg][$id];
                $insert->save();
            }
        }
        // }

        return redirect()->route('pendidikan-sekolah.index', array($jenjang,$id_kategori));
    }
}
