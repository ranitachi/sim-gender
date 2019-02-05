<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\PendidikanRasioMuridGuru;
use Config;

class PendidikanRasioMuridGuruController extends Controller
{
    public function index($id_kategori,$tahun=null)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = PendidikanRasioMuridGuru::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $jenjang=Config::get('services.jenjang');

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->jenjang]['jumlah_murid']=$d->jumlah_murid;
            $data[$d->jenjang]['jumlah_guru']=$d->jumlah_guru;
            $data[$d->jenjang]['rasio']=$d->rasio;
        }

        $chart_puk = array();
        $chart_tpak = array();
        $chart_tkk = array();
        $chart_tpt = array();
        // return $data;
        return view('pages.pendidikan-rasiomuridguru.index')
            ->with('kecamatan', $kecamatan)
            ->with('data', $data)
            ->with('jenjang', $jenjang)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun)
            ->with('chart_kecamatan', $chart_puk)
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

        $jenjang=Config::get('services.jenjang');

        return view('pages.pendidikan-rasiomuridguru.create')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('jenjang', $jenjang)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function store(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        $jumlah_guru=$request->jumlah_guru;
        $jumlah_murid=$request->jumlah_murid;
        $rasio=$request->rasio;
        
        foreach($jumlah_murid as $id_jng=>$val)
        {
            $ins=new PendidikanRasioMuridGuru;
            $ins->id_kategori = $id_kategori;
            $ins->tahun = $tahun;
            $ins->jenjang = $id_jng;
            $ins->jumlah_murid = str_replace(array(',','.'),'',$val);
            $ins->jumlah_guru = str_replace(array(',','.'),'',$jumlah_guru[$id_jng]);
            $ins->rasio = str_replace(array(',','.'),'.',$rasio[$id_jng]);
            $ins->save();
        }
        return redirect()->route('rasio-murid-guru.index',[$id_kategori,$tahun])->with('Data Jumlah Rasio Murid dan Guru Berhasil Disimpan');
    }

    public function edit($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = PendidikanRasioMuridGuru::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $jenjang=Config::get('services.jenjang');

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->jenjang]['jumlah_murid']=$d->jumlah_murid;
            $data[$d->jenjang]['jumlah_guru']=$d->jumlah_guru;
            $data[$d->jenjang]['rasio']=$d->rasio;
        }
        
        return view('pages.pendidikan-rasiomuridguru.edit')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('data', $data)
            ->with('jenjang', $jenjang)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function update(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        PendidikanRasioMuridGuru::where('id_kategori',$id_kategori)->where('tahun',$tahun)->forceDelete();

        $jumlah_guru=$request->jumlah_guru;
        $jumlah_murid=$request->jumlah_murid;
        $rasio=$request->rasio;
        
        foreach($jumlah_murid as $id_jng=>$val)
        {
            $ins=new PendidikanRasioMuridGuru;
            $ins->id_kategori = $id_kategori;
            $ins->tahun = $tahun;
            $ins->jenjang = $id_jng;
            $ins->jumlah_murid = str_replace(array(',','.'),'',$val);
            $ins->jumlah_guru = str_replace(array(',','.'),'',$jumlah_guru[$id_jng]);
            $ins->rasio = str_replace(array(',','.'),'.',$rasio[$id_jng]);
            $ins->save();
        }
        return redirect()->route('rasio-murid-guru.index',[$id_kategori,$tahun])->with('Data Jumlah Rasio Murid dan Guru Berhasil Diperbaharui');
    }
}
