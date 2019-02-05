<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kategori;
use App\Models\SexRatio;

class SexRatioController extends Controller
{
    public function index($id_kategori,$tahun=null)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $wilayah = SexRatio::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $data=array();
        foreach($wilayah as $d)
        {
            $data[$d->id_kecamatan]['laki_laki']=$d->laki_laki;
            $data[$d->id_kecamatan]['perempuan']=$d->perempuan;
            $data[$d->id_kecamatan]['jumlah']=$d->jumlah;
            $data[$d->id_kecamatan]['sex_ratio']=$d->sex_ratio;
        }

        $chart_puk = array();
        $chart_tpak = array();
        $chart_tkk = array();
        $chart_tpt = array();
        // return $data;
        return view('pages.kependudukan-sexratio.index')
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

        return view('pages.kependudukan-sexratio.create')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function store(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        $laki_laki=$request->laki_laki;
        $perempuan=$request->perempuan;
        $jumlah=$request->jumlah;
        $sex_ratio=$request->sex_ratio;

        foreach($laki_laki as $idkec=>$val)
        {
            $ins=new SexRatio;
            $ins->id_kategori = $id_kategori;
            $ins->id_kecamatan = $idkec;
            $ins->tahun = $tahun;
            $ins->laki_laki = str_replace(',','.',$val);
            $ins->perempuan = str_replace(',','.',$perempuan[$idkec]);
            $ins->jumlah = str_replace(',','.',$jumlah[$idkec]);
            $ins->sex_ratio = str_replace(',','.',$sex_ratio[$idkec]);
            $ins->save();
        }
        return redirect()->route('sex-ratio.index',[$id_kategori,$tahun])->with('Data Sex Ratio Berhasil Disimpan');
    }

    public function edit($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

         $wilayah = SexRatio::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $data=array();
        foreach($wilayah as $d)
        {
            $data[$d->id_kecamatan]['laki_laki']=$d->laki_laki;
            $data[$d->id_kecamatan]['perempuan']=$d->perempuan;
            $data[$d->id_kecamatan]['jumlah']=$d->jumlah;
            $data[$d->id_kecamatan]['sex_ratio']=$d->sex_ratio;
        }
        
        return view('pages.kependudukan-sexratio.edit')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('data', $data)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function update(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        $laki_laki=$request->laki_laki;
        $perempuan=$request->perempuan;
        $jumlah=$request->jumlah;
        $sex_ratio=$request->sex_ratio;
        SexRatio::where('id_kategori',$id_kategori)->where('tahun',$tahun)->forceDelete();
        // return $request->all();
        foreach($laki_laki as $idkec=>$val)
        {
            $ins=new SexRatio;
            $ins->id_kategori = $id_kategori;
            $ins->id_kecamatan = $idkec;
            $ins->tahun = $tahun;
            $ins->laki_laki = str_replace(',','.',$val);
            $ins->perempuan = str_replace(',','.',$perempuan[$idkec]);
            $ins->jumlah = str_replace(',','.',$jumlah[$idkec]);
            $ins->sex_ratio = str_replace(',','.',$sex_ratio[$idkec]);
            $ins->save();
        }
        return redirect()->route('sex-ratio.index',[$id_kategori,$tahun])->with('Data Sex Ratio Berhasil Diperbaharui');
    }
}
