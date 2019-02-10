<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KesehatanKematianBayi;
use Config;
class KesehatanKematianBayiController extends Controller
{
    public function index($id_kategori,$tahun=null)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = KesehatanKematianBayi::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $jenis=Config::get('services.kematian_bayi');

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->jenis]['jumlah']=$d->jumlah;
            $data[$d->jenis]['persentase']=$d->persentase;
        }

        $chart_puk = array();
        $chart_tpak = array();
        $chart_tkk = array();
        $chart_tpt = array();
        // return $data;
        return view('pages.kesehatan-kematianbayi.index')
            ->with('kecamatan', $kecamatan)
            ->with('data', $data)
            ->with('jenis', $jenis)
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

        $jenis=Config::get('services.kematian_bayi');

        return view('pages.kesehatan-kematianbayi.create')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('jenis', $jenis)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function store(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        // $jumlah=$request->jumlah;
        $persentase=$request->persentase;
        
        foreach($persentase as $id_jen=>$val)
        {
            $ins=new KesehatanKematianBayi;
            $ins->id_kategori = $id_kategori;
            $ins->tahun = $tahun;
            $ins->jenis = $id_jen;
            // $ins->jumlah = str_replace(array(',','.'),'',$val);
            $ins->persentase = str_replace(array(',','.'),'.',$persentase[$id_jen]);
            
            $ins->save();
        }
        return redirect()->route('kematian-bayi.index',[$id_kategori,$tahun])->with('Data Berhasil Disimpan');
    }

    public function edit($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = KesehatanKematianBayi::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();
        $jenis=Config::get('services.kematian_bayi');

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->jenis]['jumlah']=$d->jumlah;
            $data[$d->jenis]['persentase']=$d->persentase;
        }
        
        return view('pages.kesehatan-kematianbayi.edit')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('data', $data)
            ->with('jenis', $jenis)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function update(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        KesehatanKematianBayi::where('id_kategori',$id_kategori)->where('tahun',$tahun)->forceDelete();

        // $jumlah=$request->jumlah;
        $persentase=$request->persentase;
        
        foreach($persentase as $id_jen=>$val)
        {
            $ins=new KesehatanKematianBayi;
            $ins->id_kategori = $id_kategori;
            $ins->tahun = $tahun;
            $ins->jenis = $id_jen;
            // $ins->jumlah = str_replace(array(',','.'),'',$val);
            $ins->persentase = str_replace(array(',','.'),'.',$persentase[$id_jen]);
            
            $ins->save();
        }
        return redirect()->route('kematian-bayi.index',[$id_kategori,$tahun])->with('Data  Berhasil Diperbaharui');
    }
}
