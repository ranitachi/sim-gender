<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KesehatanImunisasiRutinIbuHamil;
use Config;
class KesehatanImunisasiRutinIbuHamilController extends Controller
{
    public function index($id_kategori,$tahun=null)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = KesehatanImunisasiRutinIbuHamil::where('id_kategori', $id_kategori)->get();

        $jenis=['tt'=>'TT II +'];

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->jenis][$d->tahun]['jumlah']=$d->jumlah;
            $data[$d->jenis][$d->tahun]['persentase']=$d->persentase;
        }

        $chart_puk = array();
        $chart_tpak = array();
        $chart_tkk = array();
        $chart_tpt = array();
        // return $data;
        return view('pages.kesehatan-imunisasirutinibuhamil.index')
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

        $jenis=['tt'=>'TT II +'];

        return view('pages.kesehatan-imunisasirutinibuhamil.create')
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
        
        foreach($persentase as $id_jen=>$thn)
        {
            foreach($thn as $th=>$val)
            {
                $ins=new KesehatanImunisasiRutinIbuHamil;
                $ins->id_kategori = $id_kategori;
                $ins->tahun = $th;
                $ins->jenis = $id_jen;
                $ins->jumlah = str_replace(array(',','.'),'',$val);
                $ins->save();
            }
            // $ins->persentase = str_replace(array(',','.'),'.',$persentase[$id_jen]);
            
        }
        return redirect()->route('imunisasi-rutin-ibu-hamil.index',[$id_kategori,$tahun])->with('Data Berhasil Disimpan');
    }

    public function edit($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = KesehatanImunisasiRutinIbuHamil::where('id_kategori', $id_kategori)->get();
        $jenis=['tt'=>'TT II +'];

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->jenis][$d->tahun]['jumlah']=$d->jumlah;
            $data[$d->jenis][$d->tahun]['persentase']=$d->persentase;
        }
        
        return view('pages.kesehatan-imunisasirutinibuhamil.edit')
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
        

        // $jumlah=$request->jumlah;
        $persentase=$request->persentase;
        
        foreach($persentase as $id_jen=>$thn)
        {
            foreach($thn as $th=>$val)
            {
                // KesehatanImunisasiRutinIbuHamil::where('id_kategori',$id_kategori)->where('tahun',$th)->forceDelete();
                $ins=KesehatanImunisasiRutinIbuHamil::where('id_kategori',$id_kategori)->where('jenis',$id_jen)->where('tahun',$th)->first();
                $ins->jumlah = str_replace(array(',','.'),'',$val);
                $ins->save();
                // $ins->id_kategori = $id_kategori;
                // $ins->tahun = $th;
                // $ins->jenis = $id_jen;
            }
            // $ins->persentase = str_replace(array(',','.'),'.',$persentase[$id_jen]);
            
        }
        return redirect()->route('imunisasi-rutin-ibu-hamil.index',[$id_kategori,$tahun])->with('Data  Berhasil Diperbaharui');
    }
}
