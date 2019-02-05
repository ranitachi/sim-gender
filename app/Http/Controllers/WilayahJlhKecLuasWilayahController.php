<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kategori;
use App\Models\WilayahJlhKecLuasWilayah;
class WilayahJlhKecLuasWilayahController extends Controller
{
    public function index($id_kategori,$tahun=null)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $wilayah = WilayahJlhKecLuasWilayah::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $data=array();
        foreach($wilayah as $d)
        {
            $data[$d->id_kecamatan]['luas_wilayah']=$d->luas_wilayah;
            $data[$d->id_kecamatan]['jumlah_kelurahan']=$d->jumlah_kelurahan;
            $data[$d->id_kecamatan]['jumlah_desa']=$d->jumlah_desa;
        }

        $chart_puk = array();
        $chart_tpak = array();
        $chart_tkk = array();
        $chart_tpt = array();
        // return $data;
        return view('pages.wilayah.index')
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

        return view('pages.wilayah.create')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function store(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        $luas_wilayah=$request->luas_wilayah;
        $jumlah_desa=$request->jumlah_desa;
        $jumlah_kelurahan=$request->jumlah_kelurahan;

        foreach($luas_wilayah as $idkec=>$val)
        {
            $ins=new WilayahJlhKecLuasWilayah;
            $ins->id_kecamatan = $idkec;
            $ins->jumlah_desa = $jumlah_desa[$idkec];
            $ins->id_kategori = $id_kategori;
            $ins->jumlah_kelurahan = $jumlah_kelurahan[$idkec];
            $ins->luas_wilayah = str_replace(',','.',$val);
            $ins->tahun = $tahun;
            $ins->save();
        }
        return redirect()->route('wilayah-luas-jlh-kecamatan.index',[$id_kategori,$tahun])->with('Data Wilayah Berhasil Disimpan');
    }

    public function edit($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $wilayah = WilayahJlhKecLuasWilayah::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $data=array();
        foreach($wilayah as $d)
        {
            $data[$d->id_kecamatan]['luas_wilayah']=$d->luas_wilayah;
            $data[$d->id_kecamatan]['jumlah_kelurahan']=$d->jumlah_kelurahan;
            $data[$d->id_kecamatan]['jumlah_desa']=$d->jumlah_desa;
        }
        
        return view('pages.wilayah.edit')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('data', $data)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function update(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        $luas_wilayah=$request->luas_wilayah;
        $jumlah_desa=$request->jumlah_desa;
        $jumlah_kelurahan=$request->jumlah_kelurahan;
        WilayahJlhKecLuasWilayah::where('id_kategori',$id_kategori)->where('tahun',$tahun)->forceDelete();

        foreach($luas_wilayah as $idkec=>$val)
        {
            $ins=new WilayahJlhKecLuasWilayah;
            $ins->id_kecamatan = $idkec;
            $ins->jumlah_desa = $jumlah_desa[$idkec];
            $ins->id_kategori = $id_kategori;
            $ins->jumlah_kelurahan = $jumlah_kelurahan[$idkec];
            $ins->luas_wilayah = str_replace(',','.',$val);
            $ins->tahun = $tahun;
            $ins->save();
        }
        return redirect()->route('wilayah-luas-jlh-kecamatan.index',[$id_kategori,$tahun])->with('Data Wilayah Berhasil Diperbaharui');
    }
}
