<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kategori;
use App\Models\KependudukanStatusPerkawinan;
class KependudukanStatusPerkawinanController extends Controller
{
    public function index($id_kategori,$tahun=null)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $wilayah = KependudukanStatusPerkawinan::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $data=array();
        foreach($wilayah as $d)
        {
            $data[$d->id_kecamatan]['belum_kawin']=$d->belum_kawin;
            $data[$d->id_kecamatan]['kawin']=$d->kawin;
            $data[$d->id_kecamatan]['cerai_hidup']=$d->cerai_hidup;
            $data[$d->id_kecamatan]['cerai_mati']=$d->cerai_mati;
        }

        $chart_puk = array();
        $chart_tpak = array();
        $chart_tkk = array();
        $chart_tpt = array();
        // return $data;
        return view('pages.kependudukan-statusperkawinan.index')
            ->with('kecamatan', $kecamatan)
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('chart_puk', $chart_puk)
            ->with('chart_tpak', $chart_tpak)
            ->with('chart_tkk', $chart_tkk)
            ->with('chart_tpt', $chart_tpt)
            ->with('kategori', $kategori);
    }

    public function create($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        return view('pages.kependudukan-statusperkawinan.create')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function store(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        $belum_kawin=$request->belum_kawin;
        $kawin=$request->kawin;
        $cerai_hidup=$request->cerai_hidup;
        $cerai_mati=$request->cerai_mati;

        foreach($belum_kawin as $idkec=>$val)
        {
            $ins=new KependudukanStatusPerkawinan;
            $ins->id_kategori = $id_kategori;
            $ins->id_kecamatan = $idkec;
            $ins->tahun = $tahun;
            $ins->belum_kawin = str_replace(array(',','.'),'',$val);
            $ins->kawin = str_replace(array(',','.'),'',$kawin[$idkec]);
            $ins->cerai_hidup = str_replace(array(',','.'),'',$cerai_hidup[$idkec]);
            $ins->cerai_mati = str_replace(array(',','.'),'',$cerai_mati[$idkec]);
            $ins->save();
        }
        return redirect()->route('status-perkawinan.index',[$id_kategori,$tahun])->with('Data Status Perkawinan Berhasil Disimpan');
    }

    public function edit($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

         $wilayah = KependudukanStatusPerkawinan::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $data=array();
        foreach($wilayah as $d)
        {
            $data[$d->id_kecamatan]['belum_kawin']=$d->belum_kawin;
            $data[$d->id_kecamatan]['kawin']=$d->kawin;
            $data[$d->id_kecamatan]['cerai_hidup']=$d->cerai_hidup;
            $data[$d->id_kecamatan]['cerai_mati']=$d->cerai_mati;
        }
        
        return view('pages.kependudukan-statusperkawinan.edit')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('data', $data)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function update(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        KependudukanStatusPerkawinan::where('id_kategori',$id_kategori)->where('tahun',$tahun)->forceDelete();
        $belum_kawin=$request->belum_kawin;
        $kawin=$request->kawin;
        $cerai_hidup=$request->cerai_hidup;
        $cerai_mati=$request->cerai_mati;

        foreach($belum_kawin as $idkec=>$val)
        {
            $ins=new KependudukanStatusPerkawinan;
            $ins->id_kategori = $id_kategori;
            $ins->id_kecamatan = $idkec;
            $ins->tahun = $tahun;
            $ins->belum_kawin = str_replace(array(',','.'),'',$val);
            $ins->kawin = str_replace(array(',','.'),'',$kawin[$idkec]);
            $ins->cerai_hidup = str_replace(array(',','.'),'',$cerai_hidup[$idkec]);
            $ins->cerai_mati = str_replace(array(',','.'),'',$cerai_mati[$idkec]);
            $ins->save();
        }
        return redirect()->route('status-perkawinan.index',[$id_kategori,$tahun])->with('Data Status Perkawinan Berhasil Diperbaharui');
    }
}
